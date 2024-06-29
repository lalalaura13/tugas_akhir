@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-1 g-4">
            <div class="col">
                <div class="card" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                    <div class="card-body">
                        <table id="data_kolat" class="table table-striped display nowrap" style="width: 100%">
                            
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Kontingen</th>
                                    <th class="text-center">Nama Form B</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formB as $item)
                                    <tr class="text-center">
                                        <td class="text-center">{{ $item->nama_kontingen }}</td>
                                        <td class="text-center">{{ !empty($item->nama_form_B) ? $item->nama_form_B : '-' }}</td>
                                        <td class="d-flex justify-content-center">
                                            @if (!empty($item->nama_form_B))
                                                <a href="{{ $item->image }}" target="_blank" class="btn btn-rounded btn-sm btn-primary btn-xs">Lihat</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    @include('assets.js.sweatalert-delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('assets.js.notifikasi-berhasil')
    @include('assets.js.validasi-modal-tambah')
    @include('assets.js.validasi-modal-edit')
@endsection