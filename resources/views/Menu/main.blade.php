<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="/css/style-footer.css">
    <link rel="stylesheet" href="/css/style-navbar.css">
    <link rel="stylesheet" href="/css/style-card.css">
    <link rel="stylesheet" href="/css/style-cart.css">
    <title>Anggrek Bandung</title>
    <style>
        body {
            height: 100vh;
            width: 100%;
            
        }
        /* Gaya dasar untuk navbar */
        

            /* Gaya untuk container dinamis */
        .container-main {
            
            position: relative; 
            top:60px;
            height: calc(100vh - 270px); /* 100vh dikurangi tinggi fixed-container */
            overflow-y: auto; /* Gulir jika kontennya melebihi tinggi */
            padding-top: 50px;
            z-index: 0;
            transition: height 0.5s ease-in;
        }
        .container-main::-webkit-scrollbar {
            width: 8px; /* Lebar scrollbar (vertikal) */
        }

        /* Gaya lintasan (track) scrollbar */
        .container-main::-webkit-scrollbar-track {
            background: #f1f1f1; /* Warna lintasan */
            border-radius: 10px; /* Radius sudut */
        }

        /* Gaya bagian penggeser (thumb) scrollbar */
        .container-main::-webkit-scrollbar-thumb {
            background: #888; /* Warna penggeser */
            border-radius: 10px; /* Radius sudut */
        }

        /* Gaya penggeser saat hover */
        .container-main::-webkit-scrollbar-thumb:hover {
            background: #555; /* Warna penggeser saat disorot */
        }

        .input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 10px;
        }
        @media (max-width: 576px) {
            .container-main {
                padding-left: 0 !important;
                padding-right: 0 !important;
                height: calc(100vh - 220px);
            }
            .card-row {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
            .card {
                width: 48% !important;
                margin: 1% !important;
            }
            .contact-container {
                width: 90% !important;
                padding-top: 250px;
                margin-bottom: 50px;
             /* Lebar container menjadi 90% */
            }
            .contact-row .col-12 {
                width: 100%; /* Kolom memenuhi lebar container */
                /* Beri jarak antar kolom */
            }
            #map-container iframe {
                height: 300px; /* Tinggi iframe pada mobile */
            }
        }
    </style>
</head>
<body>
    <div id="content"></div>
    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7b730c13ab.js" crossorigin="anonymous"></script>   
    @stack('scripts')
    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>