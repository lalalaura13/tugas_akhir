<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchAtletData() {
            let kategoriTanding = $('#kategori_tanding_sertif').val();
            let kategoriUsia = $('#kategori_usia_sertif').val();
            let jenisKelamin = $('#jenis_kelamin_sertif').val();
            let data = {
                kategoriTanding: kategoriTanding,
                kategoriUsia: kategoriUsia,
                jenisKelamin: jenisKelamin
            };

            // Tambahkan kelas_tanding dan tingkat_nafas jika kategori_tanding bukan Seni Tunggal atau Getaran
            if (kategoriTanding !== 'Seni Tunggal' && kategoriTanding !== 'Getaran') {
                let kelasTanding = $('#kelas_tanding_sertif').val();
                let tingkatNafas = $('#tingkat_nafas_sertif').val();
                data.kelasTanding = kelasTanding;
                data.tingkatNafas = tingkatNafas;
                console.log('Kategori Tanding:', kategoriTanding, 'Kategori Usia:', kategoriUsia, 'Kelas Tanding:', kelasTanding, 'Tingkat Nafas:', tingkatNafas, 'Jenis Kelamin:', jenisKelamin);
            } else {
                console.log('Kategori Tanding:', kategoriTanding, 'Kategori Usia:', kategoriUsia, 'Jenis Kelamin:', jenisKelamin);
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('a.get-atlet-sertif') }}",
                data: data,
                cache: false,
                success: function(msg) {
                    $('#atlet_sertif').html(msg);
                },
                error: function(data) {
                    console.log('error', data);
                },
            });
        }

        $('#kategori_tanding_sertif').on('change', fetchAtletData);
        $('#kategori_usia_sertif').on('change', fetchAtletData);
        $('#kelas_tanding_sertif').on('change', fetchAtletData);
        $('#tingkat_nafas_sertif').on('change', fetchAtletData);
        $('#jenis_kelamin_sertif').on('change', fetchAtletData);
    });
</script>