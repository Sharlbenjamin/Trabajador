<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Models\Account;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();

        $accounts = Account::where('user_id', $user->id)->get();
        $applications = Application::where('user_id', $user->id)->get();

        return view('account.index', compact('accounts', 'applications'));
    }

    public function create(Request $request): View
    {
        $websites = Account::websites();

        return view('account.create', compact('websites'));
    }

    public function store(AccountStoreRequest $request): RedirectResponse
    {
        $account = Account::create($request->validated());

        // $request->session()->flash('account.id', $account->id);

        return redirect()->route('accounts.index');
    }

    public function show(Request $request, Account $account): View
    {
        return view('account.show', compact('account'));
    }

    public function edit(Request $request, Account $account): View
    {
        $websites = Account::websites();
        return view('account.create', compact('account', 'websites'));
    }

    public function update(AccountUpdateRequest $request, Account $account): RedirectResponse
    {
        $account->update($request->validated());

        // $request->session()->flash('account.id', $account->id);

        return redirect()->route('accounts.index');
    }

    public function destroy(Request $request, Account $account): RedirectResponse
    {
        $account->delete();

        return redirect()->route('accounts.index');
    }
}
