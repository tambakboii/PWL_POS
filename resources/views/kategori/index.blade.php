@extends('layouts.app')

@section('subtitle','kategori')
@section('content_header_title','Home')
@section('content_heade_subtitle','kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">manage kategori</div>
            <div class="card-body">
                {{ $dataTable->table() }}
                <a class="btn btn-succes" href="{{ route('TambahKategori') }}">Tambah Kategori</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
    
