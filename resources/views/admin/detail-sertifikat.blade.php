@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h2>Daftar Sertifikat {{ $namaKolat }}</h2>
                    </div>
                </div>
                <table id="data_kolat"class="table table-striped display nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Atlet</th>
                            <th>Kategori</th>
                            <th>Juara</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data kolat -->
                        @foreach ($detail as $item)
                            <tr>
                                <td>{{ $item->atlet }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->juara }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ $item->path }}" target="_blank" class="btn btn-secondary btn-sm">Lihat</a>
                                    <form id="deleteForm{{ $item->id }}" action="{{ route('a.delete-sertifikat', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ms-2 btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                $(document).ready(function(){
                                    $('#deleteForm{{ $item->id }}').submit(function(e){
                                        e.preventDefault();
                                        Swal.fire({
                                            title: 'Apakah Anda yakin?',
                                            text: "Anda tidak akan dapat mengembalikan ini!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya, hapus saja!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Submit form manually
                                                this.submit();
                                            }
                                        });
                                    });
                                });
                            </script>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('a.olah-sertifikat') }}">Kembali</a>
            </div>
        </div>
    </div>
    @include('assets.js.ajax-sertifikat')
    @include('assets.js.js-sertifikat')
    @include('assets.js.notifikasi-berhasil')
    @include('assets.js.validasi-modal-tambah')
    @include('assets.js.validasi-modal-edit')
@endsection