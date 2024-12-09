<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style-footer.css">
    <link rel="stylesheet" href="/css/style-navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            height: 100vh;
            width: 100%;
            
        }
        /* Gaya dasar untuk navbar */


            /* Gaya untuk container dinamis */
        .container-main {
        height: calc(100vh - 20px); /* 100vh dikurangi tinggi fixed-container */
        overflow-y: auto; /* Gulir jika kontennya melebihi tinggi */
        padding-top: 50px;
        z-index: 0;
        }
        .input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    @yield('content')


    <script src="https://kit.fontawesome.com/7b730c13ab.js" crossorigin="anonymous"></script>   
</body>
</html>