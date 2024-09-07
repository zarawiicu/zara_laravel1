<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index (){
        return 'Selamat Datang:)';
    }

    public function about (){
        return ' 242107071002 / Zara Salsa Aulia';
    }

    public function article($id){
        return 'Halaman artikel dengan ID ' . $id;
    }
}
