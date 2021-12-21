<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'url' => $this->faker->image(Storage::url('cursos'), 640, 480, null, false),
            'url' => 'courses/' . $this->faker->image('public/storage/courses',640,480, null, false),
            'imageable_id' => null,
            'imageable_type' => null
        ];
    }
}
