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


<script src="{{ asset('js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('js/dropzone/dropzone-config.js') }}"></script>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<textarea id="my-editor" name="content" class="form-control"></textarea>
<script>
  CKEDITOR.replace( 'my-editor', {
    filebrowserImageBrowseUrl: '../public/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '../public/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '../public/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '../public/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
  });
</script>

@yield('scriptdatepicker')





	
		