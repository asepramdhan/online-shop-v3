<?php

use Livewire\Volt\Component;

new class extends Component {

  public $product;
    
}; 

?>

<x-app-layout>

  @volt

  <div>

    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">

      <div class="md:col-start-2 md:col-span-4">

        <x-card title="Nice things">

          Detail Product Pages ({{ $product->id }})

          <x-slot:figure>

            <img src="/img/3/2.jpeg" alt="busana-muslim" />

          </x-slot:figure>

          <x-slot:actions>

            <x-button label="Beli Sekarang" icon="o-chat-bubble-oval-left-ellipsis" class="btn-primary btn-sm" link="/" />

          </x-slot:actions>

        </x-card>

      </div>

    </div>

  </div>

  @endvolt

</x-app-layout>
