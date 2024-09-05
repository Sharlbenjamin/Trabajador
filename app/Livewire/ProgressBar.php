<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class ProgressBar extends Component
{
    public $course;
    public $progress;

    public function render()
    {
        return view('livewire.progress-bar');
    }

    public function mount()
    {
        $updatedCourse = Course::find($this->course->id);
        $this->progress = $updatedCourse->progress;
        return view('livewire.progress-bar');
    }

    public function ProgressUpdate()
    {
        $updatedCourse = Course::find($this->course->id);

        $updatedCourse->update([
            'progress' => $this->progress
        ]);

        return redirect()->route('courses.index');
    }
}
