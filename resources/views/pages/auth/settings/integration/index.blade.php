<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;

name('integration');

new class extends Component {

  //
    
}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-header title="Integration Settings" subtitle="integration settings front page" size="text-xl" separator />

  </div>

  @endvolt

</x-dashboard-layout>
