<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;

name('products');

new class extends Component {

  //
    
}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-header title="Products" subtitle="products front page" size="text-xl" separator />

  </div>

  @endvolt

</x-dashboard-layout>
