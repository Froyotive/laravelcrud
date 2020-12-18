@extends('layout.main')

@section('title', 'Form Ubah Data Mahasiswa')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Form Ubah Data Mahasiswa</h1>

            <form method="post" action="/students/{{ $students->id }}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama..." name="nama" value="{{$students->nama}}">
                    @error('nama') <div class="invalid-feedback"> {{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" placeholder="Masukkan Nisn..." name="nisn" value="{{$students->nisn}}">
                    @error('nisn') <div class="invalid-feedback"> {{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan Email..." name="email" value="{{$students->email}}">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" placeholder="Masukkan Jurusan..." name="jurusan" value="{{$students->jurusan}}">
                    <button type="submit" class="btn btn-primary">Ubah Data!</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection