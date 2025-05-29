<?php
declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRuleRequest;
use App\Models\Academy;
use App\Models\EmailRule;
use App\Services\EmailRuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmailRuleController extends Controller
{
    public function __construct(private readonly EmailRuleService $service) {}

    public function index(): View
    {
        return view('admin.email-rules', [
            'academies' => Academy::orderBy('abbreviation')->get(),
            'rules'     => EmailRule::orderBy('academy_name')->orderBy('email')->get()
                                  ->groupBy(fn (EmailRule $r) => $r->academy_name ?? '_default'),
            'success'   => session('success'),
        ]);
    }

    public function store(StoreEmailRuleRequest $request): RedirectResponse
    {
        $this->service->add(
            $request->validated('email'),
            $request->validated('academy_name')
        );

        return redirect()->back()->with('success', 'Regel toegevoegd.');
    }

    public function destroy(EmailRule $rule): RedirectResponse
    {
        $rule->delete();

        return redirect()->back()->with('success', 'Regel verwijderd.');
    }
}
