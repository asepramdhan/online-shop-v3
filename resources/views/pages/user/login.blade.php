<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;
use function Laravel\Folio\{middleware};

name('login');

middleware(['guest']);

new class extends Component {

  //
    
}; 

?>

<x-app-layout>

  @volt

  <div>

    Login Page

  </div>

  @endvolt

</x-app-layout>
