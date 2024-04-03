<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;

name('customers');

new class extends Component {

  //
    
}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-header title="Customers" subtitle="customers front page" size="text-xl" separator />

  </div>

  @endvolt

</x-dashboard-layout>
