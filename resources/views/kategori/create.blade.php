{{-- @extends('layouts.app')

@section('subtitle','kategori')
@section('content_header_title','kategori')
@section('content_header_subtitle','Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">buat kategori baru</h3>
            </div>
            <form method="post" action="../kategori">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
    --}}

    @extends('layouts.template')
    @section('content')
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
                <div class="card-tools"></div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('kategori') }}" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Kategori Kode</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="kategori_kode" name="kategori_kode"
                                   value="{{ old('kategori_kode') }}" required>
                            @error('kategori_kode')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Kategori Nama</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="kategori_nama" name="kategori_nama"
                                   value="{{ old('kategori_nama') }}" required>
                            @error('kategori_nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('kategori') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @push('css')
    @endpush
    @push('js')
    @endpush
