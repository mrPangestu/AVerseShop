@extends('Menu.main')
@section('content')
    <div class="container-main container-fluid px-5  d-flex justify-content-center align-items-start">
        <div class="row mx-5 overflow-hidden d-flex justify-content-center" >


            <div class="card mx-3 p-0" style="width: 15rem;" data-bs-toggle="modal" data-bs-target="#myModal"> 
                <div class="card-background" style="background-image: url(/img/jenis1.jpg);" class="card-img-top " height="170px" alt="..."></div>
                <div class="card-body m-0 px-3 py-0">
                    <h5 class="card-title my-1">Anggrek Bulan</h5>
                    <p class="card-text m-0 ps-1">Rp. 90.000,00</p>
                    <p class="card-text m-0 ps-1">Stok 10</p>
                    <div class="d-grid">
                        <button class="btn btn-primary my-2" type="button">Pesan</button>
                    </div>
                </div>
            </div>
            <div class="card mx-3 p-0" style="width: 15rem;" data-bs-toggle="modal" data-bs-target="#myModal">
                <div class="card-background" style="background-image: url(/img/jenis2.jpg);" class="card-img-top " height="170px" alt="..."></div>
                <div class="card-body m-0 px-3 py-0">
                    <h5 class="card-title my-1">Anggrek Hitam</h5>
                    <p class="card-text m-0 ps-1">Rp. 120.000,00</p>
                    <p class="card-text m-0 ps-1">Stok 5</p>
                    <div class="d-grid">
                        <button class="btn btn-primary my-2" type="button">Pesan</button>
                    </div>
                </div>
            </div>
            <div class="card mx-3 p-0" style="width: 15rem;" data-bs-toggle="modal" data-bs-target="#myModal">
                <div class="card-background" style="background-image: url(/img/jenis3.jpg);" class="card-img-top " height="170px" alt="..."></div>
                <div class="card-body m-0 px-3 py-0">
                    <h5 class="card-title my-1">Anggrek Bibir Berbulu</h5>
                    <p class="card-text m-0 ps-1">Rp. 100.000,00</p>
                    <p class="card-text m-0 ps-1">Stok 7</p>
                    <div class="d-grid">
                        <button class="btn btn-primary my-2" type="button">Pesan</button>
                    </div>
                </div>
            </div>
            <div class="card mx-3 p-0" style="width: 15rem;" data-bs-toggle="modal" data-bs-target="#myModal">
                <div class="card-background" style="background-image: url(/img/jenis4.jpeg);" class="card-img-top " height="170px" alt="..."></div>
                <div class="card-body m-0 px-3 py-0">
                    <h5 class="card-title my-1">Anggrek Kebutan</h5>
                    <p class="card-text m-0 ps-1">Rp. 120.000,00</p>
                    <p class="card-text m-0 ps-1">Stok 5</p>
                    <div class="d-grid">
                        <button class="btn btn-primary my-2" type="button">Pesan</button>
                    </div>
                </div>
            </div>
            

            


        </div>
    </div>

    
@endsection
@include('Menu.modalbox')
@include('Menu.navbar')
@include('Menu.footer')