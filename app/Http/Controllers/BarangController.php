<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    public function addBarang(BarangRequest $request){

        if (Auth::user()->id != 1) return abort(404);

        $request->validate([
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);

        // File Processing
        $files = $request->file('foto');
        $fullFileName = $files->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $files->getClientOriginalExtension();
        $foto = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
        $files->storeAs('public/pictures/', $foto);

        // Add book into database
        Barang::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => $foto,
            'kategori_id' => $request->kategori
        ]);

        return redirect(route('getManage'));
    }

    public function getUpdateBarang($id){
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();

        if (Auth::user()->id != 1) return abort(404);

        return view('admin.edit',compact('barang','kategoris'));
    }

    public function updateBarang(BarangRequest $request, $id){

        if (Auth::user()->id != 1) return abort(404);

        $request->validate([
            'foto' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        // Kalo dia gk update gambar
        if ($request->file('foto') == null) {

            $barang = Barang::findOrFail($id);

            $barang->update([
                'name' => $request->name,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'kategori_id' => $request->kategori
            ]);

            return redirect(route('getManage'))->with('success_msg', 'Edit berhasil!');

        } else {

            // File Processing
            $files = $request->file('foto');
            $fullFileName = $files->getClientOriginalName();
            $fileName = pathinfo($fullFileName)['filename'];
            $extension = $files->getClientOriginalExtension();
            $foto = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
            $files->storeAs('public/pictures/', $foto);

            // Update Picture to Database
            $barang = Barang::findOrFail($id);

            if (Storage::exists('public/pictures/' . $barang->foto)) {
                Storage::delete('public/pictures/' . $barang->foto);
            }

            $barang->update([
                'name' => $request->name,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'foto' => $foto,
                'kategori_id' => $request->kategori
            ]);

            return redirect(route('getManage'))->with('success_msg', 'Edit berhasil!');
        }
    }

    public function deleteBarang($id){

        $barang = Barang::findOrFail($id);
        if (Auth::user()->id != 1) return abort(404);

        if (Storage::exists('public/pictures/' . $barang->foto)) {
            Storage::delete('public/pictures/' . $barang->foto);
        }

        $barang->delete();
        return redirect(route('getManage'))->with('success_msg', '');
    }
}

