<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relaciones

    //relacion con productos de muchos a uno
    public function products(){
        return $this->hasMany(Product::class);
    }

    //relacion de uno a muchos inversa con categorias
    public function category(){
        return $this->belongsTo(Category::class);
    }


}
