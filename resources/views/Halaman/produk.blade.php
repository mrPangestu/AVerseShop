@extends('Menu.main')

@section('content')
<div class="container-main container-fluid px-5 d-flex justify-content-center align-items-start">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mx-5 overflow-hidden d-flex justify-content-center">
        <!-- Tombol Tambah Produk untuk Admin -->
        @if (Auth::check() && Auth::id() == 1)
            <div class="card mx-3 p-0 align-items-center justify-content-center" style="width: 15rem;">
                <a href="{{ route('products.create') }}" class="btn btn-primary my-3" style="font-size:20px;">Tambah Produk</a>
            </div>
        @endif

        <!-- Include Card Produk -->
        @include('Menu.card')
    </div>
</div>

<!-- Include Modal Box -->
@include('Menu.modalbox')
@endsection

@include('Menu.navbar')
@include('Menu.footer')

@push('scripts')
<script>
    // Saat card diklik, isi data modal dengan dinamis
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById('myModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Card yang diklik
            const name = button.getAttribute('data-name');
            const price = button.getAttribute('data-price');
            const stock = button.getAttribute('data-stock');
            const description = button.getAttribute('data-description');
            const image = button.getAttribute('data-image');

            // Set data ke modal
            document.getElementById('modalProductName').textContent = name;
            document.getElementById('modalProductPrice').textContent = 'Rp ' + price;
            document.getElementById('modalProductStock').textContent = stock;
            document.getElementById('modalProductDescription').textContent = description;
            document.getElementById('modalProductImage').src = image;
        });

        // Animasi saat card masuk ke viewport
        const cards = document.querySelectorAll(".card");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate");
                } else {
                    entry.target.classList.remove("animate");
                }
            });
        }, { threshold: 0.1 });

        cards.forEach(card => observer.observe(card));
    });

    // Fungsi untuk menambahkan produk ke keranjang
    document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.add-to-cart');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');

            fetch('/produk/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Perbarui stok di card
                    const stockElement = document.querySelector(`#stock-${productId}`);
                    if (stockElement) {
                        stockElement.textContent = data.new_stock; // Stok terbaru dari server
                    }

                    alert(data.message);
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            });
        });
    });
});

</script>
@endpush
