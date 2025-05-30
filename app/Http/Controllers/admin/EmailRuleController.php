<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRuleRequest;
use App\Models\Academy;
use App\Models\EmailRule;
use App\Services\EmailRuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailRuleController extends Controller
{
    public function __construct(private readonly EmailRuleService $service) {}

    public function index(): View
    {
        // gegroepeerde e-mailregels
        $rules = EmailRule::query()
            ->orderBy('academy_name')
            ->orderBy('email')
            ->get()
            ->groupBy(fn (EmailRule $r) => $r->academy_name ?? '_default')
            ->toBase();

        // alle academies
        $allAcademies = Academy::query()
            ->orderBy('abbreviation')
            ->get(['name', 'abbreviation']);

        // welke academies hebben al een regel?
        $usedNames = $rules->keys()->filter(fn ($k) => $k !== '_default');

        // beschikbare academies
        $availableAcademies = $allAcademies->whereNotIn('name', $usedNames->all());

        return view('admin.email-rules', [
            'rules'               => $rules,
            'allAcademies'        => $allAcademies,
            'usedNames'           => $usedNames,
            'availableAcademies'  => $availableAcademies,
            'success'             => session('success'),
        ]);
    }

    public function store(StoreEmailRuleRequest $request): RedirectResponse
    {
        // voeg een e-mailadres toe aan de gekozen academie
        $this->service->add(
            $request->validated('email'),
            $request->validated('academy_name')
        );

        return back()->with('success', 'E-mailadres toegevoegd.');
    }

    public function changeAcademy(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'old_academy'  => ['nullable', 'string'],
            'academy_name' => ['required', 'string', 'different:old_academy'],
        ]);

        // voorkom dubbele regels
        if (EmailRule::where('academy_name', $data['academy_name'])->exists()) {
            return back()->withErrors([
                'academy_name' => 'Er bestaat al een regel voor deze academie.',
            ]);
        }

        $this->service->moveAcademy(
            $data['old_academy'],
            $data['academy_name']
        );

        return back()->with('success', 'Academie aangepast.');
    }

    public function destroy(EmailRule $rule): RedirectResponse
    {
        $rule->delete();

        return back()->with('success', 'E-mailadres verwijderd.');
    }
}
