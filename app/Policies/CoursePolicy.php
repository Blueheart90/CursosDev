<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // Verifica que el user este matriculado en el curso
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user);
    }

    // Verifica que el curso este publicado
    // Por defecto lo primero que hace 
    // el policy es verificar si este loggeado 
    // y despues si ejecuta el metodo
    // para cambiar este comportamiento se antepone ? al User. (?User $user)
    public function published(?User $user, Course $course)
    {
        if ($course->status == 3) {
            return true;
        }else{
            return false;
        }
    }

    public function dictated(User $user, Course $course)
    {
        // Verifica que el profesor del curso sea el usuario logeado
        if ($course->teacher->is($user)) {
            return true;
        } else {
            return false;
        }
    }
}
