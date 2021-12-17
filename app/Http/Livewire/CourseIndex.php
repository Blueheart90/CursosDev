<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;
    
    public $categoryId;
    public $levelId;

    public function resetFilters()
    {
        $this->reset(['categoryId', 'levelId']);
    }
    
    // se ejecuta cuando se actualiza el component
    // y resetea la propiedad page de la paginacion
    // para que los filtros se ejecuten sin problemas
    public function updating()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $levels = Level::all();
        $categories = Category::all();

        $courses = Course::where('status', 3)
            ->category($this->categoryId)
            ->level($this->levelId)
            ->paginate(8);

        return view('livewire.course-index', compact('courses', 'levels', 'categories'));
    }
}
