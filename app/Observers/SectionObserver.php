<?php

namespace App\Observers;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    /**
     * Handle the Section "created" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function created(Section $section)
    {
        //
    }

    /**
     * Handle the Section "updated" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function updated(Section $section)
    {
        //
    }

    /**
     * Handle the Section "deleted" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function deleted(Section $section)
    {
        //
    }

    public function deleting(Section $section)
    {
        // Recorremos todas las lecciones de la seccion y
        foreach ($section->lessons as $lesson) {
            if ($lesson->resource) {
                Storage::delete($lesson->resource->url);
                $lesson->resource->delete();
            }
        }
    }



    /**
     * Handle the Section "restored" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function restored(Section $section)
    {
        //
    }

    /**
     * Handle the Section "force deleted" event.
     *
     * @param  \App\Models\Section  $section
     * @return void
     */
    public function forceDeleted(Section $section)
    {
        //
    }
}
