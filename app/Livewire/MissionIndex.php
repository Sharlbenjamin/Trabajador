<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mission;

class MissionIndex extends Component
{
    public $missions;

    // Inputs
    public $name;
    public $status;
    public $priority;
    public $urgency;

    public function render()
    {
        $this->missions = Mission::when($this->name, function($query){
            $query->where('name', 'like', '%'.$this->name.'%');
        })
        ->when($this->status, function($query){
            $query->where('status', $this->status);
        })
        ->when($this->priority, function($query){
            $query->where('priority', $this->priority);
        })
        ->when($this->urgency, function($query){
            $query->where('urgency', $this->urgency);
        })->get()->sortBy('submission_date');
        
        return view('livewire.mission-index');
    }
}
