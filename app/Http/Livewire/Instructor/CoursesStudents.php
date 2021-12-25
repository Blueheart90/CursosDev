<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use WithPagination;

    public $course;
    public $search;

    public function mount(Course $course)
    {
        $this->course =  $course;
    
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $students = $this->course->students()
            ->Where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(4);

        return view('livewire.instructor.courses-students', compact('students'))
        ->layout('layouts.instructor');
    }
}
