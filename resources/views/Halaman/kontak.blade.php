@extends('Menu.main')
@section('content')
<div class="container-main container-fluid d-flex justify-content-center align-items-center pb-5">
    <div class="container-md " style=" width:60%;">
        <div class="row m-0">
            <!-- Kolom dengan Google Maps -->
            <div class="col-6 p-0">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2812.498606350784!2d107.63740433721992!3d-6.898949051635015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e79ed5547621%3A0xe0e4fe272540b18b!2sANGGREK%20BANDUNG!5e0!3m2!1sid!2sid!4v1733142594285!5m2!1sid!2sid" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
            
            <!-- Kolom dengan form -->
            <div class="col-6 text-center" style="background: blueviolet">
              <h3 class="my-4">Pesan</h3>
              <form action="#">
                <input type="text" class="form-control mb-2" placeholder="Nama">
                <textarea class="form-control mb-2" name="pesan" id="pesan" cols="10" rows="3" placeholder="Pesan"></textarea>
                <button class="btn btn-primary w-100 mb-3" type="submit">Kirim</button>
              </form>
            </div>
          </div>
    </div>
</div>
@endsection
@include('Menu.navbar')
@include('Menu.footer')