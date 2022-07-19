<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemColor extends Component
{
    //propiedades
    public $colors;
    public $qty = 1;
    public $quantity = 0;
    public $color_id="";

    public $options = [
        'size_id' => null
    ];

    //aqui recibo el parametro mandado desde la vista donde se incluye este componente
    public $product;

    //metodo que se ejecuta al iniciar una vez el componente livewire
    public function mount(){
        $this->colors = $this->product->colors;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }


    //metodo importante porque aprendí que cuando un metodo empieza con updated seguido del nombre de una propiedad este metodo se ejecutara cuando la propiedad cambie
    public function updatedColorId($value){
        $color = $this->product->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id);
        $this->options['color'] = $color->name;
    }

    //metodos para incrementar las cantidades o deshabilitar
    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    //metodo para actualizar el carrito de compras
    public function addItem(){
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->quantity = qty_available($this->product->id, $this->color_id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
    }

    //metodo que renderiza la vista y se ejecuta cada que hay un cambio en la vista
    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

}
