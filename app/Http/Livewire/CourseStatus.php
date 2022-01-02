<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course;
    public $current;

    public function mount(Course $course)
    {
        // policy para no ingresar a la vista sin esta registrado al curso
        $this->authorize('enrolled', $course);
        
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
        // Al estar todas las lessons completas 
        // la variable current se le asignará la ultima
        if (!$this->current) {
            $this->current = $course->lessons->last();
        }
    }

    public function complete()
    {

        $this->current->users()->toggle(auth()->user());

        // hacemos un refresh a las propiedades, por ende se actualizan en el componente
        // $this->current = Lesson::find($this->current->id);
        // $this->course = Course::find($this->course->id);
        $this->current->refresh();
        $this->course->refresh();
    }
    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    // Propiedades computadas
    public function getProgressBarProperty()
    {
        $lessonsCount = $this->course->lessons->count();
        $i = 0;

        foreach ($this->course->lessons as $lesson) {
            if ($lesson->complete) {
                $i++;
            }
        }

        $progressBar = ($i * 100) / $lessonsCount;
        return round($progressBar, 2);

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

    public function download()
    {
        return response()->download(storage_path('app/' . $this->current->resource->url));
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}
