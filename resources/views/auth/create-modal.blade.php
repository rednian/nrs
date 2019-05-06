
<div class="modal fade" id="create-user-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form action="{{ route('register') }}" id="frm-register" method="post">
					@csrf
				<div class="portlet light">
				    <div class="portlet-title">
				        <div class="caption">
				            <i class="fa fa-user-plus"></i>
				            <span class="caption-subject bold uppercase"> NEW USER</span>
				        </div>
				    </div>
				    <section class="portlet-body" style="padding: 0 7px 0 7px;">
				    		<div class="form-group">
				    			<label for="">Name <span class="required">*</span></label>
				    			<input type="text" name="name" autocomplete="off" class="form-control input-sm">
				    		</div>
				    		<div class="form-group">
				    			<label for="">Email</label>
				    			<input type="text" name="email" autocomplete="off" class="form-control input-sm">
				    		</div>
				    		<div class="form-group">
				    			<label for="">Username <span class="required">*</span></label>
				    			<input type="text" name="username" autocomplete="off" class="form-control input-sm">
				    		</div>
				    		<div class="form-group">
				    			<label for="">Password <span class="required">*</span></label>
				    			<input type="password" name="password" autocomplete="off" class="form-control input-sm">
				    		</div>
				    		<div class="form-group">
				    			<label for="">Confirm Password <span class="required">*</span></label>
				    			<input type="password" name="confirm_password" autocomplete="off" class="form-control input-sm">
				    		</div>
				    	
				    </section>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success btn-sm">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>