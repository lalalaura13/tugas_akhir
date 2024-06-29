<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

{{-- script search pada table sertifikat --}}
<script>
    const filter = document.getElementById("filter");
    const items = document.querySelectorAll("tbody tr");

    filter.addEventListener("input", (e) => filterData(e.target.value));

    function filterData(search){
        items.forEach((item) => {
            if (item.innerText.toLowerCase().includes(search.toLowerCase())) {
                item.classList.remove("d-none");
            } else {
                item.classList.add("d-none");
            }
        });
    }
</script>

{{-- MENYEMBUYIKAN DROPDOWN KELAS TANDING DAN TINGKAT NAFAS JIKA MEMILIH GETARAN DAN SENI TUNGGAL
<script>
    document.getElementById('kategori_tanding_sertif').addEventListener('change', function() {
        var kategoriTanding = this.value;
        if (kategoriTanding === '01' || kategoriTanding ===
            '02') { // Jika kategori tanding dipilih sebagai "Getaran" atau "Seni tunggal"
            document.getElementById('kelasTandingDiv').style.display =
            'none'; // Sembunyikan dropdown Kelas tanding
            document.getElementById('tingkatNafasDiv').style.display =
            'none'; // Sembunyikan dropdown tingkat nafas
        } else {
            document.getElementById('kelasTandingDiv').style.display =
            'block'; // Tampilkan dropdown kelas tanding
            document.getElementById('tingkatNafasDiv').style.display =
            'block'; // Tampilkan dropdown tingkat nafas
        }
    });
</script> --}}

{{-- DROPDOWN --}}
<script>
    $(document).ready(function () {
        $('#kategori_tanding_sertif').change(function () {
            updateFormOptions();
        });

        $('#kategori_usia_sertif, #jenis_kelamin_sertif').change(function () {
            updateKelasTandingOptions();
        });

        function updateFormOptions() {
            var kategoriTanding = $('#kategori_tanding_sertif').val();
            var kategoriUsiaSelect = $('#kategori_usia_sertif');
            var kelasTandingDiv = $('#kelasTandingDiv');
            var tingkatNafasDiv = $('#tingkatNafasDiv');
            var tingkatNafasSelect = $('#tingkat_nafas_sertif');
            var kelasTandingSelect = $('#kelas_tanding_sertif');

            if (kategoriTanding === 'Seni Tunggal' || kategoriTanding === 'Getaran') {
                kelasTandingDiv.hide();
                tingkatNafasDiv.hide();
                tingkatNafasSelect.val('');
                kelasTandingSelect.val('');
                tingkatNafasSelect.removeAttr('required');
                kelasTandingSelect.removeAttr('required');

                kategoriUsiaSelect.html(
                    '<option value="">-- Pilih Kategori Usia --</option>' +
                    '<option value="Dewasa (mahasiswa/Umum)">Dewasa (mahasiswa/Umum)</option>' +
                    '<option value="Remaja (SMA)">Remaja (SMA)</option>'
                );
            } else {
                kelasTandingDiv.show();
                kategoriUsiaSelect.html(
                    '<option value="">-- Pilih Kategori Usia --</option>' +
                    '<option value="Dewasa (mahasiswa/Umum)">Dewasa (mahasiswa/Umum)</option>' +
                    '<option value="Remaja (SMA)">Remaja (SMA)</option>' +
                    '<option value="Pra Remaja (SMP)">Pra Remaja (SMP)</option>' +
                    '<option value="Usia Dini (Kelas 3-6 SD)">Usia Dini (Kelas 3-6 SD)</option>'
                );
            }

            updateKelasTandingOptions();
        }

        function updateKelasTandingOptions() {
            var kategoriTanding = $('#kategori_tanding_sertif').val();
            var kategoriUsia = $('#kategori_usia_sertif').val();
            var jenisKelamin = $('#jenis_kelamin_sertif').val();
            var kelasTandingSelect = $('#kelas_tanding_sertif');
            var kelasTandingOptions = '<option value="">-- Pilih Kelas Tanding --</option>';
            var tingkatNafasDiv = $('#tingkatNafasDiv');
            var tingkatNafasSelect = $('#tingkat_nafas_sertif');

            if (kategoriTanding === 'Tanding') {
                if (kategoriUsia === 'Dewasa (mahasiswa/Umum)') {
                    if (jenisKelamin === 'Putra') {
                        for (var i = 65; i <= 74; i++) { // ASCII code for A to J
                            kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(i) + '">Kelas ' + String.fromCharCode(i) + '</option>';
                        }
                    } else if (jenisKelamin === 'Putri') {
                        for (var j = 65; j <= 70; j++) { // ASCII code for A to F
                            kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(j) + '">Kelas ' + String.fromCharCode(j) + '</option>';
                        }
                    }
                    tingkatNafasDiv.show();
                    tingkatNafasSelect.attr('required', true);
                } else if (kategoriUsia === 'Remaja (SMA)') {
                    if (jenisKelamin === 'Putra') {
                        for (var k = 65; k <= 74; k++) { // ASCII code for A to J
                            kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(k) + '">Kelas ' + String.fromCharCode(k) + '</option>';
                        }
                    } else if (jenisKelamin === 'Putri') {
                        for (var l = 65; l <= 72; l++) { // ASCII code for A to H
                            kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(l) + '">Kelas ' + String.fromCharCode(l) + '</option>';
                        }
                    }
                    tingkatNafasDiv.show();
                    tingkatNafasSelect.attr('required', true);
                } else if (kategoriUsia === 'Pra Remaja (SMP)' || kategoriUsia === 'Usia Dini (Kelas 3-6 SD)') {
                    if (kategoriUsia === 'Pra Remaja (SMP)') {
                        if (jenisKelamin === 'Putra') {
                            for (var m = 65; m <= 74; m++) { // ASCII code for A to J
                                kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(m) + '">Kelas ' + String.fromCharCode(m) + '</option>';
                            }
                        } else if (jenisKelamin === 'Putri') {
                            for (var n = 65; n <= 72; n++) { // ASCII code for A to H
                                kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(n) + '">Kelas ' + String.fromCharCode(n) + '</option>';
                            }
                        }
                    } else if (kategoriUsia === 'Usia Dini (Kelas 3-6 SD)') {
                        if (jenisKelamin === 'Putra') {
                            for (var o = 65; o <= 73; o++) { // ASCII code for A to I
                                kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(o) + '">Kelas ' + String.fromCharCode(o) + '</option>';
                            }
                        } else if (jenisKelamin === 'Putri') {
                            for (var p = 65; p <= 71; p++) { // ASCII code for A to G
                                kelasTandingOptions += '<option value="Kelas ' + String.fromCharCode(p) + '">Kelas ' + String.fromCharCode(p) + '</option>';
                            }
                        }
                    }
                    tingkatNafasDiv.hide();
                    tingkatNafasSelect.val('');
                    tingkatNafasSelect.removeAttr('required');
                }
                kelasTandingSelect.html(kelasTandingOptions);
                kelasTandingSelect.attr('required', true);
            } else {
                kelasTandingSelect.html('<option value="">-- Pilih Kelas Tanding --</option>');
                tingkatNafasDiv.hide();
                tingkatNafasSelect.val('');
                kelasTandingSelect.removeAttr('required');
                tingkatNafasSelect.removeAttr('required');
            }
        }

        updateFormOptions(); // Call once on document ready to set the initial state
    });
</script>