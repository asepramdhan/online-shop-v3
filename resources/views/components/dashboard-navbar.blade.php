<x-nav sticky full-width>

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

    <x-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />

    <x-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />

  </x-slot:actions>

</x-nav>
