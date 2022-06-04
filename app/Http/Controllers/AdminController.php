<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getManagePage(){
        $barangs = Barang::all();
        $kategoris = Kategori::all();

        return view('admin.manage',compact('barangs','kategoris'));
    }

    public function getCreatePage(){
        $kategoris = Kategori::all();

        return view('admin.create',compact('kategoris'));
    }

    public function adminTransaction(){
        $transactions = Transaction::all();
        $barangs = Barang::all();
        $kategoris = Kategori::all();

        return view('admin.managePesanan',compact('transactions','barangs','kategoris'));
    }

    public function updateTransaction($id){
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'status' => 'Accepted'
        ]);

        return redirect(route('manageTransaction'));
    }
}
