<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\EmailRule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class EmailRuleService
{
    /** @return Collection<string> */
    public function getRecipientsFor(?string $academyName): Collection
    {
        $specific = EmailRule::query()
            ->where('academy_name', $academyName)
            ->pluck('email');

        if ($specific->isNotEmpty()) {
            return $specific->unique()->values();
        }

        // fall-back to defaults
        return EmailRule::query()
            ->whereNull('academy_name')
            ->pluck('email')
            ->unique()
            ->values();
    }

    /**
     * @throws ValidationException
     */
    public function add(string $email, ?string $academyName): void
    {
        try {
            EmailRule::create([
                'academy_name' => $academyName,
                'email'        => $email,
            ]);
        } catch (QueryException $e) {
            // unique constraint hit?
            throw ValidationException::withMessages([
                'email' => 'Dit adres bestaat al voor deze academie.',
            ]);
        }
    }

    public function moveAcademy(?string $fromAcademy, string $toAcademy): void
    {
        // haal alle e-mails bij de 'oude' academie op
        $emails = EmailRule::where('academy_name', $fromAcademy)->pluck('email');

        // voeg ze toe aan de nieuwe (duplica­tion-safe)
        foreach ($emails as $email) {
            EmailRule::firstOrCreate([
                'academy_name' => $toAcademy,
                'email'        => $email,
            ]);
        }

        // verwijder oude regels
        EmailRule::where('academy_name', $fromAcademy)->delete();
    }
}
