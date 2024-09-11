<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Course;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use Illuminate\Support\Facades\Auth;

class CreateCourse extends Component
{
    // Inputs
    public $user_id;
    public $name;
    public $link;
    public $category;
    public $topic;
    public $subject;
    public $level;
    public $status;
    public $chapters;
    public $length;
    public $progress;
    public $course;

    // Dropdowns
    public $subjects;
    public $categories;
    public $topics;

    
    public function render()
    {
        $this->categories = Subject::all()->unique('category')->sortBy('category');

        $this->topics = Subject::when($this->category, function($query){
            $query->where('category', $this->category);
        })->get()->unique('topic')->sortBy('topic');

        $this->subjects = Subject::when($this->category, function($query){
            $query->where('category', $this->category);
        })->when($this->topic, function($query){
            $query->where('topic', $this->topic);
        })->get()->unique('subject')->sortBy('subject');


        return view('livewire.create-course');
    }

    public function mount()
    {
        if($this->course){
            $course = Course::find($this->course->id);

            $this->name = $course->name;
            $this->link = $course->link;
            $this->category = $course->category;
            $this->topic = $course->topic;
            $this->subject = $course->subject;
            $this->level = $course->level;
            $this->status = $course->status;
            $this->chapters = $course->chapters;
            $this->length = $course->length;
            $this->progress = $course->progress;
            
            return view('livewire.create-course');
        }
    }
    
    public function CreateCourse()
    {   
        $this->user_id = Auth::user()->id;
      
        $newCourse = Course::create([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'link' => $this->link,
            'category' => $this->category,
            'topic' => $this->topic,
            'subject' => $this->subject,
            'level' => $this->level,
            'status' => $this->status,
            'chapters' => $this->chapters,
            'length' => $this->length,
            'progress' => $this->progress,
            'course' => $this->course,
            
        ]);
        
        return redirect()->route('courses.index');
    }
    
    public function UpdateCourse()
    {
        $this->user_id = Auth::user()->id;

        $updatedCourse = Course::find($this->course->id);

        $updatedCourse->update([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'link' => $this->link,
            'category' => $this->category,
            'topic' => $this->topic,
            'subject' => $this->subject,
            'level' => $this->level,
            'status' => $this->status,
            'chapters' => $this->chapters,
            'length' => $this->length,
            'progress' => $this->progress,
            'course' => $this->course
        ]);

        return redirect()->route('courses.index');
    }
}
