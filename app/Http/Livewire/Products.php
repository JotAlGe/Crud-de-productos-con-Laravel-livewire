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


    public function edit($id)
    {
        $this->product = Product::findOrFail($id);
        $this->showEdit = true;
        return view('livewire.edit');
    }

    // update
    public function update($product_id)
    {
        $product = Product::find($product_id);
        $product->update([
            'title' => $this->title,
            'amount' => $this->amount
        ]);
        $this->showEdit = false;
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
