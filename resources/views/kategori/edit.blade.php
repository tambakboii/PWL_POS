@extends('layouts.app')

@section('subtitle','kategori')
@section('content_header_title','kategori')
@section('content_header_subtitle','Edit')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Kategori</div>
            <div class="card-body">
                <form method="post" action="{{ route('UpdateKategori',$data,kategori_id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="kategori_kode">Kategori Kode</label>
                        <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" value="{{ $data->kategori_kode }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_nama">Kategori Nama</label>
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" value="{{ $data->kategori_nama }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="{{ url('/kategori') }}">kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection