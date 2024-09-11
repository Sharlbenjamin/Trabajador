<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Application;

class DeleteApplication extends Component
{
    public $application;

    public function render()
    {
        return view('livewire.delete-application');
    }

    public function DeleteApplication()
    {
        $application = Application::find($this->application->id);

        $application->delete();
        
        return redirect()->route('accounts.index');
    }
}
