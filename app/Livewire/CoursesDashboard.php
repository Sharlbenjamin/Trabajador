<?php

namespace App\Livewire;

use Livewire\Component;
use App\models\Course;
use App\models\Category;
use App\models\Topic;
use App\models\Subject;

class CoursesDashboard extends Component
{
    public $categories;
    public $topics;
    public $subjects;
    public $courses;

    public $category;
    public $topic;
    public $subject;

    public function render()
    {
        $this->categories = category::all();
        $this->topics = topic::all();
        $this->subjects = subject::all();

        return view('livewire.courses-dashboard');
    }

    public function mount()
    {
        $this->courses = Course::when($this->category, function($query){
            $query->where('category', $this->category);
        })->when($this->topic, function($query){
            $query->where('topic', $this->topic);
        })->when($this->subject, function($query){
            $query->where('subject', $this->subject);
        })->get();
    }

    public function updated()
    {
        $this->courses = Course::when($this->category, function($query){
            $query->where('category', $this->category);
        })->get();
    }
}
