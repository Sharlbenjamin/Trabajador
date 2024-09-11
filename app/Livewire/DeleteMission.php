<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mission;

class DeleteMission extends Component
{
    public $mission;

    public function render()
    {
        return view('livewire.delete-mission');
    }

    public function DeleteMission()
    {
        $mission = Mission::find($this->misson->id);

        $mission->delete();

        return redirect()->route('missons.index');
    }
}
