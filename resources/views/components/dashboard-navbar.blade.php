<?php
  use Livewire\Volt\Component;
  new class extends Component {
    public function logout() {
      auth()->logout();
      session()->flash('success', 'Berhasil logout, silahkan login kembali!');
      $this->redirect('/user/login', navigate:true); 
    }
  }; 
?>
<x-nav sticky full-width class="bg-slate-300">
  <x-slot:brand>
    <label for="main-drawer" class="lg:hidden mr-3">
      <x-icon name="o-bars-3" class="cursor-pointer" />
    </label>
    <div>
      <a wire:navigate href="/auth/dashboard">
        ONLINE SHOP
      </a>
    </div>
  </x-slot:brand>
  <x-slot:actions>
    <x-button icon="o-bell" class="btn-circle relative btn-sm" link="/auth/notifications" responsive>
      <x-badge value="2" class="badge-success badge-sm absolute -right-2 -top-2" />
    </x-button>
    @volt
    <x-form wire:submit="logout">
      <x-button icon="s-arrow-right-start-on-rectangle" class="btn-circle btn-sm" type="submit" spinner="logout" />
    </x-form>
    @endvolt
  </x-slot:actions>
</x-nav>
