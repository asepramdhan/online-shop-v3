<?php
use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str; 
use Livewire\WithFileUploads;
new class extends Component {
  use WithFileUploads;
  #[Validate('required')]
  public $title, $body;
  #[Validate('required|image|max:1024')]
  public $image;
  public $config = [
    'min_height' => 500,
    'max_height' => 500,
  ];
  public function create() {
    $validatedData = $this->validate();
    $validatedData['slug'] = Str::slug($validatedData['title'], '-');
    $randomString = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz0123456789", 10)), 0, 10);
    $validatedData['slug'] = $validatedData['slug'] . '-' . $randomString;
    $validatedData['image'] = $this->image->store(path: 'images');
    Product::create($validatedData);
    session()->flash('success', 'Produk berhasil ditambahkan!');
    $this->redirect('/auth/products',navigate:true);
  }
}; 
?>
<x-dashboard-layout>
  @volt
  <div>
    <x-header title="Create Product" size="text-xl" separator />
    <x-form wire:submit="create">
      <x-input label="Judul Produk" wire:model="title" />
      <x-file wire:model='image' label="Gambar" accept="image/png, image/jpeg">
        <img src="{{ '/img/blank produk.jpg' }}" class="h-40 rounded-lg" />
      </x-file>
      <x-editor wire:model="body" label="Description" hint="The full product description" disk="public" folder="images" :config="$config" />
      <x-slot:actions>
        <x-button label="Tambah" class="btn-primary" type="submit" spinner="create" />
      </x-slot:actions>
    </x-form>
  </div>
  @endvolt
</x-dashboard-layout>
