<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Builder;


class CourseIndex extends Component
{
    public $courses;
    public $category;
    public $topic;
    public $subject;
    public $name;
    public $subjects;
    public $subjectIDs = [];

    public $categoryDropdown;
    public $topicDropdown;
    public $subjectDropdown;

    public function render()
    {
        $this->categoryDropdown = Subject::all()->unique('category')->sortBy('category');
        $this->topicDropdown = Subject::when($this->category, function($query){
            $query->where('category', $this->category);
        })->get()->unique('topic')->sortBy('topic');

        $this->subjectDropdown = Subject::when($this->topic, function($query){
            $query->where('topic', $this->topic);
        })->when($this->category, function($query){
            $query->where('category', $this->category);
        })->get()->unique('subject')->sortBy('subject');

        $this->courses = Course::when($this->category, function($query){
            $query->where('category', $this->category);
        })->when($this->topic, function($query){
            $query->where('topic', $this->topic);
        })->when($this->subject, function($query){
            $query->where('subject', $this->subject);
        })->when($this->name, function($query){
            $query->where('name', 'like', '%'.$this->name.'%');
        })->get()->sortBy('name');
            
        return view('livewire.course-index');
    }
}
