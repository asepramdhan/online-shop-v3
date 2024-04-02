<?php

use Livewire\Volt\Component;
use App\Models\User;

new class extends Component {

  public $users;

  public function mount() {
    
    $this->users = User::all();

  }

}; 

?>

<x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">

  @volt

  <x-menu>

    @foreach ($users as $user)

    <x-avatar :image="asset('storage/' . $user->avatar)" :title="$user->name" class="m-2" />

    @endforeach

  </x-menu>

  @endvolt

</x-slot:sidebar>
