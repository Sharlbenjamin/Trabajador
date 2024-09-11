<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Account;
use App\Models\Mission;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MissionCreate extends Component
{
    public $missions;
    public $mission;

    public $accountsDropdown;

    public $name;
    public $account_id;
    public $company;
    public $priority;
    public $urgency;
    public $submission_date;
    public $status;
    public $income;

    public function render()
    {   
        $user = Auth::user();

        $this->accountsDropdown = Account::where('user_id', $user->id)->get();

        return view('livewire.mission-create');
    }

    public function mount()
    {   
        $user = Auth::user();

        $this->accountsDropdown = Account::where('user_id', $user->id)->get();

        if($this->mission){

            $this->name = $this->mission->name;
            $this->account_id = $this->mission->account_id;
            $this->company = $this->mission->company;
            $this->priority = $this->mission->priority;
            $this->urgency = $this->mission->urgency;
            $this->submission_date = $this->mission->submission_date;
            $this->status = $this->mission->status;
            $this->income = $this->mission->income;
        }

        return view('livewire.mission-create');
    }

    public function CreateMission()
    {
        $user = Auth::user();

        $createdMission = Mission::create([
            'user_id' => $user->id,
            'name' => $this->name,
            'account_id' => $this->account_id,
            'company' => $this->company,
            'priority' => $this->priority,
            'urgency' => $this->urgency,
            'submission_date' => $this->submission_date,
            'status' => $this->status,
            'income' => $this->income,
        ]);

        return redirect()->route('missions.index');
    }

    public function UpdateMission()
    {
        $user = Auth::user();

        $updatedMission = Mission::find($this->mission->id);
        $updatedMission->update([
            'user_id' => $user->id,
            'name' => $this->name,
            'account_id' => $this->account_id,
            'company' => $this->company,
            'priority' => $this->priority,
            'urgency' => $this->urgency,
            'submission_date' => $this->submission_date,
            'status' => $this->status,
            'income' => $this->income,
        ]);

        return redirect()->route('missions.index');
    }

    public function DeleteMission()
    {
        $deletedMission = Mission::find($this->mission->id);

        if($deletedMission->tasks->count() > 0){
            foreach($deletedMission->tasks as $task){
                $task->delete();
            }
        }
        $deletedMission->delete();

        return redirect()->route('missions.index');
    }
}
