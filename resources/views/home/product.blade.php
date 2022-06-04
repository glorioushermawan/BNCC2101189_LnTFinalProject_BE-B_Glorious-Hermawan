@extends('layouts.app')

@section('judul','Home')

@section('style')

@endsection

@section('content')

<div class="col-md-12 d-flex justify-content-center mt-3">
    <div class="col-md-5">
        <img src="{{asset('storage/pictures/'.$barang->foto)}}" alt="{{$barang->name}}" class="w-100 mb-4">
        <span class="badge bg-primary mb-2">{{$barang->kategori->name}}</span>
        <h1 class="fs-5 text-secondary">{{$barang->name}}</h1>
        <h1 class="fs-5 text-secondary">Rp.{{$barang->harga}}</h1>
        <h1 class="fs-5 text-secondary">Stok: {{$barang->jumlah}}</h1>
    </div>
</div>

@endsection
