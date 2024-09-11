<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class DeleteCourse extends Component
{
    public $course;

    public function render()
    {
        return view('livewire.delete-course');
    }

    public function DeleteCourse()
    {
        $course = Course::find($this->course->id);

        $course->delete();

        return redirect()->route('courses.index');
    }
}
