<input type="checkbox" class="footer" name="footer" id="footer">
<div class="container-footer container-fluid position-fixed bottom-0 px-0">
    <div class="row pb-2">
        <!-- Tautan Cepat (akan disembunyikan di layar kecil) -->
        <div class="col order-last ms-5 ps-5">
            <h6>Tautan Cepat</h6>
            <ul class="list-unstyled">
                <li><a href="{{ route('main') }}">Beranda</a></li>
                <li><a href="{{ route('about') }}">Tentang</a></li>
                <li><a href="{{ route('product') }}">Produk</a></li>
                <li><a href="{{ route('Contact') }}">Kontak</a></li>
            </ul>
        </div>
        
        <!-- Hubungi Kami -->
        <div class="col">
            Hubungi Kami
            <div class="row row-cols-1 d-flex justify-content-start">
                <div class="col my-1">
                    <div class="row">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="col d-flex align-items-center">
                            Neglasari, Cibeunying Kaler, Kota Bandung, Jawa Barat 40124
                        </div>
                    </div>
                </div>
                <div class="col my-1">
                    <div class="row">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <div class="col d-flex align-items-center">
                            Anggrek_bandung
                        </div>
                    </div>
                </div>
                <div class="col my-1">
                    <div class="row">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="col d-flex align-items-center">
                            Telp +6282311377490
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo (akan ditampilkan di tengah) -->
        <div class="col-4 order-first d-flex justify-content-center align-items-center" >
            <img src="/img/logo.jpg" alt="" class="">
        </div>
    </div>

    <!-- Footer bawah -->
    <div class="container-fluid py-1" style="background: #891b80; color:white ">
        <h6 class="copyright" style="text-align: center">Copyright : Anggrek Bandung</h6>
    </div>
</div>
