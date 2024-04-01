<?php

use Livewire\Volt\Component;
use function Laravel\Folio\{middleware};

middleware(['guest']);

new class extends Component {

  //
    
}; 

?>

<x-app-layout>

  @volt

  <div>

    Register Page

  </div>

  @endvolt

</x-app-layout>
