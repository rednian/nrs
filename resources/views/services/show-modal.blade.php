<div class="modal" id="show-service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Service detail</h4>
			</div>
			<div class="modal-body">
				<section class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="text-center" id="qrcode-container"></div>
						<div class="clearfix"></div>
						<h5><strong>Received Date: <span id="date"></span></strong></h5>
						<section class="row">
							<div class="col-sm-12">

								<table class="table-condensed table">
									<tr>
										<td class="col-sm-4">Item/Brand</td>
										<td><span id="service-modal-brand"></span></td>
									</tr>
									<tr>
										<td>Serial No.</td>
										<td><span id="modal-service-serial"></span></td>
									</tr>
									<tr>
										<td>Model No.</td>
										<td><span id="service-model"></span></td>
									</tr>
									<tr>
										<td>Receipt No.</td>
										<td><code id="ref"></code></td>
									</tr>
									<tr>
										<td>Status</td>
										<td><span id="status-service"></span></td>
									</tr>
									<tr>
										<td colspan="2"><h5>Reason: </h5> <p id="reason"></p></td>
									</tr>
								</table>
							
								
							</div>
						</section>

					</div>
					<div class="col-md-8 col-sm-8 col-xs-12">
						
						<section class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<h4>Customer details:</h4>
								<h5>Name : <span id="c-name"></span></h5>
								<address>
									Email: <a href="mailto:#" id="c-email"></a><br>
									Address: <span id="c-address"></span><br>
									<span class="fa fa-phone"></span> <abbr title="Phone"></abbr> <span id="phone"></span><br>
									<span class="fa fa-mobile"></span><abbr title="mobile"></abbr> <span id="mobile"></span>
								</address>
							</div>
						</section>
						<hr>
						<section class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<a style="margin-left: 2%;" href="" id="modal-detail" target="_blank" class="btn btn-default btn-sm pull-left"> <span class="fa fa-print"> </span> Service Report</a>
								<a href="#" id="modal-delivery" target="_blank" class="modal-print btn btn-default btn-sm pull-left"><span class="fa fa-print"></span> Delivery Form</a>
								<a id="modal-print" href="" target="_blank" class="btn modal-print btn-default btn-sm pull-left"><span class="fa fa-print"></span> SA Form</a>
							</div>
						</section>
						<section class="row" style="margin-top: 1%;">
							<div class="col-md-12" >
								<section class="panel panel-default">
									<section class="panel-heading">
										<a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="btn btn-default btn-sm pull-left"><span class="fa fa-upload"></span> upload SA/DF</a>
										{{-- <h2 class="panel-title" style="margin-top: 1%;"> Upload files or notes</h2> --}}
										
									{{-- 	<div class="btn-group  pull-right">
										  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    Action <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu">
										  	<li></li>
								 
										  </ul>
										</div> --}}
										<div class="clearfix"></div>
									</section>
									<section class="panel-body collapse" id="collapseExample">
										<h4>Upload Files/Notes</h4>
										<form id="fileupload" action="{{ route('service.upload_file') }}" method="post" enctype="multipart/form-data">
											@csrf
											<input type="hidden" name="service_id"  class="service_id">
											<input type="hidden" name="upload_type" value="file">
											<section class="row">
												<div class="col-sm-4 col-md-4 col-xs-12">
													<div class="form-group">
														<select name="upload_type" id="" required class="form-control input-sm">
															<option selected disabled>select upload type</option>
															<option value="file">service file</option>
															<option value="note">service note</option>
														</select>
													</div>
												</div>
												<div class="col-sm-6 col-md-6 col-xs-12">
													<div class="form-group">
														<input type="file" name="files[]" class="form-control input-sm" multiple>
													</div>
												</div>
												<div class="col-sm-2 col-md-2 col-xs-12">
													<div class="form-group">
														<button type="submit" class="btn btn-sm btn-success"><span class="fa fa-upload"></span> upload</button>
													</div>
												</div>
											</section>
										
										</form>
									</section>
								</section>
							</div>
						</section>
						<section class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div role="tabpanel">
									<!-- Nav tabs -->
									

									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation"	 class="active">
											<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Details</a>
										</li>
										<li role="presentation">
											<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab"> <span class="fa fa-image"></span> Images</a>
										</li>
										<li role="presentation">
											<a href="#files" aria-controls="files" role="tab" data-toggle="tab"> <span class="fa fa-file"></span>Files</a>
										</li>
										<li role="presentation">
											<a href="#notes" aria-controls="notes" role="tab" data-toggle="tab"> <span class="fa fa-file-text"></span> Delivery Notes</a>
										</li>
									</ul>
								
									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="home">
											<table class="table table-bordered table-condensed">
												<thead>
												<tr>
													<th>Preliminary Inspection</th>
													<th>Data Recovery</th>
													<th>Accessories Received</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td>
														<ol id="pre-inspection"></ol>
													</td>
													<td>
														<ul id="data-recovery"></ul>
													</td>
													<td>
														<ol id="modal-accessories-received"></ol>
													</td>
												</tr>
												<tr>
													<td colspan="3">
														<h5>Problem Presented</h5>
														<p id="problem"></p>
													</td>
												</tr>
												<tr>
													<td colspan="3">
														<h5>Remarks</h5>
														<p id="remarks-show"></p>
													</td>
												</tr>
												</tbody>
											</table>
										</div>
										<div role="tabpanel" class="tab-pane" id="tab">
											<div class="w3-content">
												<section id="images-container"></section>
											  	<div class="row" id="slider-container" style="margin-top: 2%;">
											  </div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="files">
									
											<section class="row">
												<div class="col-md-12">
													<section >
														<h4>Uploaded files</h4>
														<ul class="list-unstyled" id="file-container">
															
														</ul>
													</section>
												</div>
											</section>
										</div>
										<div role="tabpanel" class="tab-pane" id="notes">
										{{-- 	<form action="{{ route('service.upload_file') }}" id="frm-upload-note" method="post" enctype="multipart/form-data">
												@csrf
												<input type="hidden" name="service_id" class="service_id">
												<input type="hidden" name="upload_type" value="note">
												<div class="form-group">
													<label for="">Upload Notes</label>
													<input type="file" class="form-control input-sm" name="notes[]">
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-success btn-sm"><span class="fa fa-upload"></span> upload notes</button>
												</div>

											</form> --}}
											<h4>Uploaded Notes</h4>
											<ul class="list-unstyled" id="notes-container">
												
											</ul>
										</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</section>
		
			</div>
		</div>
	</div>
</div>
