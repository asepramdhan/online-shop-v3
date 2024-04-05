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
  public $image;
  public $product;
  public $config = [
    'min_height' => 500,
    'max_height' => 500,
  ];
  public function mount() {
    $this->title = $this->product->title;
    $this->body = $this->product->body;
  }
  public function update() {
    $validatedData = $this->validate();
    $validatedData['slug'] = Str::slug($validatedData['title'], '-');
    $randomString = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz0123456789", 10)), 0, 10);
    $validatedData['slug'] = $validatedData['slug'] . '-' . $randomString;
    // buat kondisi jika gambar tidak diganti
    if ($this->image == null) {
      $validatedData['image'] = $this->product->image;
    } else {
      // hapus gambar lama jika ada
      if ($this->product->image) {
        Storage::disk('public')->delete($this->product->image);
      }
      // simpan gambar baru
      $validatedData['image'] = $this->image->store(path: 'images');
    }
    $this->product->update($validatedData);
    session()->flash('success', 'Produk berhasil diupdate!');
    $this->redirect('/auth/products',navigate:true);
  }
}; 
?>
<x-dashboard-layout>
  @volt
  <div>
    <x-header title="Edit Product" size="text-xl" separator />
    <x-form wire:submit="update">
      <x-input label="Judul Produk" wire:model="title" />
      <x-file wire:model='image' label="Gambar" accept="image/png, image/jpeg">
        <img src="{{ asset('storage/' . $product->image) ?? '/img/blank produk.jpg' }}" class="h-40 rounded-lg" />
      </x-file>
      <x-editor wire:model="body" label="Description" hint="The full product description" disk="public" folder="images" :config="$config" />
      <x-slot:actions>
        <x-button label="Simpan" class="btn-primary" type="submit" spinner="update" />
      </x-slot:actions>
    </x-form>
  </div>
  @endvolt
</x-dashboard-layout>
