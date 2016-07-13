<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.2 -->
<script src="{{ asset('/js/jquery.min.js') }}" ></script>
<script src="{{ asset('/js/main.js') }}" ></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!--estos dos scrip es para mandar la cantidad de item del carrito y actualizar-->
<script src="{{ asset('js/pinterest_grid.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<!--sweetalert-->
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/sweetalert/sweetalert-dev.js') }}"></script>
@include('sweet::alert')


<!--Filemanager-->
<script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>
<script type="text/javascript">
editor_config.selector = "textarea";
editor_config.path_absolute = "{{ asset('/') }}";
tinymce.init(editor_config);
</script>

@yield('scriptdatepicker')





	
		