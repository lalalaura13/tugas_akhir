@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="data_kolat" class="table table-striped display nowrap" style="width: 100%">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah">Tambah <i class="ti ti-edit"></i></button>
                    <!-- Scrollable modal -->
                    <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <form id="formModal" action="{{ route('k.tambah-peserta') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Atlet</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Atlet</label>
                                            <input type="text" class="form-control" value="{{ old('nama_atlet') }}" name="nama_atlet" id="nama_atlet" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" value="{{ old('tempat_tanggal_lahir') }}" name="tempat_tanggal_lahir" id="tempat_tanggal_lahir" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sekolah</label>
                                            <input type="text" class="form-control" name="sekolah" value="{{ old('sekolah') }}" id="sekolah" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kategori Tanding</label>
                                            <select name="kategori_tanding" id="kategori_tanding" class="form-select" required>
                                                <option value="">-- pilih kategori Tanding --</option>
                                                <option value="00">Tanding</option>
                                                <option value="01">Seni Tunggal</option>
                                                <option value="02">Getaran</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kategori Usia</label>
                                            <select name="kategori_usia" id="kategori_usia" class="form-select" required>
                                                <option value="00.00">-- pilih kategori Usia --</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="kelas_tanding_div">
                                            <label class="form-label">Kelas Tanding</label>
                                            <select name="kelas_tanding" id="kelas_tanding" class="form-select" required>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="tingkat_nafas_div">
                                            <label class="form-label">Tingkat Nafas</label>
                                            <select name="tingkat_nafas" id="tingkat_nafas" class="form-select" required>
                                                <option value="">-- pilih Tingkat Nafas --</option>
                                                <option value="Dasar">Dasar</option>
                                                <option value="Balik">Balik</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Form A</label>
                                            <input class="form-control" type="file" id="form_A" name="form_A" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Form C</label>
                                            <input class="form-control" type="file" id="form_C" name="form_C" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Form D</label>
                                            <input class="form-control" type="file" id="form_D" name="form_D" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr class="text-center">
                            <th>Nama Atlet</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Sekolah</th>
                            <th>Kategori Tanding</th>
                            <th>Kategori Usia</th>
                            <th>Kelas Tanding</th>
                            <th>Tingkat Nafas</th>
                            <th>Form A</th>
                            <th>Form C</th>
                            <th>Form D</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peserta as $item)    
                        <tr class="text-center">
                            <td>{{  $item->nama_atlet }}</td>
                            <td>{{ $item->tempat_tanggal_lahir }}</td>
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
                            <td>
                                @if ($item->status == 'Sudah Terverifikasi')
                                <h5><span class="btn btn-sm btn-outline-secondary">{{ $item->status }}</span></h5>
                                @elseif ($item->status == 'Belum Terverifikasi')
                                <h5><span class="btn btn-sm btn-outline-warning">{{ $item->status }}</span></h5>
                                @endif
                            </td>
                            
                            <td class="d-flex justify-content-center">
                                <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_peserta }}"><i class="ti ti-edit"></i></button>
                                <form id="deleteForm{{ $item->id_peserta }}" 
                                    action="{{ route('k.delete-peserta', ['id_peserta' => $item->id_peserta]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ms-2 show_delete"><i 
                                        class="ti ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $item->id_peserta }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Atlet</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="formModalEdit" action="{{ route('k.update-peserta', ['id_peserta' => $item->id_peserta]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Atlet</label>
                                            <input type="text" class="form-control" id="nama_atlet" name="nama_atlet" value="{{ $item->nama_atlet }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahit</label>
                                            <input type="date" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="{{ $item->tempat_tanggal_lahir }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Sekolah</label>
                                            <input type="text" class="form-control" id="sekolah" name="sekolah" value="{{ $item->sekolah }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Kategori Tanding</label>
                                            <select type="text" class="form-select" id="kategori_tanding{{ $item->id_peserta }}" name="kategori_tanding" required>
                                                <option value="">-- pilih kategori Tanding --</option>
                                                <option value="00">Tanding</option>
                                                <option value="01">Seni Tunggal</option>
                                                <option value="02">Getaran</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kategori Usia</label>
                                            <select name="kategori_usia" id="kategori_usia{{ $item->id_peserta }}" class="form-select" required>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin{{ $item->id_peserta }}" class="form-select" required>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="kelas_tanding_div{{ $item->id_peserta }}">
                                            <label class="form-label">Kelas Tanding</label>
                                            <select name="kelas_tanding" id="kelas_tanding{{ $item->id_peserta }}" class="form-select" required>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="tingkat_nafas_div{{ $item->id_peserta }}">
                                            <label class="form-label">Tingkat Nafas</label>
                                            <select name="tingkat_nafas" id="tingkat_nafas{{ $item->id_peserta }}" class="form-select" required>
                                                <option @if ($item->tingkat_nafas == 'Dasar')  @endif value="Dasar">Dasar</option>
                                                <option @if ($item->kategori_usia == 'Balik')  @endif value="Balik">Balik</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Form A</label>
                                            <input class="form-control" type="file" id="form_A" name="form_A">
                                            <span id="fileName">{{ $item->nama_form_A }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Form C</label>
                                            <input class="form-control" type="file" id="form_C" name="form_C">
                                            <span id="fileName">{{ $item->nama_form_C }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Form D</label>
                                            <input class="form-control" type="file" id="form_D" name="form_D">
                                            <span id="fileName">{{ $item->nama_form_D }}</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        {{-- MENYEMBUYIKAN ATRIBUT REQUIRED KELAS TANDING DAN TINGKAT NAFAS JIKA MEMILIH GETARAN DAN SENI TUNGGAL --}}
                        <script>
                            $(function() {
                                $('#kategori_tanding{{ $item->id_peserta }}').on('change', function() {
                                    let selectedValue = $(this).val();
                                    if (selectedValue === '01' || selectedValue === '02') {
                                        $('#kelas_tanding{{ $item->id_peserta }}').removeAttr('required');
                                        $('#tingkat_nafas{{ $item->id_peserta }}').removeAttr('required');
                                    } else {
                                        $('#kelas_tanding{{ $item->id_peserta }}').attr('required', 'required');
                                        $('#tingkat_nafas{{ $item->id_peserta }}').attr('required', 'required');
                                    }
                                });
                            });
                        </script>

                        <script>
                            document.getElementById('kategori_tanding{{ $item->id_peserta }}').addEventListener('change', function() {
                                var kategoriTanding = this.value;
                                if (kategoriTanding === '01' || kategoriTanding === '02') { // Jika kategori tanding dipilih sebagai "Getaran" atau "Seni tunggal"
                                    document.getElementById('kelas_tanding_div{{ $item->id_peserta }}').style.display =
                                    'none'; // Sembunyikan dropdown Kelas tanding
                                    document.getElementById('tingkat_nafas_div{{ $item->id_peserta }}').style.display =
                                    'none'; // Sembunyikan dropdown tingkat nafas
                                } else {
                                    document.getElementById('kelas_tanding_div{{ $item->id_peserta }}').style.display =
                                    'block'; // Tampilkan dropdown kelas tanding
                                    document.getElementById('tingkat_nafas_div{{ $item->id_peserta }}').style.display =
                                    'block'; // Tampilkan dropdown tingkat nafas
                                }
                            });
                        </script>
                        <script>
                            document.getElementById('kategori_usia{{ $item->id_peserta }}').addEventListener('change', function() {
                                var kategoriUsia = this.value;
                                var tingkatNafasDiv = document.getElementById('tingkat_nafas_div{{ $item->id_peserta }}');
                                
                                if (kategoriUsia === '01.00' || kategoriUsia === '01.01' || kategoriUsia === '01.02' || kategoriUsia === '02.00' || kategoriUsia === '02.01' || kategoriUsia === '02.02') {
                                    document.getElementById('tingkat_nafas_div{{ $item->id_peserta }}').style.display = 'none';
                                }
                            });
                        </script>
                        <script>
                            document.getElementById('kategori_usia{{ $item->id_peserta }}').addEventListener('change', function() {
                                var kategoriUsia = this.value;
                                var tingkatNafasDiv = document.getElementById('tingkat_nafas_div{{ $item->id_peserta }}');
                    
                                if (kategoriUsia === '00.03' || kategoriUsia === '00.04' || kategoriUsia === '01.00' || kategoriUsia ===
                                    '01.01' || kategoriUsia === '01.02' || kategoriUsia === '02.00' || kategoriUsia === '02.01' || kategoriUsia === '02.02') {
                                    document.getElementById('tingkat_nafas_div{{ $item->id_peserta }}').style.display = 'none';
                                } else {
                                    // pada bagian sini tambahkan bagaimana cara mengembalikan semua elemen yang telah terhapus di dalam tingkat_nafas_div{{ $item->id_peserta }}
                                    document.getElementById('tingkat_nafas_div{{ $item->id_peserta }}').style.display = 'block';
                                }
                            });
                        </script>

                        {{-- ajax untuk modal edit --}}
                        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

                        <script>
                            $(function() {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $(function() {

                                        $('#kategori_tanding{{ $item->id_peserta }}').on('change', function() {
                                            let idKategoritanding = $('#kategori_tanding{{ $item->id_peserta }}').val();

                                            console.log(idKategoritanding);
                                            $.ajax({
                                                type: 'POST',
                                                url: "{{ route('k.get-usia') }}",
                                                data: {
                                                    idKategoritanding: idKategoritanding
                                                },
                                                cache: false,

                                                success: function(msg) {
                                                    $('#kategori_usia{{ $item->id_peserta }}').html(msg);
                                                },
                                                error: function(data) {
                                                    console.log('error', data);
                                                },
                                            })
                                        });
                                    });
                                });

                            $(function () {
                                $.ajaxSetup({
                                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                                });
                        
                                $(function(){
                        
                                    $('#kategori_usia{{ $item->id_peserta }}').on('change',function(){
                                        let idUsia = $('#kategori_usia{{ $item->id_peserta }}').val();
                                        
                                        console.log(idUsia);
                                        $.ajax({
                                            type: 'POST',
                                            url: "{{ route('k.get-kelamin') }}",
                                            data: {idUsia:idUsia},
                                            cache: false,
                        
                                            success: function (msg) { 
                                                    $('#jenis_kelamin{{ $item->id_peserta }}').html(msg);
                                                },
                                                error: function(data){
                                                    console.log('error', data);
                                                },
                                        })
                                    });
                                });
                            });
                        
                            $(function () {
                                $.ajaxSetup({
                                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                                });
                        
                                $(function(){
                        
                                    $('#jenis_kelamin{{ $item->id_peserta }}').on('change',function(){
                                        let idKelamin = $('#jenis_kelamin{{ $item->id_peserta }}').val();
                                        
                                        console.log(idKelamin);
                                        $.ajax({
                                            type: 'POST',
                                            url: "{{ route('k.get-tanding') }}",
                                            data: {idKelamin:idKelamin},
                                            cache: false,
                        
                                            success: function (msg) { 
                                                    $('#kelas_tanding{{ $item->id_peserta }}').html(msg);
                                                },
                                                error: function(data){
                                                    console.log('error', data);
                                                },
                                        })
                                    });
                                });
                            });
                        </script>
                        @include('assets.js.validasi-modal-edit')
                        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            $(document).ready(function(){
                                $('#deleteForm{{ $item->id_peserta }}').submit(function(e){
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
            </div>
        </div>
        
        <div class="row g-2 mt-4">
            <div class="col-4">
                <div class="card h-100" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Tambahkan Form B</h5>
                        <form action="{{ route('k.tambah-formB') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-5 mb-3">
                                <label for="formFile" class="form-label">Form B</label>
                                <input class="form-control @error('form_B') is-invalid @enderror" type="file" id="form_B" name="form_B">
                                @error('form_B')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('mpun-onten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card h-100" style="box-shadow: 5px 5px 10px rgba(135, 110, 210, 0.5);">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Table Form B</h5>
                        <div class="table-responsive">
                            @if (session('sukses-formB'))
                                <div class="alert alert-success">
                                    {{ session('sukses-formB') }}
                                </div>
                            @endif
                            <table class="table table-striped text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nama Form B</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 text-center">Aksi</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if (!empty($formB))
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $formB }}</h6>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ $alamatB }}" target="_blank" type="button" class="btn btn-warning ms-2"><i class="ti ti-eye"></i></a>
                                                <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                                                    data-bs-target="#editFormB"><i class="ti ti-edit"></i>
                                                </button>
                                                <form id="deleteB"
                                                    action="{{ route('k.delete-formB') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ms-2"><i class="ti ti-trash"></i></button>
                                                </form>
                                            </td>
                                        @else
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Tidak ada file!</h6>
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            {{-- modal edit form B --}}
                            <div class="modal fade" id="editFormB" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ route('k.update-formB') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Form B</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Form B</label>
                                                    <input class="form-control" type="file" id="form_B" name="form_B">
                                                    <span id="fileName">{{ $formB }}</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Sweetalert Delete Form B --}}
    <script>
        $(document).ready(function(){
            $('#deleteB').submit(function(e){
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

    <script>
        // modal insert
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {

                $('#kategori_tanding').on('change', function() {
                    let idKategoritanding = $('#kategori_tanding').val();

                    console.log(idKategoritanding);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('k.get-usia') }}",
                        data: {
                            idKategoritanding: idKategoritanding
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kategori_usia').html(msg);
                        },
                        error: function(data) {
                            console.log('error', data);
                        },
                    })
                });
            });
        });

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {

                $('#kategori_usia').on('change', function() {
                    let idUsia = $('#kategori_usia').val();

                    console.log(idUsia);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('k.get-kelamin') }}",
                        data: {
                            idUsia: idUsia
                        },
                        cache: false,

                        success: function(msg) {
                            $('#jenis_kelamin').html(msg);
                        },
                        error: function(data) {
                            console.log('error', data);
                        },
                    })
                });
            });
        });

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {

                $('#jenis_kelamin').on('change', function() {
                    let idKelamin = $('#jenis_kelamin').val();

                    console.log(idKelamin);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('k.get-tanding') }}",
                        data: {
                            idKelamin: idKelamin
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kelas_tanding').html(msg);
                        },
                        error: function(data) {
                            console.log('error', data);
                        },
                    })
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    {{-- MENYEMBUYIKAN ATRIBUT REQUIRED KELAS TANDING DAN TINGKAT NAFAS JIKA MEMILIH GETARAN DAN SENI TUNGGAL --}}
    <script>
        $(document).ready(function() {
            function updateRequiredStatus() {
                let kategoriTandingValue = $('#kategori_tanding').val();
                let kategoriUsiaValue = $('#kategori_usia').val();
    
                // Kondisi untuk #kelas_tanding
                if (kategoriTandingValue === '01' || kategoriTandingValue === '02') {
                    $('#kelas_tanding').removeAttr('required');
                } else {
                    $('#kelas_tanding').attr('required', 'required');
                }
    
                // Kondisi untuk #tingkat_nafas
                if ((kategoriTandingValue === '00' && (kategoriUsiaValue === '00.03' || kategoriUsiaValue === '00.04')) || 
                    kategoriTandingValue === '01' || 
                    kategoriTandingValue === '02') {
                    $('#tingkat_nafas').removeAttr('required');
                } else {
                    $('#tingkat_nafas').attr('required', 'required');
                }
            }
    
            // Panggil fungsi updateRequiredStatus pada event change untuk kategori_tanding dan kategori_usia
            $('#kategori_tanding, #kategori_usia').on('change', function() {
                updateRequiredStatus();
            });
    
            // Trigger change event on page load to initialize the state
            updateRequiredStatus();
        });
    </script>

