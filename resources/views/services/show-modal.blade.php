<div class="modal" id="show-service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Service detail</h4>
				<section class="row">
					<div class="col-sm-9"></div>
					<div class="col-sm-3s">Date: <span id="date"></span>
					</div>
				</section>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-4">
						<h4>Customer details:</h4>
						<address>
							Name : <span id="c-name"></span><br>
							Email: <a href="mailto:#" id="c-email"></a><br>
							Address: <span id="c-address"></span><br>
							<span class="fa fa-phone"></span> <abbr title="Phone"></abbr> <span id="phone"></span><br>
							<span class="fa fa-mobile"></span><abbr title="mobile"></abbr> <span id="mobile"></span>
						</address>
					</div>
					<div class="col-sm-4">
						<h4>Service information</h4>
						<h5 id="service-brand"></h5>

							<ul class="list-unstyled">
								<li>Serial Number : <span id="modal-service-serial"></span></li>
								<li>Model No. :<span id="service-model"></span></li>
								<li>Reference No. :<span id="ref"></span></li>
							</ul>

					</div>
					<div class="col-sm-3">
						<div class="text-center">
							{!! QrCode::size(100)->generate('crm.nrsinfoways.com/service/27/upload_form'); !!}
							<p>scan to upload images</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<table class="table table-hover">
							<thead>
							<tr>
								<th>Preliminary Inspection</th>
								<th>Accessories Received</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<ul id="pre-inspection"></ul>
								</td>
								<td>
									<ul id="modal-accessories-received"></ul>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<h5>Problem Presented</h5>
									<p id="problem"></p>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<h5>Remarks</h5>
									<p id="remarks-show"></p>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<section class="row" >
					<div class="col-md-12">
						<h5>Image(s) uploaded</h5>
						<section class="row"  id="services-images-container"></section>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
