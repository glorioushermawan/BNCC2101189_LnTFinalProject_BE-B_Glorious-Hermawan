@extends('layouts.app')

@section('judul', 'Admin | Edit Barang')

@section('style')

@endsection

@section('content')
<div class="container">
    <br><br>
    <form action="{{route('updateBarang',['id'=>$barang->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="picture" class="form-label" style="font-weight: bold">Foto</label>
            <input name='foto' type="file" class="form-control" id="formGroupExampleInput"
                placeholder="Input foto" value="{{$barang->foto}}">
        </div>
        @error('foto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$barang->name}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="exampleInputPassword1" value="{{$barang->harga}}">
        </div>
        @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="exampleInputPassword1" value="{{$barang->jumlah}}">
        </div>
        @error('jumlah')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="tag" class="form-label" style="font-weight: bold">Kategori</label>
            <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                @foreach($kategoris as $kategori)
                    <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">SUBMIT</button>
    </form>
</div>
<br><br>
@endsection