{{-- MENYEMBUYIKAN DROPDOWN KELAS TANDING DAN TINGKAT NAFAS JIKA MEMILIH GETARAN DAN SENI TUNGGAL --}}
<script>
    document.getElementById('kategori_tanding').addEventListener('change', function() {
        var kategoriTanding = this.value;
        if (kategoriTanding === '01' || kategoriTanding ===
            '02') { // Jika kategori tanding dipilih sebagai "Getaran" atau "Seni tunggal"
            document.getElementById('kelas_tanding_div').style.display =
            'none'; // Sembunyikan dropdown Kelas tanding
            document.getElementById('tingkat_nafas_div').style.display =
            'none'; // Sembunyikan dropdown tingkat nafas
        } else {
            document.getElementById('kelas_tanding_div').style.display =
            'block'; // Tampilkan dropdown kelas tanding
            document.getElementById('tingkat_nafas_div').style.display =
            'block'; // Tampilkan dropdown tingkat nafas
        }
    });
</script>
<script>
    document.getElementById('kategori_usia').addEventListener('change', function() {
        var kategoriUsia = this.value;
        var tingkatNafasDiv = document.getElementById('tingkat_nafas_div');


        if (kategoriUsia === '01.00' || kategoriUsia === '01.01' || kategoriUsia === '01.02' || kategoriUsia === '02.00' || kategoriUsia === '02.01' || kategoriUsia === '02.02') {
            document.getElementById('tingkat_nafas_div').style.display = 'none';
        }else {
            document.getElementById('tingkat_nafas_div').style.display =
            'block'; // Tampilkan dropdown tingkat nafas
        }
    });
</script>
<script>
    document.getElementById('kategori_usia').addEventListener('change', function() {
        var kategoriUsia = this.value;
        var tingkatNafasDiv = document.getElementById('tingkat_nafas_div');

        if (kategoriUsia === '00.03' || kategoriUsia === '00.04' || kategoriUsia === '01.00' || kategoriUsia ===
            '01.01' || kategoriUsia === '01.02' || kategoriUsia === '02.00' || kategoriUsia === '02.01' || kategoriUsia === '02.02') {
            document.getElementById('tingkat_nafas_div').style.display = 'none';
        } else {
            // pada bagian sini tambahkan bagaimana cara mengembalikan semua elemen yang telah terhapus di dalam tingkat_nafas_div
            document.getElementById('tingkat_nafas_div').style.display = 'block';
        }
    });
</script>
@include('assets.js.validasi-modal-tambah')
@include('assets.js.notifikasi-berhasil')

@endsection

