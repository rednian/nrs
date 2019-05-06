<div class="modal fade " id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    	<section class="modal-header">
    		<h4 class="modal-title">Change Password</h4>
    	</section>
    	<section class="modal-body">
    		<form action="{{ route('user.password') }}" id="frm-change-password" method="post">
    			@csrf
    			<div class="form-group">
    				<label for="">Current Password</label>
    				<input autocomplete="off" type="password" name="current_password" class="form-control input-sm">
    			</div>
    			<div class="form-group">
    				<label for="">New Password</label>
    				<input type="password" class="form-control input-sm" name="new_password">
    			</div>
    			<div class="form-group">
    				<label for="">Confirm Password</label>
    				<input type="password" class="form-control input-sm" name="confirm_password">
    			</div>
    			<div class="form-group">
    				<button type="submit" class="btn btn-sm btn-success">Save Password</button>
    				<button data-dismiss="modal" class="btn btn-sm btn-default">close</button>
    			</div>
    		</form>
    	</section>
    </div>
  </div>
</div>