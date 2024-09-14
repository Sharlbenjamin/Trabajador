<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class ProgressBar extends Component
{
    public $course;
    public $index;
    public $progress;
    public $updatedCourse;

    public function render()
    {
        return view('livewire.progress-bar');
    }

    public function mount($index, $course)
    {
        $this->index = $index;
        $this->course = $course;
        $this->progress = $this->course->progress;
    }

    public function ProgressUpdate()
    {
        $this->course->update([
            'progress' => $this->progress
        ]);

        return redirect()->route('courses.index');
    }
}
