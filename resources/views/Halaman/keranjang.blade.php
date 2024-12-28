@extends('Menu.main')
@section('content')

<div class="container cart-container">
    <!-- Back Button -->
    <div class="mb-3">
        <button class="btn-back" onclick="window.history.back();">
            <i class="fas fa-arrow-left"></i> Kembali
        </button>
    </div>

    @if($carts->count())
        <!-- Header -->
        <div class="cart-header">
            <div class="select-all">
                <input type="checkbox" id="select-all">
                <label for="select-all" class="ms-2">Pilih Semua</label>
            </div>
            <button class="btn btn-link text-danger">Hapus</button>
        </div>

        <!-- Daftar Produk -->
        @foreach($carts as $cart)

        <div class="cart-item d-flex align-items-center mb-3">
            <input type="checkbox" class="cart-checkbox" data-cart-id="{{ $cart->id }}">
            <img src="{{ asset($cart->product->image) }}" alt="{{ $cart->product->name }}">
            <div class="cart-item-info">
                <h6 class="mb-1">{{ $cart->product->product_name }}</h6>
                <div class="text-muted">Varian: {{ $cart->variant }}</div>
            </div>
            <div class="price me-3">Rp {{ number_format($cart->total_price, 0, ',', '.') }}</div>
            <div class="quantity-controls">
                <button class="decrease-quantity" data-cart-id="{{ $cart->id }}">-</button>
                <span id="quantity-{{ $cart->id }}">{{ $cart->quantity }}</span>
                <button class="increase-quantity" data-cart-id="{{ $cart->id }}">+</button>
            </div>
            <div class="total-price ms-3" id="total-price-{{ $cart->id }}">Rp {{ number_format($cart->total_price, 0, ',', '.') }}</div>
        </div>        

    

@endforeach


        <!-- Footer -->
        <div class="cart-footer mt-4">
            <div class="select-all">
                <input type="checkbox" id="select-all-footer">
                <label for="select-all-footer" class="ms-2">Pilih Semua</label>
            </div>
            <div class="d-flex align-items-center flex-wrap mt-2">
                <span class="me-3">Total: <span class="fw-bold">Rp {{ number_format($carts->sum('total_price'), 0, ',', '.') }}</span></span>
                <button class="btn btn-primary">Checkout</button>
            </div>
        </div>
    @else
        <div class="text-center mt-5">
            <p>Keranjang Anda kosong. <a href="{{ route('products.index') }}">Belanja sekarang!</a></p>
        </div>
    @endif
</div>

@endsection

@push('scripts')
<script>

function formatRupiah(amount) {
    return 'Rp ' + amount.toLocaleString('id-ID', { minimumFractionDigits: 0 });
}


document.addEventListener('DOMContentLoaded', function () {
    // Untuk tombol (+) dan (-)
     // Untuk tombol (-) dan (+)
     const decreaseButtons = document.querySelectorAll('.decrease-quantity');
    const increaseButtons = document.querySelectorAll('.increase-quantity');

    decreaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cartId = this.getAttribute('data-cart-id');
            const quantityElement = document.querySelector(`#quantity-${cartId}`);
            const totalPriceElement = document.querySelector(`#total-price-${cartId}`);
            const currentQuantity = parseInt(quantityElement.textContent);

            // Validasi jika quantity lebih besar dari 1
            if (currentQuantity > 1) {
                // Mengirim request untuk mengurangi quantity
                fetch(`/keranjang/update/${cartId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ action: 'decrease' })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update quantity dan total harga setelah sukses
                        quantityElement.textContent = data.new_quantity;
                        totalPriceElement.textContent = formatRupiah(data.new_total_price);

                        // Update total harga di footer
                        updateCartTotalPrice();
                    } else {
                        alert(data.message); // Menampilkan error
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
            }
        });
    });

    increaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cartId = this.getAttribute('data-cart-id');
            const quantityElement = document.querySelector(`#quantity-${cartId}`);
            const totalPriceElement = document.querySelector(`#total-price-${cartId}`);
            const currentQuantity = parseInt(quantityElement.textContent);

            // Mengirim request untuk menambah quantity
            fetch(`/keranjang/update/${cartId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ action: 'increase' })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update quantity dan total harga setelah sukses
                    quantityElement.textContent = data.new_quantity;
                    totalPriceElement.textContent = formatRupiah(data.new_total_price);

                    // Update total harga di footer
                    updateCartTotalPrice();
                } else {
                    alert(data.message); // Menampilkan error
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            });
        });
    });



    // Hapus Produk yang Dipilih
    const deleteSelectedButton = document.querySelector('.btn.btn-link.text-danger');
    deleteSelectedButton.addEventListener('click', function () {
        const selectedCheckboxes = document.querySelectorAll('.cart-checkbox:checked');
        const cartIds = [];

        selectedCheckboxes.forEach(checkbox => {
            cartIds.push(checkbox.getAttribute('data-cart-id'));
        });

        if (cartIds.length > 0) {
            fetch('/keranjang/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ cart_ids: cartIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    // Menghapus produk dari tampilan
                    selectedCheckboxes.forEach(checkbox => {
                        const cartItemRow = checkbox.closest('.cart-item');
                        cartItemRow.remove();

                        updateCartTotalPrice();

                    });
                } else {
                    alert('Gagal menghapus produk.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            });
        } else {
            alert('Pilih produk yang ingin dihapus.');
        }
    });
    

    // Fungsi untuk mengupdate total harga di footer
    function updateCartTotalPrice() {
        let totalPrice = 0;

        // Menambahkan total harga untuk setiap produk
        document.querySelectorAll('.total-price').forEach(priceElement => {
            const price = parseFloat(priceElement.textContent.replace('Rp', '').replace(/\./g, '').trim());
            totalPrice += price;
        });

        // Update total harga di footer
        document.querySelector('.cart-footer .fw-bold').textContent = formatRupiah(totalPrice);
    }


    const selectAllCheckbox = document.getElementById('select-all');
    const itemCheckboxes = document.querySelectorAll('.cart-checkbox');

    // Fungsi untuk memilih atau membatalkan semua checkbox
    selectAllCheckbox.addEventListener('change', function () {
        const isChecked = selectAllCheckbox.checked;

        itemCheckboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        });
    });

    // Fungsi untuk memeriksa status "Pilih Semua" saat checkbox individu berubah
    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const allChecked = Array.from(itemCheckboxes).every(cb => cb.checked);
            const noneChecked = Array.from(itemCheckboxes).every(cb => !cb.checked);

            if (allChecked) {
                selectAllCheckbox.checked = true;
                selectAllCheckbox.indeterminate = false;
            } else if (noneChecked) {
                selectAllCheckbox.checked = false;
                selectAllCheckbox.indeterminate = false;
            } else {
                selectAllCheckbox.indeterminate = true; // "Pilih Semua" menjadi indeterminate
            }
        });
    });


});


</script>
    
@endpush