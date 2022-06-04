<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getHomePage(){

        $barangs = Barang::all();
        $kategoris = Kategori::all();

        return view('home.home',compact('barangs','kategoris'));
    }

    public function getRegisterPage(){
        return view('home.register');
    }

    public function getLoginPage(){
        return view('home.login');
    }

    public function getProductPage($id){
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();

        if($barang->jumlah == 0){
            return redirect(route('getHome'));
        }

        return view('home.product',compact('barang','kategoris'));
    }
}
