<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $course, $section, $newSectionName;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->authorize('dictated', $course);
        $this->course = $course;
        $this->section = new Section();

    }

    public function edit(Section $section)
    {
        $this->resetValidation();
        $this->section = $section;
    }

    public function update()
    {
        $this->validate();

        $this->section->save();

        // Reseteamos la propiedad section para que el input no se muestre
        $this->section = new Section();

        // Recuperamos el resgistro nuevo de course para que se actualize en la vista
        $this->course = Course::find($this->course->id);
    }

    public function store()
    {
        $this->validate([
            'newSectionName' => 'required'
        ]);
        
        Section::create([
            'name' => $this->newSectionName,
            'course_id' => $this->course->id
        ]);

        $this->reset('newSectionName');
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Section $section)
    {
        $section->delete();
        $this->course = Course::find($this->course->id);
    }
    
    public function render()
    {
        return view('livewire.instructor.courses-curriculum')
            ->layout('layouts.instructor');
    }
}
