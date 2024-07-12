@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row g-2">
        <div class="col-12">
            <div class="card text-center text-bg-light shadow p-3">
                {{-- <div class="card-footer text-body-secondary">
                    <p class="card-title text-uppercase fw-bolder h2">{{ $user->nama_kontingen }}</p>
                </div> --}}
                <div class="card-body">
                    <p class="card-text h3">Haii <span class="fw-bolder">{{ $user->nama_kontingen }},</span> Selamat Datang di sistem silat, Anda login sebagai {{ $akun->roles->level }} </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold text-uppercase mb-4">Tabel Medali</h5>
            <table id="table_medali" class="table table-striped display nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">Nama Kolat</th>
                        <th class="text-center">Emas</th>
                        <th class="text-center">Perak</th>
                        <th class="text-center">Perunggu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medali as $item)
                    <tr>
                        <td class="text-center">{{ $item->kolat->nama_kontingen }}</td>
                        <td class="text-center">{{ $item->emas }}</td>
                        <td class="text-center">{{ $item->perak }}</td>
                        <td class="text-center">{{ $item->perunggu }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-12">
            <div class="card" style="box-shadow: 4px 0 60px rgba(0, 0, 0, 0.1);">
                <div class="card-header border-success bg-transparent fw-bolder mt-3">
                    <h5 class="fw-bolder text-decoration-underline text-primary text-uppercase">Jadwal Kejuaraan</h5>
                </div>
                <div class="card-body">
                    @if (empty($jadwal))
                        <h4 class="text-danger text-center">Tidak Ada Jadwal</h4>
                    @else
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach ($jadwal as $item)
                            <div class="col">
                                <div class="card" style="box-shadow: 4px 0 60px rgba(0, 0, 0, 0.1);">
                                    <div class="card-header border-success fw-bolder">{{ $item->judul }}</div>
                                    <div class="card-body">
                                        <span class="text-primary">Hari, Tanggal :</span>
                                        <p>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, DD MMMM YYYY', 'id') }}</p>
                                        <span class="text-primary">Waktu :</span>
                                        <p>{{ !empty($item->waktu) ? $item->waktu : '-' }}</p>
                                        <span class="text-primary">Narahubung 1 :</span>
                                        <p>{{ !empty($item->nohp_narhub_1) ? $item->narahubung_1 . ' ('.$item->nohp_narhub_1.')' : '-' }}</p>
                                        <span class="text-primary">Narahubung 2 :</span>
                                        <p>{{ !empty($item->nohp_narhub_2) ? $item->narahubung_2 . ' ('.$item->nohp_narhub_2.')' : '-' }}</p>
                                        <span class="text-primary">Narahubung 3 :</span>
                                        <p>{{ !empty($item->nohp_narhub_3) ? $item->narahubung_3 . ' ('.$item->nohp_narhub_3.')' : '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
