<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskIndex extends Component
{
    public $task;
    public $status;

    public function render()
    {
        return view('livewire.task-index');
    }

    public function mount()
    {
        $this->status = $this->task->status;

        return view('livewire.task-index');
    }

    public function UpdateTask()
    {
        $updatedTask  = Task::find($this->task->id);

        $updatedTask->update([
            'status' => $this->status,
        ]);

        return $this->dispatch('refreshComponent');
    }

    public function DeleteTask()
    {
        $deletedTask = Task::find($this->task->id)->delete();

        return $this->dispatch('refreshComponent');
    }
}
