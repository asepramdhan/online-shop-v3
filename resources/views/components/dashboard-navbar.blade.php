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

    <x-button label="Notifications" icon="o-bell" link="/auth/notifications" class="btn-ghost btn-sm" responsive />

  </x-slot:actions>

</x-nav>
