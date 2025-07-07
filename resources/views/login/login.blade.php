@extends('layout.login')
@section('title', 'dashboard')
@section('content')
@include('sweetalert::alert')
    <div class="container">
        <form class="contact__form">
            <h2>PILIH TIPE AKUN</h2>

            <div class="options">
                <input type="radio" name="option" id="individual" value="Guru">
                <label for="individual">
                    <span class="icon__select"><i class="fas fa-briefcase"></i></span>
                    <h3>Guru</h3>
                    <span class="selected"><i class="fas fa-check"></i></span>
                </label>

                <input type="radio" name="option" id="company" value="Mahasiswa/Relawan">
                <label for="company">
                    <span class="icon__select"><i class="fas fa-user"></i></span>
                    <h3>Mahasiswa/</h3>
                    <h3>Relawan</h3>
                    <span class="selected"><i class="fas fa-check"></i></span>
                </label>

                <input type="radio" name="option" id="student" value="Siswa">
                <label for="student">
                    <span class="icon__select"><i class="fa-solid fa-school"></i></span>
                    <h3>Siswa</h3>
                    <span class="selected"><i class="fas fa-check"></i></span>
                </label>
            </div>
            <div class="bottom">
                <div class="no__acc"><span>No account?</span><a href="{{ url('/register') }}"> Signup</a></div>
            </div>
            <div class="bottom">
                <button type="button" class="submitBtn" style="align-items: center" onclick="redirectToNextPage()">Next</button>
            </div>
        </form>
    </div>
    <script>
        function redirectToNextPage() {
            var selectedOption = document.querySelector('input[name="option"]:checked').value;
            var nextPageUrl = '';
            if (selectedOption === 'Guru') {
                nextPageUrl = "{{ url('/loginGuru') }}";
            } else if (selectedOption === 'Mahasiswa/Relawan') {
                nextPageUrl = "{{ url('/loginMR') }}";
            } else if (selectedOption === 'Siswa') {
                nextPageUrl = "{{ url('/loginSiswa') }}";
            }
            window.location.href = nextPageUrl;
        }
    </script>
    </script>
