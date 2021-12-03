<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relacion 1:M Inversa
    public function section(){

        return $this->belongsTo(Section::class);
    }

    // Relacion 1:M Inversa
    public function platform(){

        return $this->belongsTo(Platform::class);
    }

    // Relacion 1:1
    public function description(){

        return $this->hasOne(Description::class);
    }

    // Relacion M:M
    public function users(){

        return $this->belongsToMany(User::class);
    }

    // Relacion polimorfica 1:1 morphOne(model, nombre del metodo en el model resource)
    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    // Relacion polimorfica 1:M
    public function comments()
    {
        return $this->morphMany(comments::class, 'commentable');
    }

    // Relacion polimorfica 1:M
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
