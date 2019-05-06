


<div class="modal fade" id="service-status-show">

	<div class="modal-dialog modal-sm">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<h4 class="modal-title">Update Service Status </h4>
				<div class="alert alert-info">
					<span class="fa fa-info"></span> Change the service status to <strong>closed-returned</strong> or <strong>close-accomplished</strong> to print the <strong>Delivery Form</strong>
				</div>

			</div>

			<div class="modal-body">

				<form action="{{ route('service.status') }}" method="post" id="frm-status">

					@csrf

					<input type="hidden" name="service_id" id="service_id">

					<div class="form-group">

						<label for="">Service Status</label>

						<select name="service_status" id="service-status" class="form-control">

						
						</select>

					</div>

					<div class="form-group">

						<label for="">Reason</label>

						<textarea name="service_status_reason" class="form-control" id="" rows="2"></textarea>

					</div>

					<div class="form-group">

						<button class="btn btn-default btn-sm"  data-dismiss="modal">close</button>

						<button class="btn btn-success btn-sm">save changes</button>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>