<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
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

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {

            return null;  
        }else{

            return $this->course->lessons[$this->index - 1 ];
        }

    }

    public function getNextProperty()
    {
        if ($this->index == $this->course->lessons->count() - 1) {
            
            return null;
            
        } else {
            
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}
