<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchAtletData() {
            let kategoriUsia = $('#kategori_usia_bagan').val();
            let kelasTanding = $('#kelas_tanding_bagan').val();
            let tingkatNafas = $('#tingkat_nafas_bagan').val();
            let jenisKelamin = $('#jenis_kelamin_bagan').val();

            let data = {
                kategoriUsia: kategoriUsia,
                kelasTanding: kelasTanding,
                jenisKelamin: jenisKelamin
            };

            // Tambahkan tingkat_nafas jika kategori_usia bukan Pra Remaja atau Usia Dini
            if (kategoriUsia !== 'Pra Remaja (SMP)' && kategoriUsia !== 'Usia Dini (Kelas 3-6 SD)') {
                data.tingkatNafas = tingkatNafas;
                console.log('Kategori Usia:', kategoriUsia, 'Kelas Tanding:', kelasTanding, 'Tingkat Nafas:', tingkatNafas, 'Jenis Kelamin:', jenisKelamin);
            } else {
                console.log('Kategori Usia:', kategoriUsia, 'Kelas Tanding:', kelasTanding, 'Jenis Kelamin:', jenisKelamin);
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('a.get-atlet') }}",
                data: data,
                cache: false,
                success: function(msg) {
                    $('.team-kiri').html(msg);
                    $('.team-kanan').html(msg);
                    $('#atlet_bagan').html(msg);
                },
                error: function(data) {
                    console.log('error', data);
                },
            });
        }

        $('#kategori_usia_bagan').on('change', function() {
            let kategoriUsia = $(this).val();
            if (kategoriUsia === 'Pra Remaja (SMP)' || kategoriUsia === 'Usia Dini (Kelas 3-6 SD)') {
                $('#tingkat_nafas_bagan').val('').hide();
            } else {
                $('#tingkat_nafas_bagan').show();
            }
            console.log('Kategori Usia:', kategoriUsia);
            fetchAtletData();
        });

        $('#kelas_tanding_bagan').on('change', fetchAtletData);
        $('#tingkat_nafas_bagan').on('change', fetchAtletData);
        $('#jenis_kelamin_bagan').on('change', fetchAtletData);

        // Call once on document ready to set the initial state
        $('#kategori_usia_bagan').trigger('change');
    });
</script>