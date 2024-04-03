<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;

name('reports');

new class extends Component {

  //
    
}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-header title="Reports" subtitle="reports front page" size="text-xl" separator />

  </div>

  @endvolt

</x-dashboard-layout>
