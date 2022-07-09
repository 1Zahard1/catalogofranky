<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemColor extends Component
{
    //propiedades
    public $colors;
    public $qty = 1;
    public $quantity = 0;
    public $color_id="";

    //aqui recibo el parametro mandado desde la vista donde se incluye este componente
    public $product;

    //metodo que se ejecuta al iniciar una vez el componente livewire
    public function mount(){
        $this->colors = $this->product->colors;
    }

    //metodo que renderiza la vista y se ejecuta cada que hay un cambio en la vista
    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

    //metodo importante porque aprendí que cuando un metodo empieza con updated seguido del nombre de una propiedad este metodo se ejecutara cuando la propiedad cambie
    public function updatedColorId($value){
        $this->quantity = $this->product->colors->find($value)->pivot->quantity;
    }

    //metodos para incrementar las cantidades o deshabilitarlos
    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }
}
