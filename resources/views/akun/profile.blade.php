@extends('layout.user')
@section('title', 'dashboard')
@section('content')
<div class="content-wrapper">
    <div class="row mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-10 sm:grid-cols-3 sm:px-6">
        <div class="col-lg-4">
            <div class="card" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                <div class="card-body">
                    @if (!empty(Auth::user()->foto))
                    <img class="card-img-top mb-5 mx-auto d-block" style="height: 220px; width:220px; border-radius:10px;box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;"
                    src="{{ asset('FotoProfile/'. Auth::user()->foto) }}" alt="General User">
                    @else
                    <img class="card-img-top mb-5 mx-auto d-block" style="height: 220px; width:220px; border-radius:10px;box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;" src="{{ asset('avatar.png') }}" alt="General User">
                    @endif
                    <h4 class="card-title text-center">{{ Auth::user()->name }}</h4>
                    <p class="text-muted text-center mb-2">{{ Auth::user()->User}}</p>
                    <a href="{{ url('editProfile/'.Auth::user()->id)}}" class="mx-auto d-block btn btn-outline-primary mb-3">Edit Profile</a>
                    <a href="{{ url('changePassword/'.Auth::user()->id)}}" class="mx-auto d-block btn btn-outline-danger">Change Password</a>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <img class="mx-auto -mb-24 h-48 w-48 rounded-lg object-cover" src="https://laravel.nasirkhn.com/img/default-avatar.jpg" alt="General User">
                    <h4 class="card-title">TITLE</h4>
                </div>
            </div> --}}
        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                <div class="card-body">
                    <h4 class="card-title text-center text-lg font-bold mt-3">Informasi Akun</h4>
                    <ul class="list-group list-group-flush mt-5">
                        <li class="list-group-item"><span class="font-weight-bold">Nama Lengkap : </span>{{Auth::user()->name}}</li>
                        @if (Auth::user()->User == 'Guru')
                        <li class="list-group-item"><span class="font-weight-bold">NIP : </span>{{Auth::user()->NIP}}</li>
                        @else
                        <li class="list-group-item"><span class="font-weight-bold">Username : </span>{{Auth::user()->username}}</li>
                        @endif
                        <li class="list-group-item"><span class="font-weight-bold">Jenis Kelamin : </span>{{Auth::user()->gender}}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Nomor Telepon : </span>0{{Auth::user()->nomor}}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Bio : </span>{{Auth::user()->bio}}</li>
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
