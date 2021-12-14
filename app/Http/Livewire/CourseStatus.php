<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course;
    public $current;

    public function mount(Course $course)
    {
        $this->course = $course;
        // Iteramos las lecciones del curso
        // y se verifica si No esta completada
        // al no estar completada asignamos 
        // esa leccion a current y salimos el bucle foreach
        foreach ($course->lessons as $lesson) {
            if (!$lesson->complete) {
                $this->current = $lesson;
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}
