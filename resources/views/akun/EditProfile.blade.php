@extends('layout.user')
@section('title', 'dashboard')
@section('formMateri', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card"
                    style="border-radius:10px;box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <!--alert berhasil daftar-->
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form class="forms-sample" action="{{ route('updateProfile', ['id' => Auth::user()->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1"
                                    placeholder="{{ Auth::user()->name }}" value="">
                                <div class="form-group mt-3">
                                    @error('gender')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="exampleInputName1">Gender</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender"
                                                id="optionsRadios1" value="laki-laki" onchange="updateOptions()">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender"
                                                id="optionsRadios2" value="perempuan" checked onchange="updateOptions()">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if (auth()->user()->User == 'Guru')
                                        @error('nip')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleSelectKelas">NIP</label>
                                        <input type="text" name="nip" class="form-control">
                                    @else
                                        @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleSelectKelas">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="{{ auth()->user()->username }}">
                                    @endif
                                </div>

                                <div class="form-group">
                                    @error('nomor')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="exampleSelectKelas">Nomor Telpon</label>
                                    <input type="tel" name="nomor" class="form-control"
                                        placeholder="0{{ auth()->user()->nomor }}">
                                </div>

                                <div class="form-group">
                                    @error('bio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="exampleSelectKelas">Bio</label>
                                    <textarea class="form-control" name="bio" placeholder="Bio" id="exampleTextarea1" rows="4"></textarea>
                                </div>

                                <div
                                    class="form-group row mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-10 sm:grid-cols-3 sm:px-6 mb-5">
                                    @error('foto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-lg-2">
                                        <label>Foto Profile</label>
                                        <div class="col-xs-12">
                                            @if (!empty(Auth::user()->foto))
                                                <span
                                                    class="mt-1 inline-block h-24 w-24 overflow-hidden rounded bg-gray-100 object-cover">
                                                    <img src="{{ asset('FotoProfile/' . Auth::user()->foto) }}"
                                                        style="height: 100px; width: 100px;" alt="General User">
                                                </span>
                                            @else
                                                <span
                                                    class="mt-1 inline-block h-24 w-24 overflow-hidden rounded bg-gray-100 object-cover">
                                                    <img src="{{ asset('avatar.png') }}"
                                                        style="height: 100px; width: 100px" alt="General User">
                                                </span>
                                                <span
                                                    class="mt-1 inline-block h-24 w-24 overflow-hidden rounded bg-gray-100 object-cover">
                                                    <img src="{{ asset('avatar.png') }}"
                                                        style="height: 100px; width: 100px" alt="General User">
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <p class="text-muted">Upload file dengan format file gambar (png,jpg,jpeg)</p>
                                        <div class="col-xs-12">
                                            <input type="file" name="foto" class="file-upload-default" value="">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload File">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
