<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showMain(){
        return view('welcome');
    }

    public function showAbout(){
        return view('Halaman.tentang');
    }

  
    public function showContact(){
        return view('Halaman.kontak');
    }
    public function showCart(){
        return view('Halaman.keranjang');
    }

}


