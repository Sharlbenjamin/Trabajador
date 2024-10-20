<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\ApplicationUpdateRequest;
use App\Models\Application;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $applications = Application::all();

        return view('application.index', compact('applications'));
    }

    public function create(Request $request): View
    {
        $accounts = Auth::user()->accounts;
        $priorities = Application::priorities();
        $statuses = Application::statuses();

        return view('application.create', compact('accounts', 'priorities', 'statuses'));
    }

    public function store(ApplicationStoreRequest $request): RedirectResponse
    {
        $application = Application::create($request->validated());

        // $request->session()->flash('application.id', $application->id);

        return redirect()->route('accounts.index');
    }

    public function show(Request $request, Application $application): View
    {
        return view('application.show', compact('application'));
    }

    public function edit(Request $request, Application $application): View
    {
        $accounts = Auth::user()->accounts;
        $priorities = Application::priorities();
        $statuses = Application::statuses();

        return view('application.create', compact('application','accounts', 'priorities', 'statuses'));
    }

    public function update(ApplicationUpdateRequest $request, Application $application): RedirectResponse
    {
        $application->update($request->validated());

        // $request->session()->flash('application.id', $application->id);

        return redirect()->route('applications.index');
    }

    public function destroy(Request $request, Application $application): RedirectResponse
    {
        $application->delete();

        return redirect()->route('applications.index');
    }
}
