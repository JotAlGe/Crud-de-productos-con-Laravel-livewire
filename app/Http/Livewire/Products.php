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

    public function edit($id)
    {
        $this->product = Product::findOrFail($id);
        $this->showEdit = true;
        return view('livewire.edit');
    }



    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }
}
