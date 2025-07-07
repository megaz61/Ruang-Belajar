<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/20e18d844f.js" crossorigin="anonymous"></script>
    <link href="{{ asset('login/style.css') }}" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>Register Form</title>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Hide by default */
        .form-group.nip,
        .form-group.username,.form-group.nomor,.form-group.nama,.form-group.password, .daftar {
            display: none;
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <form class="form-group contact__form" action="{{route('storeRegister')}}" method="POST">
            @csrf
            <h1>DAFTAR AKUN</h1>
            <h2>PILIH TIPE AKUN</h2>

            <div class="options">
                <input type="radio" name="User" id="individual" value="Guru" onchange="toggleFormElements()">
                <label for="individual">
                    <span class="icon__select"><i class="fas fa-briefcase"></i></span>
                    <h3>Guru</h3>
                    <span class="selected"><i class="fas fa-check"></i></span>
                </label>

                <input type="radio" name="User" id="company" value="Mahasiswa/Relawan" onchange="toggleFormElements()">
                <label for="company">
                    <span class="icon__select"><i class="fas fa-user"></i></span>
                    <h3>Mahasiswa/</h3>
                    <h3>Relawan</h3>
                    <span class="selected"><i class="fas fa-check"></i></span>
                </label>

                <input type="radio" name="User" id="student" value="Siswa" onchange="toggleFormElements()">
                <label for="student">
                    <span class="icon__select"><i class="fa-solid fa-school"></i></span>
                    <h3>Siswa</h3>
                    <span class="selected"><i class="fas fa-check"></i></span>
                </label>
            </div>
            <span class="message__selection"></span>

            <div class="form-group nama">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <i class="fas fa-user" style="padding-left: 20px; padding-top:22px"></i>
                <input type="text"  name="name" class="form-control" id="nama__field" aria-describedby="namaHelp"  placeholder="Masukkan NAMA LENGKAP">
            </div>
            <div class="form-group nomor">
                @error('nomor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <i class="fa-solid fa-phone"  style="padding-left: 20px; padding-top:22px"></i>
                <input type="tel" name="nomor" class="form-control" id="nomor__field" aria-describedby="namaHelp"  placeholder="Masukkan NOMOR TELPON">
            </div>
            <div class="form-group nip">
                @error('nip')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <i class="fas fa-user" style="padding-left: 20px; padding-top:22px"></i>
                <input type="text" name="nip" class="form-control" id="nip__field" aria-describedby="nipHelp"  placeholder="Masukkan NIP">
            </div>
            <div class="form-group username">
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <i class="fas fa-user" style="padding-left: 20px; padding-top:22px"></i>
                <input type="text" name="username" class="form-control" id="username__field" aria-describedby="usernameHelp"  placeholder="Masukkan Username">
            </div>
            <div class="form-group password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <i class="fas fa-lock icon" style="padding-left: 10px; padding-top:4px"></i>
                <input type="password" name="password" class="form-control" id="password__field" placeholder="Password">
            </div>
            <div class="bottom">
                <div class="no__acc">
                    <div class="sudah">
                        <span>Sudah Punya Akun?</span><a href="{{ url('/masuk') }}" style="align-items: ">Login</a>
                    </div>
                    <br>
                    <div class="daftar">
                        <button type="submit" class="submitBtn" style="align-items: center">Daftar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function toggleFormElements() {
            var individualRadio = document.getElementById("individual");
            var companyRadio = document.getElementById("company");
            var studentRadio = document.getElementById("student");
            var nipForm = document.querySelector(".form-group.nip");
            var namaForm = document.querySelector(".form-group.nama");
            var nomorForm = document.querySelector(".form-group.nomor");
            var usernameForm = document.querySelector(".form-group.username");
            var bottom = document.querySelector(".daftar");
            var password = document.querySelector(".form-group.password");

            if (individualRadio.checked) {
                nipForm.style.display = "block";
                namaForm.style.display = "block";
                nomorForm.style.display = "block";
                usernameForm.style.display = "none";
                bottom.style.display = "block";
                password.style.display = "block";
            } else if (companyRadio.checked || studentRadio.checked) {
                nipForm.style.display = "none";
                namaForm.style.display = "block";
                nomorForm.style.display = "block";
                usernameForm.style.display = "block";
                bottom.style.display = "block";
                password.style.display = "block";
            }
        }
    </script>

    {{-- coba --}}
</body>
</html>
