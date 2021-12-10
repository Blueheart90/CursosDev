<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Se protege el campo status ya que un profesor podria con un input cambiarlo y ponerlo 
    // como aprovado sin que pase por la revision de un admin

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];
    // protected $withAvg = ['reviews', 'rating'];


    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // Local scope querys
    public function scopeCategory($query, $categoryId)
    {
        // Se revisa que la id no sea null
        // Si esta definido se ejecuta la query
        if ($categoryId) {

            return $query->where('category_id', $categoryId);
        }
    }

    public function scopeLevel($query, $levelId)
    {
        if ($levelId) {

            return $query->where('level_id', $levelId);
        }
    }

    // Agregar nuevo atributo
    public function getRatingAttribute()
    {
        if ($this->reviews_count) {

            return round($this->reviews->avg('rating'), 1);
        }else{
            return false;
        }
    }

    //
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relacion 1:M inversa
    public function teacher(){

        return $this->belongsTo(User::class, 'user_id');
    }
        
    // Relacion M:M inversa
    public function students(){

        return $this->belongsToMany(User::class);
    }

    // Relacion 1:M
    public function reviews(){

        return $this->hasMany(Review::class);
    }

    // Relacion 1:M inversa
    public function level(){

        return $this->belongsTo(Level::class);
    }
        
    // Relacion 1:M inversa
    public function category(){

        return $this->belongsTo(Category::class);
    }
        
    // Relacion 1:M inversa
    public function price(){

        return $this->belongsTo(Price::class);
    }

    // Relacion 1:M
    public function requirements(){

        return $this->hasMany(Requirement::class);
    }
        
    // Relacion 1:M
    public function goals(){

        return $this->hasMany(Goal::class);
    }
        
    // Relacion 1:M
    public function sections(){

        return $this->hasMany(Section::class);
    }

    // Relacion 1:M
    public function audiences(){

        return $this->hasMany(Audience::class);
    }

    // Relacion polimorfica 1:1
    public function image(){

        return $this->morphOne(Image::class, 'imageable');
    }

    // Relacion  Through 1:M   course <-- sections --> lessons
    // hasManyThrough(model final que quermos acceder, model intermediario entre los 2)
    public function lessons(){

        return $this->hasManyThrough(Lesson::class, Section::class);
    }
        
}
