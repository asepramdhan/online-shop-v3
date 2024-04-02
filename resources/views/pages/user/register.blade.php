<?php

use Livewire\Volt\Component;
use function Laravel\Folio\{middleware};
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use App\Models\User;  

middleware(['guest']);

new class extends Component {

  #[Validate('required|min:3')]
  public $name = '';

  #[Validate('required|email:dns|unique:users')]
  public $email = '';

  #[Validate('required|min:6')]
  public $password = '';

  public function register() {
    
    $validateData = $this->validate();

    $validateData['password'] = Hash::make($this->password);

    User::create($validateData);

    session()->flash('success', 'Pendaftaran akun berhasil, silahkan login!');

    $this->redirect('/user/login', navigate:true);

  }
    
}; 

?>

<x-app-layout>

  @volt

  <div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

      <div class="md:col-start-2 md:col-span-2">

        <x-form wire:submit="register">

          <x-input label="Nama Lengkap" wire:model="name" />

          <x-input label="Email" wire:model="email" />

          <x-input label="Password" wire:model="password" type="password" />

          <x-slot:actions>

            <x-button label="Register" class="btn-primary" type="submit" spinner="register" />

          </x-slot:actions>

        </x-form>

      </div>

    </div>

  </div>

  @endvolt

</x-app-layout>
