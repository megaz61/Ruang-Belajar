@extends('layout.main')
@section('title', 'Materi')
@section('Materi', 'active')
@section('content')
    @include('sweetalert::alert')

    <!-- Sertakan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Sertakan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link href="{{ asset('materi.css') }}" rel="stylesheet">
    <br>
    <div class="container overflow-hidden mt-5">
        <div class="section-title">
            <h2>Materi</h2>
        </div>
        <form action="{{ route('filter') }}" method="GET">
            <div class="row mb-4 mt-3 align-items-start">
                <div class="col-3">
                    <div class="form-group">
                        <label for="search">Cari Materi</label>
                        <input type="text" id="search" name="search" class="form-control" placeholder="Masukkan kata kunci">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        @error('tingkatan_pendidikan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="Kelas">Tingkatan Pendidikan</label>
                        <select class="form-control" name="tingkatan_pendidikan" id="tingkatan_pendidikan" onchange="updateOptions()">
                            <option value="none">Pilih Tingkat Pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        @error('kelas')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleSelectKelas">Kelas</label>
                        <select class="form-control" name="kelas" id="selectKelas"></select>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            updateOptions();
                            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
                            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
                        });

                        function updateOptions() {
                            var pendValue = document.getElementById("tingkatan_pendidikan").value;
                            var selectKelas = document.getElementById("selectKelas");
                            selectKelas.innerHTML = ""; // Clear existing options

                            if (pendValue === "SD") {
                                var option1 = document.createElement("option");
                                option1.text = "Pilih Kelas";
                                option1.value = "none";
                                selectKelas.add(option1);
                                for (var i = 1; i <= 6; i++) {
                                    var option = document.createElement("option");
                                    option.text = i;
                                    option.value = i;
                                    selectKelas.add(option);
                                }
                            } else if (pendValue === "SMP") {
                                var option1 = document.createElement("option");
                                option1.text = "Pilih Kelas";
                                option1.value = "none";
                                selectKelas.add(option1);
                                for (var i = 1; i <= 3; i++) {
                                    var option = document.createElement("option");
                                    option.text = i;
                                    option.value = i;
                                    selectKelas.add(option);
                                }
                            } else {
                                var option = document.createElement("option");
                                option.text = "Pilih Tingkat Pendidikan dulu";
                                option.value = "none";
                                selectKelas.add(option);
                            }
                        }
                    </script>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success mt-4" style="margin: 0 auto;">Filter</button>
                </div>
            </div>
        </form>

        @php $count = 0; @endphp <!-- Add a variable to track the number of cards -->
        @foreach ($materi as $item)
            @if ($count % 4 == 0)
                <!-- Check if it's the start of a new row -->
                <div class="row mb-4 mt-5 align-items-center"> <!-- Add margin bottom to the row -->
            @endif
            <div class="col-3">
                <div class="card" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                    @if ($item->thumbnail != null)
                        <img src="{{ asset('materi/thumbnail/' . $item->thumbnail) }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                    @else
                        @if ($item->tipe_materi == 'dokumen')
                            <img src="{{ asset('materi/thumbnail/default/default_dokumen.png') }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                        @elseif ($item->tipe_materi == 'video')
                            <img src="{{ asset('materi/thumbnail/default/dafault_video.png') }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                        @elseif ($item->tipe_materi == 'gambar')
                            <img src="{{ asset('materi/thumbnail/default/default_img.png') }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                        @endif
                    @endif
                    <div class="card-body">
                        @if (strlen($item->nama_materi) > 40)
                            <h5 class="card-title mb-4" style="text-align: center;">{{ substr($item->nama_materi, 0, 40) }} ....</h5>
                        @else
                            <h5 class="card-title mb-4" style="text-align: center;">{{ $item->nama_materi }}</h5>
                        @endif
                        <p class="card-text badge rounded-pill text-bg-info"><small class="text-muted">Tingkat Pendidikan: {{ $item->tingkatan_pendidikan }}</small></p>
                        <p class="card-text badge rounded-pill text-bg-warning"><small class="text-muted">Kelas: {{ $item->kelas }}</small></p>
                        <div>
                            <a tabindex="0" class="card-text badge rounded-pill text-bg-secondary text-decoration-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Keterangan" data-bs-content="{{ $item->keterangan}}">Dekripsi</a>
                        </div>
                        @if ($item->tipe_materi == 'gambar')
                            <a href="{{ asset('materi/gambar/' . $item->file) }}" class="mt-5 btn btn-outline-success" target="_blank">View Materi</a>
                        @elseif ($item->tipe_materi == 'dokumen')
                            <a href="{{ route('showPDF', $item->id) }}" target="_blank" class=" mt-5 btn btn-outline-success">View Materi</a>
                        @elseif ($item->tipe_materi == 'video')
                            <a href="{{ route('showVideo', $item->id) }}" target="_blank" class="mt-5 btn btn-outline-success">View Materi</a>
                        @endif
                    </div>
                </div>
            </div>
            @php $count++; @endphp <!-- Increment the card count -->
            @if ($count % 4 == 0 || $loop->last)
                <!-- Check if it's the end of the row or the last item -->
    </div>
    @endif
    @endforeach
    <div>
        {!! $materi->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
    </div>
@endsection
