<!-- javascript files -->
<script src="{{ asset('user/js/jquery.js') }}"></script>
<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/js/custom.js') }}"></script>
<script src="{{ asset('user/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('user/js/wow.min.js') }}"></script>
<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/js/ekko-lightbox-min.js') }}"></script>
<script type="text/javascript">
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) { event.preventDefault(); $(this).ekkoLightbox(); }); 
</script>
<script>
    new WOW().init();
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@yield('customjs')