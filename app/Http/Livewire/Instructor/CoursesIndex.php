<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $courses = Course::where('user_id', auth()->id())
            ->Where('title', 'LIKE', '%' . $this->search . '%')
            ->paginate(8);
        

        return view('livewire.instructor.courses-index', compact('courses'));
    }
}
