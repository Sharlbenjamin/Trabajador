<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Builder;


class CourseIndex extends Component
{
    public $courses;

    public $category;
    public $topic;
    public $subject;
    public $name;

    public $categoryDropdown;
    public $topicDropdown;
    public $subjectDropdown;

    
    public function render()
    {
        $this->categoryDropdown = Category::all();
        $this->topicDropdown = Topic::all();
        $this->subjectDropdown = Subject::all();

        $this->courses = Course::when($this->category, function($query){
            $query->where('category', $this->category);
        })->when($this->topic, function($query){
            $query->where('topic', $this->topic);
        })->when($this->subject, function($query){
            $query->where('subject', $this->subject);
        })->when($this->name, function($query){
            $query->where('name', 'like', '%'.$this->name.'%');
        })->get();
       
        return view('livewire.course-index');
    }

    public function mount()
    {
        $this->courses = Course::all();
    }


}
