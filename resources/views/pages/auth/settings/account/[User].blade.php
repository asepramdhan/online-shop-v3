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
  public $avatar;
  public function mount() {
    $this->name = $this->user->name;
    $this->email = $this->user->email;
    $this->avatar = $this->user->avatar;
  }
  public function save() {
    $validatedData = $this->validate();
    // jika avatar di ubah, maka hapus avatar lama jika ada dan simpan avatar baru
    if ($this->avatar) {
      if ($this->user->avatar) {
        Storage::disk('public')->delete($this->user->avatar);
      }
      $validatedData['avatar'] = $this->avatar->store(path: 'avatars');
    }
    Auth::user()->update($validatedData);
    session()->flash('success', 'Akun anda berhasil diperbarui!');
  }
}; 
?>
<x-dashboard-layout>
  @volt
  <div>
    <x-header title="Account Settings" subtitle="Account settings home page" size="text-xl" separator />
    @if(session()->has('success'))
    <x-alert icon="o-exclamation-triangle" class="alert-success mb-2">
      {{ session('success') }}
    </x-alert>
    @endif
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
