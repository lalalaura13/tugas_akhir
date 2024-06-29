
{{-- datatable --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

<script type="text/javascript">
  new DataTable('#data_kolat', {
    scrollX: true,
  });
</script>
<script type="text/javascript">
  new DataTable('#data_formB', {
    scrollX: true,
  });
</script>
<script type="text/javascript">
  new DataTable('#table_medali', {
    scrollX: true,
  });
</script>

<script>
  $(document).ready(function(){
      $(".clickable").click(function(){
          var target = $(this).data("target");
          $(target).toggle();
      });
  });
</script>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(".js-example-basic-multiple-limit").select2({
      maximumSelectionLength: 2
  });
</script> --}}

{{-- PENGKONDISIAN KELAS TANDING PADA FORM TAMBAH BAGAN --}}
<script>
  $(document).ready(function() {
      function updateKelasTandingOptions() {
          let kategoriUsia = $('#kategori_usia_bagan').val();
          let jenisKelamin = $('#jenis_kelamin_bagan').val();
          let kelasTandingOptions = {
              "Dewasa (mahasiswa/Umum)": {
                  "Putra": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F", "kelas G", "kelas H", "kelas I", "kelas J"],
                  "Putri": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F"]
              },
              "Remaja (SMA)": {
                  "Putra": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F", "kelas G", "kelas H", "kelas I", "kelas J"],
                  "Putri": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F", "kelas G", "kelas H"]
              },
              "Pra Remaja (SMP)": {
                  "Putra": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F", "kelas G", "kelas H", "kelas I", "kelas J"],
                  "Putri": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F", "kelas G", "kelas H"]
              },
              "Usia Dini (Kelas 3-6 SD)": {
                  "Putra": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F", "kelas G", "kelas H", "kelas I"],
                  "Putri": ["kelas A", "kelas B", "kelas C", "kelas D", "kelas E", "kelas F", "kelas G"]
              }
          };

          let availableOptions = kelasTandingOptions[kategoriUsia] ? kelasTandingOptions[kategoriUsia][jenisKelamin] : [];

          $('#kelas_tanding_bagan').empty().append('<option value="">-- pilih Kelas Tanding --</option>');
          availableOptions.forEach(function(option) {
              $('#kelas_tanding_bagan').append('<option value="' + option + '">' + option + '</option>');
          });
      }

      $('#kategori_usia_bagan, #jenis_kelamin_bagan').on('change', updateKelasTandingOptions);
  });
</script>

{{-- PENGKONDISIAN TINGKAT NAFAS KETIKA PADA KATEGORI USIA MEMILIH PRA REMAJA DAN USIA DINI, MAKA TINGKAT NAFAS DIHILANGKAN --}}
<SCript>
  $(document).ready(function() {
      $('#kategori_usia_bagan').on('change', function() {
          var selectedCategory = $(this).val();
          
          if (selectedCategory === 'Pra Remaja (SMP)' || selectedCategory === 'Usia Dini (Kelas 3-6 SD)') {
              $('#tingkatNafasDiv').hide();
          } else {
              $('#tingkatNafasDiv').show();
          }
      });

      // Trigger change event on page load to set the initial state
      $('#kategori_usia_bagan').trigger('change');
  });
</SCript>

{{-- SELECT 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(".js-example-basic-multiple-limit").select2({
    maximumSelectionLength: null
  });

  function syncOptions() {
    var selectedKiri = $('.team-kiri').val() || [];
    var selectedKanan = $('.team-kanan').val() || [];

    $('.team-kiri option, .team-kanan option').prop('disabled', false);

    selectedKiri.forEach(function(val) {
      $('.team-kanan option[value="' + val + '"]').prop('disabled', true);
    });

    selectedKanan.forEach(function(val) {
      $('.team-kiri option[value="' + val + '"]').prop('disabled', true);
    });

    $('.team-kiri').select2();
    $('.team-kanan').select2();
  }

  $('.team-kiri, .team-kanan').on('change', syncOptions);
  $(document).ready(syncOptions);
</script>

{{-- select2 remaja --}}
<script>
  $(document).ready(function() {
      function updateOptions() {
          let selectedKiriRemaja = $('#teamKiriRemaja').val() || [];
          let selectedKananRemaja = $('#teamKananRemaja').val() || [];
          
          $('#teamKiriRemaja option, #teamKananRemaja option').prop('disabled', false);

          selectedKiriRemaja.forEach(function(value) {
              $('#teamKananRemaja option[value="' + value + '"]').prop('disabled', true);
          });

          selectedKananRemaja.forEach(function(value) {
              $('#teamKiriRemaja option[value="' + value + '"]').prop('disabled', true);
          });
          
          $('#teamKiriRemaja').select2();
          $('#teamKananRemaja').select2();
      }

      $('#teamKiriRemaja, #teamKananRemaja').select2({
          placeholder: "-- Pilih Team --",
          maximumSelectionLength: 2,
          language: {
              maximumSelected: function(args) {
                  return "Anda hanya dapat memilih " + args.maximum + " item";
              }
          }
      });

      $('#teamKiriRemaja, #teamKananRemaja').on('change', updateOptions);

      updateOptions();
  });
</script>


{{-- 
<script>
  $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $(function(){

            $('#kategori_usia').on('change',function(){
                let idUsia = $('#kategori_usia').val();
                
                console.log(idUsia);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('k.get-kelamin') }}",
                    data: {idUsia:idUsia},
                    cache: false,

                    success: function (msg) { 
                          $('#jenis_kelamin').html(msg);
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

            $('#jenis_kelamin').on('change',function(){
                let idKelamin = $('#jenis_kelamin').val();
                
                console.log(idKelamin);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('k.get-tanding') }}",
                    data: {idKelamin:idKelamin},
                    cache: false,

                    success: function (msg) { 
                          $('#kelas_tanding').html(msg);
                        },
                        error: function(data){
                          console.log('error', data);
                        },
                })
            });
        });
    });
</script> --}}



<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>