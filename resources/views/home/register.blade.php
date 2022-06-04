@extends('layouts.app')

@section('judul', 'Register')

@section('style')
<link rel="stylesheet" href="{{asset('css/registration.css')}}">
@endsection

@section('content')
<section id="Register">
    <div class="register-bg"></div>
    <div class="register-content">
        <div class="register-heading">
            <h1>- Register Page -</h1>
        </div>
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="register-form">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="name">Nama Lengkap</label>
                    <br>
                    <input id="name" type="text" name="name">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="email">Email</label>
                    <br>
                    <input id="email" type="email" name="email">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="password">Password</label>
                    <br>
                    <input id="password" type="password" name="password">
                </div>
                @error('telephone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="telephone">Nomor Handphone</label>
                    <br>
                    <input id="telephone" type="text" name="telephone">
                </div>
                <div class="register-bottom">
                    <p>Sudah Memiliki Akun? <span><a href="">Silahkan Menekan LOGIN di Bagian Atas</a></span></p>
                    <button class="submitBtn" type="submit">BUAT AKUN</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
