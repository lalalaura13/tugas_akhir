@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
            <div class="card-body">
                <h5 class="card-title fw-semibold text-uppercase mb-4">Daftar seluruh peserta</h5>
                <a href="{{ route('k.download-all') }}" class="btn btn-sm btn-rounded btn-success mb-3">Download All</a>
                <table id="example" class="table table-striped display nowrap" style="width: 100%">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Atlet</th>
                            <th>Kategori </th>
                            <th>Juara</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sertifikat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->atlet }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->juara }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ $item->path }}" target="_blank" class="btn btn-sm btn-rounded btn-primary me-2">Lihat</a>
                                    <a href="{{ asset($item->path) }}" download class="btn btn-sm btn-rounded btn-secondary">Download</a>
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