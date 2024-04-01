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

    @foreach ($products as $product)

    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">

      <x-card title="Nice things">

        I am using slots here.

        <x-slot:figure>

          <img src="/img/3/2.jpeg" alt="busana-muslim" />

        </x-slot:figure>

        <x-slot:actions>

          <x-button label="Detail Produk" class="btn-primary btn-sm" link="/product/{{ $product->slug }}" />

        </x-slot:actions>

      </x-card>

    </div>

    @endforeach

  </div>

  @endvolt

</x-app-layout>
