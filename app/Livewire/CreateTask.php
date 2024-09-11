<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateTask extends Component
{
    public $user;
    public $mission;
    public $status = 0;
    public $name;
    public $time;

    public function render()
    {
        return view('livewire.create-task');
    }

    public function CreateTask()
    {
        $this->user = Auth::user();
        
        Task::create([
            'user_id' => $this->user->id,
            'mission_id' => $this->mission->id,
            'status' => $this->status,
            'name' => $this->name,
            'time' => $this->time,
        ]);

        return $this->dispatch('refreshComponent');
    }
}
