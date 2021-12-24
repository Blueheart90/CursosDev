<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course, $goal;

    protected $rules = [
        'goal.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->goal = new Goal();
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
    }

    public function update()
    {
        $this->validate();

        $this->goal->save();

        $this->goal = new Goal();
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        $this->course = Course::find($this->course->id);
    }

    public function render()
    {
        return view('livewire.instructor.courses-goals');
    }
}
