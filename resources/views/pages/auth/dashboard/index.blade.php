<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;

name('dashboard');

new class extends Component {

  //
    
}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-header title="Dashboard" subtitle="dashboard front page" size="text-xl" separator />

  </div>

  @endvolt

</x-dashboard-layout>
