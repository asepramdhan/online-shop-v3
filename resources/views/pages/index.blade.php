<?php

use Livewire\Volt\Component;
use App\Models\Product;

new class extends Component {

  public $products;

  public function mount() {
    
    $this->products = Product::all();

  }

}; 

?>

<x-app-layout>

  @volt

  <div>

    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">

      @foreach ($products as $product)

      <x-card title="{{ $product->title }}">

        I am using slots here.

        <x-slot:figure>

          <img src="{{ asset('storage/' . $product->image) }}" alt="busana-muslim" />

        </x-slot:figure>

        <x-slot:actions>

          <x-button label="Detail Produk" class="btn-primary btn-sm" link="/product/{{ $product->slug }}" />

        </x-slot:actions>

      </x-card>

      @endforeach

    </div>

  </div>

  @endvolt

</x-app-layout>
