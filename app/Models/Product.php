<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    const BORRADOR = 1;
    const PUBLICADO = 2;


    //accesores
    public function getStockAttribute(){
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif($this->subcategory->color) {
            return ColorProduct::whereHas('product', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('quantity');
        }else{
            return $this->quantity;
        }

    }

    //relaciones


    //relacion de uno a muchos inversa con brands
    public function sizes(){
        return $this->hasMany(Size::class);
    }


    //relacion de uno a muchos inversa con brands
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    //relacion de uno a muchos inversa  con subcategory
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }


    //relacion muchos  a muchos con colores

    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }


    //relacion polimorfica con productos uno a muchos
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }


    //este es el codigo para que no utilice los id para las redirecciones sino el campo slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
