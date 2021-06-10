  <!-- Vendor JS Files -->
  <script src="{{ asset('travel-alam/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('travel-alam/assets/vendor/aos/aos.js') }}"></script>
  {{-- <script src="{{ asset('travel-alam/assets/vendor/swiper/swiper-bundle.min.js') }}"></script> --}}
  <script src="{{ asset('travel-alam/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('travel-alam/assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('admin-kit/assets/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('admin-kit/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('admin-kit/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

  <script>
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
      todayHighlight: true,
      container:'.outer'
		});
	</script>

  <script>
    $('.profil').find('select').select2({
      minimumResultsForSearch: -1,
    });
  </script>

  <!-- Template Main JS File -->
  <script src="{{ asset('travel-alam/assets/js/main.js') }}"></script>