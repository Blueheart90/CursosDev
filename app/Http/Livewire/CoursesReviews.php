<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Review;
use Livewire\Component;

class CoursesReviews extends Component
{
    public $course_id;
    public $rating = 5, $comment;
    protected $rules = [
        'comment' => 'required',
        'rating' => 'required',
    ];

    public function mount(Course $course)
    {
        $this->course_id = $course->id;
    }

    public function store()
    {
        $validatedData = $this->validate();

        $validatedData['user_id'] = auth()->id();

        $course = Course::find($this->course_id);

        $course->reviews()->create($validatedData);

        $this->reset('comment');
        $this->reset('rating');

    }

    public function render()
    {
        $course = Course::find($this->course_id);

        return view('livewire.courses-reviews', compact('course'));
    }
}
