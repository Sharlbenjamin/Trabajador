<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Http\Requests\SubjectStoreRequest;

class CreateSubject extends Component
{
    public $subject;
    public $category;
    public $topic;

    public $subjectDropdown;
    public $categoryDropdown;
    public $topicDropdown;

    public $mainSubject;

    public function render()
    {
        $categories = Subject::all()->unique('category')->sortBy('category');

        $topics = Subject::when($this->categoryDropdown, function($query){
            $query->where('category', $this->categoryDropdown);
        })->get()->sortBy('topic')->unique('topic');

        $subjects = Subject::when($this->categoryDropdown, function($query){
            $query->where('category', $this->categoryDropdown);
        })->when($this->topicDropdown, function($query){
            $query->where('topic', $this->topicDropdown);
        })->get()->sortBy('subject')->unique('subject');
        

        return view('livewire.create-subject', compact('subjects', 'categories', 'topics'));
    }

    public function CreateSubject()
    {
        if($this->categoryDropdown != 'other'){
            $this->category = $this->categoryDropdown;
        } 
        if($this->topicDropdown != 'other'){
            $this->topic = $this->topicDropdown;
        } 
        if($this->subjectDropdown != 'other'){
            $this->subject = $this->subjectDropdown;
        }
        $newSubject = Subject::create([
            'category' => $this->category,
            'topic' => $this->topic,
            'subject' => $this->subject
        ]);

        return;
    }
    
    public function CancelSubject()
    {
        return redirect()->route('courses.index');
    }
   
}
