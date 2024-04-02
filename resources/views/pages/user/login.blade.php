<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;
use function Laravel\Folio\{middleware};
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

name('login');

middleware(['guest']);

new class extends Component {

  #[Validate('required|email:dns')]
  public $email = '';
  
  #[Validate('required')]
  public $password = '';

  public function login() {
    
    $credentials = $this->validate();

    if (Auth::attempt($credentials)) {
      
      $this->redirect('/auth/dashboard', navigate:true);

    } else {
        
      session()->flash('error', 'Email atau password anda salah!');

      $this->redirect('/user/login', navigate:true);

    }

  }

}; 

?>

<x-app-layout>

  @volt

  <div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

      <div class="md:col-start-2 md:col-span-2">

        @if(session()->has('success'))

        <x-alert icon="o-exclamation-triangle" class="alert-success mb-2">

          {{ session('success') }}

        </x-alert>

        @endif

        @if(session()->has('error'))

        <x-alert icon="o-exclamation-triangle" class="alert-error mb-2">

          {{ session('error') }}

        </x-alert>

        @endif

        <x-form wire:submit="login">

          <x-input label="Email" wire:model="email" />

          <x-input label="Password" wire:model="password" type="password" />

          <x-slot:actions>

            <x-button label="Login" class="btn-primary" type="submit" spinner="login" />

          </x-slot:actions>

        </x-form>

      </div>

    </div>

  </div>

  @endvolt

</x-app-layout>
