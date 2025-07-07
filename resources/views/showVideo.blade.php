@extends('layout.main')
@section('title', 'Materi')
@section('Materi', 'active')
@section('content')
    {{-- <h2 class="text-center mt-5 mb-5">{{ $materi->nama_materi }}</h2> --}}
    {{-- <div class="col-md-6 ml-5">
                    <p><small class="text-muted">Tingkatan Pendidikan: {{ $materi->tingkatan_pendidikan }}</small></p>
                    <p><small class="text-muted">Kelas: {{ $materi->kelas }}</small></p>
                </div>
                <div class="col-md-6 ml-5">
                    <p><small class="text-muted">{{ $materi->keterangan }}</small></p>
                </div> --}}
    <div class="container-fluid mt-5 mb-5">
        {{-- <h4 class="text-center" style="overflow-wrap: break-word;">{{ $materi->nama_materi }}</h4> --}}
        <div class="row justify-content-center">
            <div class="col-6 px-0 pe-2 ps-5 mt-3 mb-3">
                @if (strpos($materi->file, '.mp4') !== false)
                    <video width="640" height="360" controls
                        style=" border-radius: 10px;
                    box-shadow: rgba(240, 46, 170, 0.4) -5px 5px, rgba(240, 46, 170, 0.3) -10px 10px, rgba(240, 46, 170, 0.2) -15px 15px, rgba(240, 46, 170, 0.1) -20px 20px, rgba(240, 46, 170, 0.05) -25px 25px;">
                        <source src="{{ url('materi/video/' . $materi->file) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @elseif (strpos($materi->file, '.ogg') !== false)
                    <video width="640" height="360" controls>
                        <source src="{{ url('materi/video/' . $materi->file) }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                @elseif (strpos($materi->file, '.mkv') !== false)
                    <video width="640" height="360" controls>
                        <source src="{{ url('materi/video/' . $materi->file) }}" type="video/mkv">
                        Your browser does not support the video tag.
                    </video>
                @elseif (strpos($materi->file, '.webm') !== false)
                    <video width="640" height="360" controls>
                        <source src="{{ url('materi/video/' . $materi->file) }}" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                @elseif (strpos($materi->file, '.avi') !== false)
                    <video width="640" height="360" controls>
                        <source src="{{ url('materi/video/' . $materi->file) }}" type="video/avi">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>
            <div class="col-4 ps-0 pe-5 mt-3">
                <h4>Dekripsi:</h4>
                <br>
                <p><small class="text-muted">{{ $materi->keterangan }}</small></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 ps-5 mt-2">
                <h4 class="" style="overflow-wrap: break-word; max-width: 50%;">{{ $materi->nama_materi }}</h4>
                {{-- <h5 class="">{{ $materi->nama_materi }}</h5> --}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 ps-5 mt-2">
                <span class="badge bg-info text-dark">Tingkatan Pendidikan: {{ $materi->tingkatan_pendidikan }}</span>
                <span class="badge bg-warning text-dark">Kelas: {{ $materi->kelas }}</span>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 ps-5 mt-2">
                <span class="badge bg-secondary">{{$materi->topik}}</span>
                <span class="badge bg-success">Sumber:  <a href="{{$materi->sumber}}" target="_blank" style="  color: #ffffff; /* or any other desired color */
                    text-decoration: underline;">{{$materi->sumber}}</a></span>
            </div>
        </div>
    </div>

    {{-- <div class="container mt-5 mb-5">
        <h2 class="text-center">{{ $materi->nama_materi }}</h2>
        <div class="row">
            <div class="col-md-6">

            </div>

        </div>
        <p><small class="text-muted">Tingkatan Pendidikan: {{ $materi->tingkatan_pendidikan }}</small></p>
        <p><small class="text-muted">Kelas: {{ $materi->kelas }}</small></p>
        <div class="d-flex justify-content-between">
            @if (strpos($materi->file, '.mp4') !== false)
                <video width="640" height="360" controls
                    style=" border-radius: 10px;
            border-bottom: 5px solid #cccccc;">
                    <source src="{{ url('materi/video/' . $materi->file) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @elseif (strpos($materi->file, '.ogg') !== false)
                <video width="640" height="360" controls>
                    <source src="{{ url('materi/video/' . $materi->file) }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            @elseif (strpos($materi->file, '.mkv') !== false)
                <video width="640" height="360" controls>
                    <source src="{{ url('materi/video/' . $materi->file) }}" type="video/mkv">
                    Your browser does not support the video tag.
                </video>
            @elseif (strpos($materi->file, '.webm') !== false)
                <video width="640" height="360" controls>
                    <source src="{{ url('materi/video/' . $materi->file) }}" type="video/webm">
                    Your browser does not support the video tag.
                </video>
            @elseif (strpos($materi->file, '.avi') !== false)
                <video width="640" height="360" controls>
                    <source src="{{ url('materi/video/' . $materi->file) }}" type="video/avi">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>
        </div>

    </div> --}}

    {{-- <video width="640" height="360" controls>
        <source src="{{url('materi/video/'.$materi->file) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video> --}}
@endsection
