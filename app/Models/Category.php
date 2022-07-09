<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'icon'];

    //relaciones de elocuent

    //relacion con subcategorias que es de uno a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //relacion con brands que es de muchos a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    //relacion de categoria con productos por medio de la tabla subcategorias
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }


    //este es el codigo para que no utilice los id para las redirecciones sino el campo slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    
}
