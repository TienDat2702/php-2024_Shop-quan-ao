<!-- jQuery -->
<script src="{{ asset('Backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('Backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('Backend/dist/js/adminlte.js') }}"></script>

{{-- libary --}}
<script src="{{ asset('Backend/library/library.js') }}"></script>
<script src="{{ asset('Backend/library/location.js') }}"></script>
{{-- end libary --}}

<!-- use -->
@yield('script')