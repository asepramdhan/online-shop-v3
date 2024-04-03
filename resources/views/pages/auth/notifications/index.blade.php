<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;

name('notifications');

new class extends Component {

  //
    
}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-header title="Notifications" subtitle="notifications front page" size="text-xl" separator />

  </div>

  @endvolt

</x-dashboard-layout>
