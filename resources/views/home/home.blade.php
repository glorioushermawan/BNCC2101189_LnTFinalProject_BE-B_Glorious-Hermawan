@extends('layouts.app')

@section('judul','Home')

@section('style')

@endsection

@section('content')
{{-- Banner --}}
<div class="banner p-4 mb-3 mt-4 rounded-3 bg-light" style="margin-left: 50px; margin-right: 50px;">
    <h1 style="font-weight: bold; color: black"><i class="uil uil-store"></i> Selamat Datang di Meiying Store!</h1>
    <br>
    <h2 class="mb-4">Website ini menjual barang-barang! Anda dapat memenuhi kebutuhan anda pada website kami!
    SELAMAT BERBELANJA! :D </h2>
</div>

{{-- Book Content --}}
<div class="container" style="margin-left: 50px; margin-right: 50px;">
    <form action="" class="search-bar" style="width: 300px; right: 0; display: flex">
        <div class="search" style="display: flex; justify-self: flex-end; align-self: flex-end">
            <input class="form-control me-2" name="search" type="search" placeholder="Search for Item Name"
                aria-label="Search">
            <button class="btn btn-outline-success" type="submit">SEARCH</button>
        </div>
    </form>
    <br><br>
    <div class="row">
        @if ($barangs->count() == 0)
        <div class="alert alert-warning" style="width: 100%">
            No Item Available
        </div>
        @endif
        @foreach ($barangs as $barang)
        <div class="col-md-3 mb-4">
            @guest
                <div class="col-md-12 p-2 book-content rounded-3 bg-light">
                    <img class="picture-image" src="{{asset('storage/pictures/'.$barang->foto)}}" alt="{{$barang->name}}" style="width: 300px; height: ;300px">
                    <h3 class="judul" style="font-weight: bold">{{$barang->name}}</h3>
                    <span class="badge bg-info mb-3" style="font-weight: bold"> {{$barang->kategori->name}}</span>
                    <span class="d-block">Rp.{{$barang->harga}}</span>
                    <span class="d-block">Stok: {{$barang->jumlah}}</span>
                    @if ($barang->jumlah == 0)
                        <div class="alert alert-warning">
                            Stok Habis
                        </div>
                    @else
                        <a href="{{route('getProduct',['id'=>$barang->id])}}" class="btn btn-primary" style="font-weight: bold">Lihat</a>
                    @endif
                </div>
            @else
                @if (Auth::user()->role == 'User')
                    <div class="col-md-12 p-2 book-content rounded-3 bg-light">
                        <img class="picture-image" src="{{asset('storage/pictures/'.$barang->foto)}}" alt="{{$barang->name}}" style="width: 300px; height: ;300px">
                        <h3 class="judul" style="font-weight: bold">{{$barang->name}}</h3>
                        <span class="badge bg-info mb-3" style="font-weight: bold"> {{$barang->kategori->name}}</span>
                        <span class="d-block">Rp.{{$barang->harga}}</span>
                        <span class="d-block">Stok: {{$barang->jumlah}}</span>
                        @if ($barang->jumlah == 0)
                            <div class="alert alert-warning">
                                Stok Habis
                            </div>
                        @else
                            <a href="{{route('getOrder',['id'=>$barang->id])}}" class="btn btn-primary" style="font-weight: bold">Lihat</a>
                        @endif
                    </div>
                @else
                    <div class="col-md-12 p-2 book-content rounded-3 bg-light">
                        <img class="picture-image" src="{{asset('storage/pictures/'.$barang->foto)}}" alt="{{$barang->name}}" style="width: 300px; height: ;300px">
                        <h3 class="judul" style="font-weight: bold">{{$barang->name}}</h3>
                        <span class="badge bg-info mb-3" style="font-weight: bold"> {{$barang->kategori->name}}</span>
                        <span class="d-block">Rp.{{$barang->harga}}</span>
                        <span class="d-block">Stok: {{$barang->jumlah}}</span>
                        @if ($barang->jumlah == 0)
                            <div class="alert alert-warning">
                                Out of Stock
                            </div>
                        @else
                            <a href="{{route('getProduct',['id'=>$barang->id])}}" class="btn btn-primary" style="font-weight: bold">Lihat</a>
                        @endif
                    </div>
                @endif
            @endguest
        </div>
        @endforeach
    </div>
</div>
@endsection
