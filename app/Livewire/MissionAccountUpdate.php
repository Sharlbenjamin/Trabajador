<?php

namespace App\Livewire;

use Livewire\Component;
use App\models\Account;
use Illuminate\Support\Facades\Auth;

class MissionAccountUpdate extends Component
{
    public $mission;
    public $user;
    public $account;
    public $allAccounts;

    public function mount()
    {
        $this->user = Auth::user();

        $this->account = $this->mission->account->id;

        $this->allAccounts = Account::where('user_id', $this->user->id)->get();
    }

    public function render()
    {
        return view('livewire.mission-account-update');
    }

    public function AccountUpdate()
    {
        $this->mission->update([
            'account_id' => $this->account
        ]);
    }
}
