<footer class="page-footer">
	<div class="page-footer-inner">
	</div> <?php echo date('Y');?>&copy; <a href="http://nrsinfoways.com" target="_blank">nrsinfoways</a>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</footer>
<!--[if lt IE 9]>
<script src="{{asset('/plugins/respond.min.js')}}"></script>
<script src="{{asset('/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery-slimscroll/jquery.slimscroll.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script src="{{asset('/plugins/axios/axios.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/jquery-multi-select/js/jquery.multi-select.js')}}"></script>

<script type="text/javascript" src="<?php echo asset('/plugins/validation/js/formValidation.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('/plugins/validation/js/framework/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="{{asset('/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/pnotify/pnotify.custom.min.js')}}"></script>
<!-- END CORE PLUGINS -->

<script src="{{asset('/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('/layout/scripts/demo.js')}}" type="text/javascript"></script>
@yield('script')


<script>
	jQuery(document).ready(function () {
		Metronic.init(); // init metronic core componentsw
		Layout.init(); // init current layouts
		Demo.init(); // init demo features

		setTimeout(function () {
			$('div.alert').hide();
		}, 5000);

		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});

		$(".reset").click(function () {
			var value = $(this).closest('form').find("input[readonly]").val();
			$(this).closest('form')[0].reset();
			$(this).closest('form').find("input[readonly]").val(value);
		});


	});
</script>
</body>
</html>