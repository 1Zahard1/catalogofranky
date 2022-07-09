<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItem extends Component
{
    //propiedades
    public $quantity;
    public $qty = 1;

    //recibir las variables que mandamos del @livewire
    public $product;

    public function mount(){
        $this->quantity = $this->product->quantity;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
