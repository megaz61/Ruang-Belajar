@extends('layout.main')
@section('title', 'Home')
@section('menuHome', 'active')
@section('content')
<br>
    <iframe style="width: 100%; height: 110vh;" class="shadow-lg p-3 bg-body rounded"
    src="data:application/pdf;base64,{{ base64_encode(file_get_contents(public_path('/materi/pdf/' . $materi->file)))}}">
    {{$materi->nama_materi}}</iframe>
@endsection
