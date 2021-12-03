<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    // Relacion 1:M Inversa
    public function course(){
        return $this->belongsTo(Course::class);
    }
    
    // Relacion 1:M
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
