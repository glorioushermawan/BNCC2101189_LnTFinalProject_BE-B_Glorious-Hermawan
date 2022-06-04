@extends('layouts.app')

@section('judul', 'Transaction')

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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Pesan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('storeTransaction',['id'=>$barang->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pesan Barang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="register-form">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="uil uil-shopping-cart"></i></span>
                                        <input type="number" class="form-control" placeholder="Mau pesan berapa"
                                            name="quantity">
                                    </div>
                                </div>
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">Kode Pos</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="uil uil-sign-right"></i></span>
                                        <input type="number" class="form-control" placeholder="Masukkan Kode POS"
                                            name="pos">
                                    </div>
                                </div>
                                @error('pos')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="uil uil-truck"></i></span>
                                        <textarea class="form-control" placeholder="Ketik alamat disini"
                                            name="alamat"></textarea>
                                    </div>
                                </div>
                                @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
