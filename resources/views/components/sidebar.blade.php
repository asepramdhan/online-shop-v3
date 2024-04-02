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

<x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">

  @if($user = auth()->user())

  <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">

    <x-slot:actions>

      @volt

      <x-form wire:submit='logout'>

        <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" type="submit" spinner="logout" />

      </x-form>

      @endvolt

    </x-slot:actions>

  </x-list-item>

  <x-menu-separator />

  @endif

  <x-menu activate-by-route>

    <x-menu-item title="Dashboard" icon="o-home" link="/auth/dashboard" />

    <x-menu-item title="Orders" icon="o-document-text" link="/auth/orders" />

    <x-menu-item title="Products" icon="o-shopping-cart" link="/auth/products" />

    <x-menu-item title="Customers" icon="o-users" link="/auth/customers" />

    <x-menu-item title="Reports" icon="o-chart-pie" link="/auth/reports" />

    <x-menu-sub title="Settings" icon="o-cog-6-tooth">

      <x-menu-item title="Integration" icon="o-puzzle-piece" link="/auth/settings/integration" />

      <x-menu-item title="Account" icon="o-user" link="/auth/settings/account" />

    </x-menu-sub>

  </x-menu>

</x-slot:sidebar>
