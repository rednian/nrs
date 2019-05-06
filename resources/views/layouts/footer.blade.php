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
<script src="{{asset('/plugins/pooper.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery-slimscroll/jquery.slimscroll.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/plugins/bootbox.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<script src="{{asset('/plugins/axios/axios.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/jquery-multi-select/js/jquery.multi-select.js')}}"></script>

<script type="text/javascript" src="<?php echo asset('/plugins/validation/js/formValidation.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('/plugins/validation/js/framework/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="{{asset('/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/pnotify/pnotify.custom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/file-icons/index.js')}}"></script>
<!-- END CORE PLUGINS -->

<script src="{{asset('/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('/layout/scripts/demo.js')}}" type="text/javascript"></script>
@yield('script')


<script>
	window.getIcon = function( fileName){
		var icons = window.FileIcons;
	 	var class_name = icons.getClassWithColor(fileName);
		return '<span class="'+class_name+'"></span>';
	}
	


	jQuery(document).ready(function () {
		Metronic.init(); // init metronic core componentsw
		Layout.init(); // init current layouts
		Demo.init(); // init demo features

		



	
			$(document).bind("ajaxSend", function(){
			
			 }).bind("ajaxComplete", function(){
			    $(".overlay").LoadingOverlay("hide", true);
			 });


		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});

		$('#frm-change-password').formValidation({
			message: 'This value is not valid',
			// live: 'disabled',
			icon: {
				   valid: 'fa fa-ok',
				   invalid: 'fa fa-remove',
				   validating: 'fa fa-spinner fa-spin'
			},
			fields: {
			      current_password: {
			        message: 'The password is not valid',
			        validators: {
			          notEmpty: {
			            message: 'The old password is required and cannot be empty'
			          },
			          remote: {
			            url: '{{ route('user.checkpassword') }}',
			            type: 'post',
			             // data: {password: $(this).val()},
			            message: 'invalid password.',
			            delay: 1000
			          }
			        }
			      },
			      new_password: {
			        validators: {
			          notEmpty: {
			            message: 'The password is required and can\'t be empty'
			          },
			          stringLength: {
			            min: 6,
			            max: 30,
			            message: 'The password must be more than 6 and less than 30 characters long'
			          },
			          regexp: {
			            regexp: /^[a-zA-Z0-9_\.]+$/,
			            message: 'The password can only consist of alphabetical, number, dot and underscore'
			          },
			          // different: {
			          //   field: 'username',
			          //   message: 'The password can\'t be the same as username'
			          // },
			          callback: {
			            callback: function (value, validator) {
			              // Check the password strength
			              if (value.length < 6) {
			                return {
			                  valid: false,
			                  message: 'The password must be more than 6 characters'
			                }
			              }

			              // if (value === value.toLowerCase()) {
			              //   return {
			              //     valid: false,
			              //     message: 'The password must contain at least one upper case character'
			              //   }
			              // }
			              // if (value === value.toUpperCase()) {
			              //   return {
			              //     valid: false,
			              //     message: 'The password must contain at least one lower case character'
			              //   }
			              // }
			              // if (value.search(/[0-9]/) < 0) {
			              //   return {
			              //     valid: false,
			              //     message: 'The password must contain at least one number'
			              //   }
			              // }

			              return true;
			            }
			          }
			        }
			      },
			      confirm_password: {
			        validators: {
			          notEmpty: {
			            message: 'The confirm password is required and can\'t be empty'
			          },
			          identical: {
			            field: 'new_password',
			            message: 'The password and its confirm are not the same'
			          }
			        }
			      },

			}
		}).on('success.form.fv', function (e) {
			e.preventDefault();

			var $form = $(e.target);

			var _this = this;

			$.ajax({	
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $(this).serialize()
			}).done(function(response){
				if(response.success){
					new PNotify({
						type: 'success',
						text: response.message
					});




					$form
					  .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
					  .formValidation('resetForm', true);

					$('#bs-example-modal-sm').modal('hide');
				}
			});



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