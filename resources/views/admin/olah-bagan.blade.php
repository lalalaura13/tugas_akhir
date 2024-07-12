@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
            <div class="card-body">
                <h5 class="card-title fw-semibold text-uppercase mb-4 text-primary">Tambah Bagan</h5>
                <form action="{{ route('a.tambah-bagan') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <div class="mb-3">
                                <label class="form-label">Team Kiri</label>
                                <select class="form-select js-example-basic-multiple-limit team-kiri" placeholder="-- Pilih Team --" name="sudut_merah[]" multiple="multiple" aria-label="Default select example">
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="mb-3">
                                <label class="form-label"></label>
                                <h5 class="mt-3">vs</h5>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <label class="form-label">Team Kanan</label>
                                <select class="form-select js-example-basic-multiple-limit team-kanan" placeholder="-- Pilih Team --" name="sudut_biru[]" multiple="multiple" aria-label="Default select example">
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Usia</label>
                        <select name="kategori_usia" id="kategori_usia_bagan"
                            value="{{ old('kategori_usia') }}" class="form-select @error('kategori_usia') is-invalid @enderror">
                            <option value="">-- pilih kategori Usia --</option>
                            <option value="Dewasa (mahasiswa/Umum)">Dewasa (mahasiswa/Umum)</option>
                            <option value="Remaja (SMA)">Remaja (SMA)</option>
                            <option value="Pra Remaja (SMP)">Pra Remaja (SMP)</option>
                            <option value="Usia Dini (Kelas 3-6 SD)">Usia Dini (Kelas 3-6 SD)</option>
                        </select>
                        @error('kategori_usia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin_bagan"
                            value="{{ old('jenis_kelamin') }}" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="">-- pilih Jenis Kelamin --</option>
                            <option value="Putra">Putra</option>
                            <option value="Putri">Putri</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas Tanding</label>
                        <select name="kelas_tanding" id="kelas_tanding_bagan"
                            value="{{ old('kelas_tanding') }}" class="form-select @error('kelas_tanding') is-invalid @enderror">
                            <option value="">-- pilih Kelas Tanding --</option>
                        </select>
                        @error('tingkat_nafas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3" id="tingkatNafasDiv">
                        <label class="form-label">Tingkat Nafas</label>
                        <select name="tingkat_nafas" id="tingkat_nafas_bagan"
                            value="{{ old('tingkat_nafas') }}" class="form-select @error('tingkat_nafas') is-invalid @enderror">
                            <option value="">-- pilih Tingkat Nafas --</option>
                            <option value="Dasar">Dasar</option>
                            <option value="Balik">Balik</option>
                        </select>
                        @error('tingkat_nafas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <ul class="nav nav-tabs mb-3 justify-content-center fw-semibold" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="dewasa-tab" data-bs-toggle="tab" data-bs-target="#dewasa" type="button"
                    role="tab" aria-controls="dewasa" aria-selected="true">Dewasa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="remaja-tab" data-bs-toggle="tab" data-bs-target="#remaja" type="button"
                    role="tab" aria-controls="remaja" aria-selected="false">Remaja</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="praremaja-tab" data-bs-toggle="tab" data-bs-target="#praremaja" type="button"
                    role="tab" aria-controls="praremaja" aria-selected="false">Pra Remaja</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="usiadini-tab" data-bs-toggle="tab" data-bs-target="#usiadini" type="button"
                    role="tab" aria-controls="usiadini" aria-selected="false">Usia Dini</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dewasa" role="tabpanel" aria-labelledby="dewasa-tab">
                @include('bagan.TabPane.dewasa')
            </div>
            <div class="tab-pane fade" id="remaja" role="tabpanel" aria-labelledby="remaja-tab">
                @include('bagan.TabPane.remaja')
            </div>
            <div class="tab-pane fade" id="praremaja" role="tabpanel" aria-labelledby="praremaja-tab">
                @include('bagan.TabPane.praremaja')
            </div>
            <div class="tab-pane fade" id="usiadini" role="tabpanel" aria-labelledby="usiadini-tab">
                @include('bagan.TabPane.usiadini')
            </div>
        </div>
    </div>
    
    @include('assets.js.ajax-bagan')
    @include('assets.js.validasi-modal-edit')
    @include('assets.js.notifikasi-berhasil')
@endsection