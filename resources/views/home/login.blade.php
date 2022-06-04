@extends('layouts.app')

@section('judul', 'Login')

@section('style')
<link rel="stylesheet" href="{{asset('css/registration.css')}}">
@endsection

@section('content')
<section id="Register">
    <div class="login-bg"></div>
    <div class="login-content">
        <div class="login-heading">
            <h1>- Login Page -</h1>
        </div>
        <form action="{{route('login')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="register-form">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="email">Email :</label>
                    <br>
                    <input id="email" type="email" name="email">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="password">Password :</label>
                    <br>
                    <input id="password" type="password" name="password">
                </div>
                <div class="register-bottom">
                    <p>Belum Memiliki Akun? <span><a href="">Silahkan Menekan REGISTER di Bagian Atas</a></span></p>
                    <button class="submitBtn" type="submit">LOGIN</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
