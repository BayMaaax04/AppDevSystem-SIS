<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseSubject extends Component
{
    public $selectedCourse = '';
    public $subjects = [];

    public function updatedSelectedCourse($value)
    {
        $course = Course::with('subjects')->where('id', $value)->first();
        $this->subjects = $course->subjects;
    }


    public function render()
    {
        $courses = Course::with('subjects')->latest()->get();
        return view('livewire.course-subject',compact('courses'));
    }
}
