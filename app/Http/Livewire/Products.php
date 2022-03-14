<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{

    public $products = [];
    public $modal = false;
    public $showEdit = false;
    public $product;
    public $title, $amount;

    // reglas de validación
    protected $rules = [
        'title' => ['required', 'min:5'],
        'amount' => ['required', 'numeric']
    ];

    // mensajes de error
    protected $messages = [
        'title.required' => 'Debe colocar un nombre para el producto',
        'title.min' => 'El título debe tener al menos 5 caracteres!',
        'amount.required' => 'Debe colocar una cantidad',
        'amount.numeric' => 'La cantidad debe ser numérica'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($id)
    {
        $this->product = Product::findOrFail($id);
        $this->showEdit = true;
        return view('livewire.edit');
    }

    // update
    public function update($product_id)
    {
        $this->validate();

        $product = Product::find($product_id);
        $product->update([
            'title' => $this->title,
            'amount' => $this->amount
        ]);
        $this->showEdit = false;
    }


    // registrar producto
    public function save()
    {
        $validated = $this->validate();
        Product::create($validated);
        $this->modal = false;

        // flash message
        session()->flash('created', 'Se agregó un producto');
    }

    // delete product
    public function delete($id)
    {
        $this->product = Product::findOrFail($id);
        $this->product->delete();

        session()->flash('deleted', 'Se eliminó el producto');
    }

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }
}
