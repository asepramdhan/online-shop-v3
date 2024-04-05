<?php
use Livewire\Volt\Component;
new class extends Component {
  public $product;
}; 
?>
<x-dashboard-layout>
  @volt
  <div>
    <h3 class="text-xl mb-3">{{ $product->title }}</h3>
    <div class="grid grid-cols-2 mb-3">
      <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
    </div>
    <p>
      {!! $product->body !!}
    </p>
  </div>
  @endvolt
</x-dashboard-layout>
