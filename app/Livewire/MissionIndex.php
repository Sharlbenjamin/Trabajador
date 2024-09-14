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
            $query->where('name', 'like', '%'.$this->name.'%')->orderBy('submission_date');
        })
        ->when($this->status, function($query){
            $query->where('status', $this->status)->orderBy('submission_date');
        })
        ->when($this->priority, function($query){
            $query->where('priority', $this->priority)->orderBy('submission_date');
        })
        ->when($this->urgency, function($query){
            $query->where('urgency', $this->urgency)->orderBy('submission_date');
        })->get();
        
        return view('livewire.mission-index');
    }
}
