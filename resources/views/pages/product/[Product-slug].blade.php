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

        <h3 class="text-2xl">{{ $product->title }}</h3>

        <x-card class="mt-3">

          {!! $product->body !!}

          <x-slot:figure>

            <img src="{{ asset('storage/' . $product->image) }}" alt="busana-muslim" />

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
