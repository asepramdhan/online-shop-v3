<x-nav class="bg-error text-white" sticky full-width>

  <x-slot:brand>

    <div>

      <a wire:navigate href="/">

        ONLINE SHOP

      </a>

    </div>

  </x-slot:brand>

  <x-slot:actions>

    @auth

    <x-button label="DASHBOARD" icon="o-home" link="/auth/dashboard" class="btn-ghost btn-sm" responsive />

    @else

    <x-button label="LOGIN" icon="o-user" link="/user/login" class="btn-ghost btn-sm" responsive />

    <x-button label="REGISTER" icon="o-user-plus" link="/user/register" class="btn-warning btn-sm" />

    @endauth

  </x-slot:actions>

</x-nav>
