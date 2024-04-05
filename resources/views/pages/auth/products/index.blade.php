<?php
use Livewire\Volt\Component;
use function Laravel\Folio\name;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\On;
name('products');
new class extends Component {
  use WithPagination;
  public bool $deleteModal = false;
  public $products, $headers;
  public function mount() {
    $this->products = Product::all();
    $this->headers = [
    ['key' => 'id', 'label' => '#', 'class' => 'bg-red-500/20'], # <--- custom CSS
    ['key' => 'image', 'label' => 'Gambar'],
    ['key' => 'title', 'label' => 'Nama Produk'],
    ];
  }
  public function delete($id) {
    $this->products->find($id)->delete();
    // hapus juga gambar yang ada di storage
    $image = $this->products->find($id)->image;
    if ($image) {
      Storage::disk('public')->delete($image);
    }
    $this->dispatch('produks');
  }
  #[On('produks')] 
  public function updateProduks()
  {
    // ...
  }
}; 
?>
<x-dashboard-layout>
  @volt
  <div>
    <x-header title="Products" subtitle="products front page">
      <x-slot:middle class="!justify-end">
        <x-input icon="o-magnifying-glass" placeholder="Search..." />
      </x-slot:middle>
      <x-slot:actions>
        <x-button icon="o-plus" class="btn-primary" link="/auth/products/create" />
      </x-slot:actions>
    </x-header>
    @if(session()->has('success'))
    <x-alert icon="o-exclamation-triangle" class="alert-success mb-3">
      {{ session('success') }}
    </x-alert>
    @endif
    {{-- You can use any `link navigate` --}}
    <x-table :headers="$headers" :rows="$products" link="/auth/products/show/{id}" striped>
      @scope('header_id', $header)
      <h2 class="text-xl font-bold text-slate-700">
        {{ $header['label'] }}
      </h2>
      @endscope
      @scope('header_image', $header)
      <h2 class="text-xl font-bold text-slate-700">
        {{ $header['label'] }}
      </h2>
      @endscope
      @scope('header_title', $header)
      <h2 class="text-xl font-bold text-slate-700">
        {{ $header['label'] }}
      </h2>
      @endscope
      {{-- Notice `$user` is the current row item on loop --}}
      @scope('cell_id', $post)
      <strong>{{ $this->loop->iteration }}</strong>
      @endscope
      @scope('cell_image', $post)
      <x-avatar :image="asset('storage/' . $post->image)" class="!w-14 !rounded-lg">
      </x-avatar>
      @endscope
      {{-- Special `actions` slot --}}
      @scope('actions', $product)
      <div class="flex gap-2">
        <x-button icon="o-pencil" class="btn-sm" link="/auth/products/edit/{{ $product->id }}" />
        <x-button icon="o-trash" @click="$wire.deleteModal = true" class="btn-sm" />
      </div>
      <x-modal wire:model="deleteModal" class="backdrop-blur" class="text-center">
        <div class="mb-5">Apakah anda yakin ingin menghapus produk ini?</div>
        <x-button label="Cancel" @click="$wire.deleteModal = false" />
        <x-button label="Delete" @click="$wire.deleteModal = false; $wire.delete({{ $product->id }})" />
      </x-modal>
      @endscope
    </x-table>
  </div>
  @endvolt
</x-dashboard-layout>
