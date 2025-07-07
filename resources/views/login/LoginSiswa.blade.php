@extends('layout.login')
@section('title', 'dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <form class="" action="/loginMRS" method="post">
            @csrf
            <h2>Masukkan Data Anda</h2>
            <div class="form-group username" id="usernameForm">
                <i class="fas fa-user" style="padding-left: 20px; padding-top:22px"></i>
                <input type="text" name="username" class="form-control" id="username__field" aria-describedby="usernameHelp"  placeholder="Masukkan Username">
            </div>
            <div class="form-group password" id="passwordForm">
                <i class="fas fa-lock icon" style="padding-left: 10px; padding-top:4px"></i>
                <input type="password" name="password" class="form-control" id="password__field" placeholder="Password">
            </div>
            <div class="bottom">
                <div class="no__acc"><span>No account?</span><a href="{{ url('/register') }}"> Signup</a></div>
            </div>
            <div class="bottom">
                <button type="submit" class="submitBtn" style="align-items: center">Login</button>
            </div>
        </form>
    </div>
