@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
	<section class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="portlet light">
			    <div class="portlet-title">
			        <div class="caption">
			            <i class="fa fa-users"></i>
			            <span class="caption-subject bold uppercase"> USER LIST</span>
			        </div>
			        <div class="actions">
			            <a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen" data-original-title="" title=""></a>
			        </div>
			    </div>
			    <section class="portlet-body" style="padding: 0 7px 0 7px;">
			    	<table class="table table-condensed table-hover">
			    		<thead>
			    			<tr>
			    				<th>Name</th>
			    				<th>Username</th>
			    				<th>Email</th>
			    				<th>Registered Date</th>
			    				<th>Actions</th>
			    			</tr>
			    			<tbody>
			    			</tbody>
			    		</thead>
			    	</table>
			    </section>
			 </div>
		</div>
	</section>
@include('auth.update')
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function(){

		$('#frm-user-update').formValidation({
			message: 'This value is not valid',
			// live: 'disabled',
			icon: {
				   valid: 'fa fa-ok',
				   invalid: 'fa fa-remove',
				   validating: 'fa fa-spinner fa-spin'
			},
			fields: {
			      // current_password: {
			      //   message: 'The password is not valid',
			      //   validators: {
			      //     notEmpty: {
			      //       message: 'The old password is required and cannot be empty'
			      //     },
			      //     remote: {
			      //       url: '{{ route('user.checkpassword') }}',
			      //       type: 'post',
			      //        // data: {password: $(this).val()},
			      //       message: 'invalid password.',
			      //       delay: 1000
			      //     }
			      //   }
			      // },
			      // new_password: {
			      //   validators: {
			      //     notEmpty: {
			      //       message: 'The password is required and can\'t be empty'
			      //     },
			      //     stringLength: {
			      //       min: 6,
			      //       max: 30,
			      //       message: 'The password must be more than 6 and less than 30 characters long'
			      //     },
			      //     regexp: {
			      //       regexp: /^[a-zA-Z0-9_\.]+$/,
			      //       message: 'The password can only consist of alphabetical, number, dot and underscore'
			      //     },
			      //     // different: {
			      //     //   field: 'username',
			      //     //   message: 'The password can\'t be the same as username'
			      //     // },
			      //     callback: {
			      //       callback: function (value, validator) {
			      //         // Check the password strength
			      //         if (value.length < 6) {
			      //           return {
			      //             valid: false,
			      //             message: 'The password must be more than 6 characters'
			      //           }
			      //         }

			      //         // if (value === value.toLowerCase()) {
			      //         //   return {
			      //         //     valid: false,
			      //         //     message: 'The password must contain at least one upper case character'
			      //         //   }
			      //         // }
			      //         // if (value === value.toUpperCase()) {
			      //         //   return {
			      //         //     valid: false,
			      //         //     message: 'The password must contain at least one lower case character'
			      //         //   }
			      //         // }
			      //         // if (value.search(/[0-9]/) < 0) {
			      //         //   return {
			      //         //     valid: false,
			      //         //     message: 'The password must contain at least one number'
			      //         //   }
			      //         // }

			      //         return true;
			      //       }
			      //     }
			      //   }

			      // },
			      // confirm_password: {
			      //   validators: {
			      //     notEmpty: {
			      //       message: 'The confirm password is required and can\'t be empty'
			      //     },
			      //     identical: {
			      //       field: 'new_password',
			      //       message: 'The password and its confirm are not the same'
			      //     }
			      //   }
			      // },
			      name:{
			      	validators: {
			      		notEmpty:{
			      			message: 'Name is required and cannot be empty.'
			      		},
		      		    regexp: {
		      		      regexp: /^[a-zA-Z0-9\-]+$/,
		      		      message: 'Name can only consist of alpha	betical and hyphen'
		      		    },
			      	}
			      },
			        email:{
			      	validators: {
			      		notEmpty:{
			      			message: 'email is required and cannot be empty.'
			      		},
		      		    // regexp: {
		      		    //   regexp: /^[a-zA-Z0-9\-]+$/,
		      		    //   message: 'email can only consist of alpha	betical and hyphen'
		      		    // },
			      	}
			      }


			}
		}).on('success.form.fv', function (e) {
			console.log(e);
			e.preventDefault();

			var $form = $(e.target);

			var _this = this;

			$.ajax({	
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $(this).serialize()
			}).done(function(response){
				if(response.success){
					$('table.table').DataTable().ajax.reload();
					$('#update-user').modal('hide');
					new PNotify({
						type: 'success',
						text: response.message
					});




					$form
					  .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
					  .formValidation('resetForm', true);

					// $('#bs-example-modal-sm').modal('hide');
				}
			});



			});



		$('table.table').DataTable({
			destroy: true,
			processing: true,
			serverSide: true,
			language: {
				infoFiltered: '',
					processing: '<img src="{{ asset('img/ajax-loader.gif') }}">'
			},
			ajax: '{{ route('user.datatable') }}',
			columns:
			[
				{data: 'name', name: 'name'},
				{data: 'username', name: 'username'},
				{data: 'email', name: 'email'},
				{data: 'date', name: 'date'},
				{data: 'action', name: 'action'},
				
			]
				
		});
	});


	function editUser(id) {
		$.ajax({
			url: '{{ url('user/user_info') }}',
			data: {id : id},
			// dataType: 'json'
		}).done(function(response){
			console.log(response);
			$('input[name=name]').val(response.name);
			$('input[name=email]').val(response.email);
			$('input[name=username]').val(response.username);
			$('input[name=id]').val(response.id);

		});


	}

	function deleteUser(obj) {

		var user_id = $(obj).data('id');

		if(!$(obj).attr('disabled')){
			bootbox.confirm({
				message: '<i class="fa fa-question"></i> Are you sure you want to remove this user?',
				buttons: {
					cancel: {
						label: '<i class="fa fa-ban"></i> Cancel',
						className: 'btn btn-sm btn-default'
					},
					confirm:{
						label: '<i class="fa fa-check"></i> Confirm',
						className: 'btn btn-success btn-sm'
					}
				},
				callback: function(result){
				   if(result){
					   	$.ajax({
					   		url: '{{ url('user/delete') }}',
					   		type: 'post',
					   		data: {id : user_id},
					   		dataType: 'JSON',
					   		beforeSend: function(xhr){
					   			$(".overlay").LoadingOverlay("show", {
					   		  		image: "",
					   		  		fontawesome: "fa fa-circle-o-notch fa-spin fa-4x spin"
					   			});
					   		}
					   	}).done(function (response) {
					   		 
					   		if (response.success) {
					   			$('table.table').DataTable().ajax.reload();
					   				new PNotify({
					   				type: 'success',
					   				delay: 3000,
					   				title: 'Success!',
					   				text: response.message,
					   				after_close: function(notice, timer_hide) {}
					   			});
					   		}		
					   	});
				   }

				}
			});
		}

			
		
	}
</script>
@endsection
