<x-nav class="bg-error text-white" sticky full-width>

  <x-slot:brand>

    <label for="main-drawer" class="lg:hidden mr-3">

      <x-icon name="o-bars-3" class="cursor-pointer" />

    </label>

    <div>

      <a href="/">

        ONLINE SHOP

      </a>

    </div>

  </x-slot:brand>

  <x-slot:actions>

    <x-button label="LOGIN" icon="o-user" link="/user/login" class="btn-ghost btn-sm" responsive />

    <x-button label="REGISTER" icon="o-user-plus" link="/user/register" class="btn-warning btn-sm" responsive />

  </x-slot:actions>

</x-nav>
