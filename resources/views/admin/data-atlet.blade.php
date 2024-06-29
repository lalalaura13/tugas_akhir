@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
            <div class="card-body">
                <h5 class="card-title fw-semibold text-uppercase mb-4">Daftar seluruh peserta</h5>
                <table id="data_kolat" class="table table-striped display nowrap" style="width: 100%">
                    <thead>
                        <tr class="text-center">
                            <th>Nama Atlet</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Sekolah</th>
                            <th>Kategori Tanding</th>
                            <th>Kategori Usia</th>
                            <th>Kelas Tanding</th>
                            <th>Tingkat Nafas</th>
                            <th>Form A</th>
                            <th>Form C</th>
                            <th>Form D</th>
                            <th>Aksi</th>
                            {{-- <th class="text-center">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peserta as $item)
                            <tr class="text-center">
                                <td>{{ $item->nama_atlet }}</td>
                                <td>
                                    <p>
                                        {{ \Carbon\Carbon::parse($item->tempat_tanggal_lahir)->isoFormat('dddd, DD MMMM YYYY', 'id') }}
                                    </p>
                                </td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->sekolah }}</td>
                                <td>{{ $item->kategori_tanding }}</td>
                                <td>{{ $item->kategori_usia }}</td>
                                <td class="text-center">
                                    @if (!empty($item->kelas_tanding))
                                        {{ $item->kelas_tanding }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (!empty($item->tingkat_nafas))
                                        {{ $item->tingkat_nafas }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $item->form_A }}" target="_blank"
                                        class="btn btn-sm btn-rounded btn-primary">Lihat</a>
                                </td>
                                <td>
                                    <a href="{{ $item->form_C }}" target="_blank"
                                        class="btn btn-sm btn-rounded btn-primary">Lihat</a>
                                </td>
                                <td>
                                    <a href="{{ $item->form_D }}" target="_blank"
                                        class="btn btn-sm btn-rounded btn-primary">Lihat</a>
                                </td>
                                @if ($item->status == 'Sudah Terverifikasi')
                                    <td class="text-center"> - </td>
                                @elseif ($item->status == 'Belum Terverifikasi')
                                    <td class="d-flex justify-content-center">
                                        <form action="{{ route('a.verified-atlet', ['id' => $item->id_peserta]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm ms-2"><i class="ti ti-checkbox"> Verifikasi</i></button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                            @include('assets.js.validasi-modal-edit')
                            @include('assets.js.sweatalert-delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold text-uppercase mb-4">Daftar Peserta Sudah Terverifikasi</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th><h6>Nama Atlet</h6></th>
                                        <th><h6>Jenis Kelamin</h6></th>
                                        <th><h6>Sekolah</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($verified as $item)
                                    <tr>
                                        <td>{{ $item->nama_atlet }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->sekolah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold text-uppercase mb-4">Daftar Peserta Belum Terverifikasi</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th><h6>Nama Atlet</h6></th>
                                        <th><h6>Jenis Kelamin</h6></th>
                                        <th><h6>Sekolah</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notverified as $item)
                                    <tr>
                                        <td>{{ $item->nama_atlet }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->sekolah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('assets.js.notifikasi-berhasil')
    @endsection