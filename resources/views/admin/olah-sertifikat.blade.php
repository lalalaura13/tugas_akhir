@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
            <div class="card-body">
                <h5 class="card-title fw-semibold text-uppercase mb-4 text-primary">Formulir Sertifikat</h5>
                
                <form action="{{ route('a.generate-sertifikat') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kategori Tanding</label>
                        <select name="kategori_tanding" id="kategori_tanding_sertif"
                            value="{{ old('kategori_tanding') }}" class="form-select @error('kategori_tanding') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori Tanding --</option>
                            <option value="Tanding">Tanding</option>
                            <option value="Seni Tunggal">Seni Tunggal</option>
                            <option value="Getaran">Getaran</option>
                        </select>
                        @error('kategori_tanding')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Usia</label>
                        <select name="kategori_usia" id="kategori_usia_sertif"
                            value="{{ old('kategori_usia') }}" class="form-select @error('kategori_usia') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori Usia --</option>
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
                        <select name="jenis_kelamin" id="jenis_kelamin_sertif"
                            value="{{ old('jenis_kelamin') }}" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Putra">Putra</option>
                            <option value="Putri">Putri</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3" id="kelasTandingDiv">
                        <label class="form-label">Kelas Tanding</label>
                        <select name="kelas_tanding" id="kelas_tanding_sertif"
                            value="{{ old('kelas_tanding') }}" class="form-select @error('kelas_tanding') is-invalid @enderror" required>
                            <option value="">-- Pilih Kelas Tanding --</option>
                        </select>
                        @error('kelas_tanding')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3" id="tingkatNafasDiv">
                        <label class="form-label">Tingkat Nafas</label>
                        <select name="tingkat_nafas" id="tingkat_nafas_sertif"
                            value="{{ old('tingkat_nafas') }}" class="form-select @error('tingkat_nafas') is-invalid @enderror" required>
                            <option value="">-- Pilih Tingkat Nafas --</option>
                            <option value="Dasar">Dasar</option>
                            <option value="Balik">Balik</option>
                        </select>
                        @error('tingkat_nafas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Juara</label>
                        <select name="juara" id="juara_sertif"
                            value="{{ old('juara') }}" class="form-select @error('juara') is-invalid @enderror" required>
                            <option value="">-- Pilih Juara --</option>
                            <option value="Juara 1">Juara 1</option>
                            <option value="Juara 2">Juara 2</option>
                            <option value="Juara 3">Juara 3</option>
                            <option value="Juara Harapan 1">Juara Harapan 1</option>
                            <option value="Juara Harapan 2">Juara Harapan 2</option>
                            <option value="Juara Harapan 3">Juara Harapan 3</option>
                        </select>
                        @error('juara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Atlet</label>
                        <select name="atlet" id="atlet_sertif"
                            value="{{ old('atlet') }}" class="form-select @error('atlet') is-invalid @enderror" required>
                            <option value="">-- Pilih Atlet --</option>
                        </select>
                        @error('atlet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h2>Daftar Sertifikat</h2>
                    </div>
                </div>
                <table id="data_kolat"class="table table-striped display nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nama Kontingen</th>
                            <th>Nama Pelatih 1</th>
                            <th>Nama Pelatih 2</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data kolat -->
                        @foreach ($kolat as $item)
                            <tr>
                                <td>{{ $item->nama_kontingen }}</td>
                                <td>{{ $item->nama_pelatih_1 }}</td>
                                <td>{{ $item->nama_pelatih_2 }}</td>
                                <td class="d-flex justify-content-center">
                                    <form action="{{ route('a.detail-sertifikat', ['id_kolat' => $item->id_kolat]) }}" method="GET">
                                        {{-- @csrf --}}
                                        <button type="submit" class="btn btn-primary btn-sm">Detail</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('assets.js.ajax-sertifikat')
    @include('assets.js.js-sertifikat')
    @include('assets.js.notifikasi-berhasil')
    @include('assets.js.validasi-modal-tambah')
    @include('assets.js.validasi-modal-edit')
@endsection