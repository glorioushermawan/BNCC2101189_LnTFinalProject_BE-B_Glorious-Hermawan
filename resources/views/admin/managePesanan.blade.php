@extends('layouts.app')

@section('judul', 'Admin | Manage Barang')

@section('style')

@endsection

@section('content')

{{-- Manage Banner --}}
<div class="container bg-light rounded-3 pt-2 pb-2 mt-4">
    <div class="col-md-12 bg-light table-wrapper">
        <h3 style="font-weight: bold"><i class="uil uil-shopping-cart"></i>RECEIPT</h3>
        <hr>

        {{-- Manage Book --}}
        <table class="table">
            <thead>
                <tr align="center">
                    <th>#</th>
                    <th>PENGGUNA</th>
                    <th>KATEGORI</th>
                    <th>ITEM/BARANG</th>
                    <th>KUANTITAS</th>
                    <th>FAKTUR</th>
                    <th>ALAMAT</th>
                    <th>KODE POS</th>
                    <th>SUB TOTAL</th>
                    <th>TOTAL HARGA</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                ?>
                @foreach ($transactions as $transaction)
                <tr align="center">
                    <th>{{$nomor++}}</th>
                    <th>{{$transaction->user->name}}</th>
                    <td>{{$transaction->barang->kategori->name}}</td>
                    <td>{{$transaction->barang->name}}</td>
                    <td>{{$transaction->quantity}}</td>
                    <td>{{$transaction->invoice}}</td>
                    <td>{{$transaction->alamat}}</td>
                    <td>{{$transaction->pos}}</td>
                    <td>Rp.{{$transaction->barang->harga}}</td>
                    <td>Rp.{{$transaction->barang->harga * $transaction->quantity}}</td>
                    @if ($transaction->status == 'Accepted')
                        <td>{{$transaction->status}}</td>
                    @else
                        <td>
                            <form action="{{route('updateTransaction',['id'=>$transaction->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-success"><i class="uil uil-edit"></i></button>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br><br>

@endsection
