<?php

use Livewire\Volt\Component;
use function Laravel\Folio\name;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth; // Assuming Laravel authentication

name('account');

new class extends Component {

  use WithFileUploads;

  public $user;
  
  #[Validate('required')]
  public $name, $email;
  
  #[Validate('required|image|file|max:1024')]
  public $avatar;

  public function mount() {
    
    $this->name = $this->user->name;

    $this->email = $this->user->email;

    $this->avatar = $this->user->avatar;

  }

  public function save() {

    $validateData = $this->validate();
    
    $validateData['avatar'] = $this->avatar->store(path: 'avatars');

    Auth::user()->update($validateData);

    dd('user berhasil diupadte');

  }

}; 

?>

<x-dashboard-layout>

  @volt

  <div>

    <x-form wire:submit="save">

      <x-input label="Name" wire:model="name" />

      <x-input label="Email" wire:model="email" />

      <x-file wire:model='avatar' label="Avatar" accept="image/png, image/jpeg">

        <img src="{{ asset('storage/' . $avatar) ?? '/img/blank avatar.webp' }}" class="h-40 rounded-lg" />

      </x-file>

      <x-slot:actions>

        <x-button label="Simpan" class="btn-primary" type="submit" spinner="save" />

      </x-slot:actions>

    </x-form>

  </div>

  @endvolt

</x-dashboard-layout>
