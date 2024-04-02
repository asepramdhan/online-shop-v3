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

    <x-menu-item title="Home" icon="o-home" link="###" />

    <x-menu-item title="Messages" icon="o-envelope" link="###" />

    <x-menu-sub title="Settings" icon="o-cog-6-tooth">

      <x-menu-item title="Wifi" icon="o-wifi" link="####" />

      <x-menu-item title="Archives" icon="o-archive-box" link="####" />

    </x-menu-sub>

  </x-menu>

</x-slot:sidebar>
