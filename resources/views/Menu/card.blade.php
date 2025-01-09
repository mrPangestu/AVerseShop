<!-- resources/views/products/card.blade.php -->
@foreach($products as $product)
<div class="card mx-3 p-0" data-product-id="{{ $product->id }}">
    <div class="card-background" style="background-image: url('{{ asset('storage/' . $product->image) }}');" class="card-img-top" height="170px" alt="{{ $product->product_name }}" 
        data-bs-toggle="modal" data-bs-target="#myModal"
        data-name="{{ $product->product_name }}"
        data-price="{{ number_format($product->price, 0, ',', '.') }}"
        data-stock="{{ $product->stock }}"
        data-description="{{ $product->description }}"
        data-image="{{ asset('storage/' . $product->image) }}"></div>
    <div class="card-body m-0 px-3 py-0">
        <h5 class="card-title my-1">{{ $product->product_name }}</h5>
        <p class="card-text m-0 ps-1">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="card-text m-0 ps-1">Stok: 
            <span id="stock-{{ $product->id }}">{{ $product->stock }}</span>
        </p>
        
        @if(Auth::check() && Auth::id() == 1)
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Hapus</button>
            </form>
            
        @else
            <div class="d-grid">
                <button class="btn btn-primary my-2 add-to-cart" data-product-id="{{ $product->id }}">Tambah ke Keranjang</button>
            </div>
        @endif





    </div>
</div>


@endforeach


