<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function storeTransaction(TransactionRequest $request, $id){

        $barang = Barang::findOrFail($id);
        $jumlah = $barang->jumlah;
        $quantity = $request->quantity;

        if($jumlah < $quantity){
            return redirect(route('getOrder',['id'=>$barang->id]));
        }

        $barang->update([
            'jumlah' => $barang->jumlah - $request->quantity
        ]);

        $randomNumber = random_int(100000, 999999);
        $invoice = 'INV'.$randomNumber;

        Transaction::create([
            'barang_id' => $id,
            'quantity' => $request->quantity,
            'alamat' => $request->alamat,
            'pos' => $request->pos,
            'invoice' => $invoice,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('getFaktur'));
    }

    public function getTransaction(){
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        $barangs = Barang::all();
        $kategoris = Kategori::all();

        return view('user.faktur',compact('transactions','barangs','kategoris'));
    }

    public function getOrderPage($id){
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();

        if ($barang->jumlah == 0){
            return redirect(route('getHome'));
        }

        return view('user.transaction',compact('barang','kategoris'));
    }
}
