@extends('layout.user')
@section('title', 'dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="content-wrapper">
        <div class="row mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-10 sm:grid-cols-3 sm:px-6">
            <div class="col-lg-4">
                <h3 class="text-xl font-semibold leading-6 text-gray-800 dark:text-gray-200 mt-3">Ubah Password</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Isi form untuk mengubah password anda!</p>
                <a href="{{ url('profile/' . Auth::user()->id) }}" class="btn btn-lg btn-outline-dark w-100 mt-3">View
                    Profile</a>
            </div>
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card"
                    style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                    <div class="card-body">
                        <form action="{{ route('updatePassword', ['id' => Auth::user()->id]) }}" class="forms-sample"
                            method="POST">
                            @csrf
                            <div class="row mt-5">
                                <div class="form-group col-6">
                                    <label for="password">Password*</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password_confirmation">Confirm Password*</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                                @error('password')
                                    <div class="col-12">
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    </div>
                                @enderror

                                {{--
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                                <div class="form-group col-12">
                                    <button type="submit" class="btn btn-success mr-2 w-100 mt-2">Update Password</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3 class="text-xl font-semibold leading-6 text-gray-800 dark:text-gray-200 mt-3">Edit Profile</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Ubah data diri anda</p>
            </div>
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card"
                    style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                    <div class="card-body">
                        <a href="{{ url('editProfile/' . Auth::user()->id) }}" class="btn btn-lg btn-outline-dark w-100">Edit
                            Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
