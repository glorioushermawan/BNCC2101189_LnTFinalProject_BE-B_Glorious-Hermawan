@extends('layouts.app')

@section('judul', 'Admin | Manage Barang')

@section('style')
<link rel="stylesheet" href="{{asset('css/manage.css')}}">
@endsection

@section('content')
<div class="home-container mt-5">

    {{-- MENU BAR --}}
    <header>
        <h2 style="font-weight: bold"><i class="uil uil-apps"></i>MANAGE ITEM</h2>
    </header>
    <div class="header-hr">
        <div class="add-button">
            <a href="{{route('getCreate')}}" class="btn btn-dark btn-lg mb-4" style="font-weight: bold">ADD ITEM</a>
        </div>
    </div>
    <br><br>

    <section id="view-picture">
        <div class="header">
            <h2 style="color: white">ITEM</h2>
            <form action="" class="search-bar">
                <div class="search">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search Picture"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">SEARCH</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="row">
            <div class="container">
                @if ($barangs->count() == 0)
                    <div class="alert alert-warning">
                        No Item Available
                    </div>
                @endif
                <div class="row">
                    @foreach ($barangs as $barang)
                    <div class="col-md-3 mb-5">
                        <div class="card col-md-12 tea-content bg-light p-2">
                            <img class="picture-foto" src="{{asset('storage/pictures/'.$barang->foto)}}" alt="">
                            <h3 class="name" style="font-weight: bold">{{$barang->name}}</h3>
                            <span class="badge bg-info mb-3" style="font-weight: bold"> {{$barang->kategori->name}}</span>
                            <span class="d-block">Rp. {{$barang->harga}},00</span>
                            <span class="d-block">Stok: {{$barang->jumlah}}</span>
                            <a href="{{route('getUpdate',['id'=>$barang->id])}}"
                                class="btn btn-success btn-lg" style="font-weight: bold">PERBARUI ITEM</a>
                            <form action="{{route('deleteBarang',['id'=>$barang->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-lg mb-4"
                                    style="font-weight: bold">HAPUS ITEM</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
