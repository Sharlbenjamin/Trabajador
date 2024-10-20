<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Request $request): View
    {
        return view('course.index');
    }

    public function create(Request $request): View
    {
        $subjects = Subject::all();

        return view('course.create', compact('subjects'));
    }

    public function store(CourseStoreRequest $request): RedirectResponse
    {
        $course = Course::create($request->validated());

        // $request->session()->flash('course.id', $course->id);

        return redirect()->route('courses.index');
    }

    public function show(Request $request, Course $course): View
    {
        return view('course.show', compact('course'));
    }

    public function edit(Request $request, Course $course): View
    {
        return view('course.create', compact('course'));
    }

    public function update(CourseUpdateRequest $request, Course $course): RedirectResponse
    {
        $course->update($request->validated());

        // $request->session()->flash('course.id', $course->id);

        return redirect()->route('courses.index');
    }

    public function destroy(Request $request, Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}
