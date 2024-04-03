<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;

name('orders');

new class extends Component {

  //
    
}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-header title="Orders" subtitle="orders front page" size="text-xl" separator />


  </div>

  @endvolt

</x-dashboard-layout>
