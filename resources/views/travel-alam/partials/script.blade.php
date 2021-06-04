  <!-- Vendor JS Files -->
  <script src="{{ asset('travel-alam/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('travel-alam/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('travel-alam/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('travel-alam/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('travel-alam/assets/js/main.js') }}"></script>

  <!-- Dynamic Dropdown -->
  {{-- <script>
    $(document).ready(function () {
      $(document).on('change', '#province', function() {
        var province_id = $(this).val();
        var div = $(this).parent();
        var op = " ";
        // console.log(div);
        $.ajax({
          type: 'get',
          url: '{!!URL::to('location')!!}',
          data: {'id':province_id},
          success: function(data){
            for (var i = 0; i < data.length; i++){
                op += '<option value="' + data[i].id + '">'+ data[i].lokasi +'</option>';
            }
            div.find('#location').html(" ");
            div.find('#location').append(op);
          },
          error: function(){
              console.log('success');
          },
        });
      });
    });
  </script> --}}