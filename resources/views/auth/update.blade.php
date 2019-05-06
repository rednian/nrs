
<div class="modal fade" id="update-user">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form action="{{ route('user.update') }}" method="post" id="frm-user-update">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Update User Information</h4>
			</div>
			<div class="modal-body">
				<section class="row">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							@csrf
							<label for="">Name</label>
							<input type="hidden" name="id">
							<input type="text" name="name" class="form-control input-sm" autocomplete="off" autofocus>
						</div>
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="username" readonly class="form-control input-sm" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" name="email" class="form-control input-sm" autocomplete="off" >
						</div>

					</div>
				</section>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				<button type="submmit" class="btn btn-success btn-sm">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>