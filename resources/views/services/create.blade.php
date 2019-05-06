@extends('layouts.app')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/select2/select2.css')}}"/>
@endsection
@section('content')
	<div class="row overlay">
		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i>
						<span class="caption-subject bold uppercase"> New Service</span>
					</div>
					<div class="actions">
						<a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen" data-original-title="" title=""></a>
					</div>
				</div>
				<section class="portlet-body" style="padding: 0 7px 0 7px;">

					<form role="form" enctype="multipart/form-data" id="submit_form" action="{{route('service.store')}}" method="post" class="form-horizontal">
						@csrf
						<section class="row">
							<div class="col-md-5 col-sm-5 col-xs-12">
								<section class="form-body">
									<div class="form-group">
										<div class="col-sm-12 col-xs-12">
											{{-- <select name="search" id="search" class="form-control"></select> --}}
											{{-- <select name="search" id="search" class="form-control"></select> --}}
											{{-- <input type="hidden"  id="search" name="search"  class="form-control"> --}}
										</div>
									</div>
									<h4 class="form-section">Customer Information</h4>
									<div class="form-group">
										<label class="control-label col-md-3">Name  <span class="required">*</span></label>
										<div class="col-md-9">
											<input autocomplete="off" name="customer_name" type="text" class="form-control input-sm" id="customer-name">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Mobile <span class="required">*</span></label>
										<div class="col-md-9">
											<input autocomplete="off" name="customer_mobile" type="text" class="form-control input-sm" id="mobile">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Phone</label>
										<div class="col-md-9">
											<input autocomplete="off" name="customer_phone" type="text" class="form-control input-sm">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Email</label>
										<div class="col-md-9">
											<input autocomplete="off" name="customer_email" type="text" class="form-control input-sm" id="email">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Address</label>
										<div class="col-md-9">
											<textarea autocomplete="off" name="customer_address" id="address" class="form-control" rows="3"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"></label>
										<div class="col-md-9">
											<div class="md-checkbox-list">
												<div class="md-checkbox">
													<input name="delivery" type="checkbox" value="1" class="md-check" id="delivery">
													<label for="delivery">
														<span class="inc"></span>
														<span class="check"></span>
														<span class="box"></span>
														Delivery item?
													</label>
												</div>
											</div>
										</div>
									</div>
									<section class="row" id="delivery-container">
										<div class="form-group">
											<label class="control-label col-md-3">Delivery Date</label>
											<div class="col-md-9">
												<input autocomplete="off" name="delivery_date" value="{{date('Y-m-d')}}" id="delivery-date" type="date" class="form-control input-sm">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Delivery Address</label>
											<div class="col-md-9">
												<textarea class="form-control input-sm" autocomplete="off" name="delivery_address" id="delivery-address" rows="3" placeholder="leave empty if delivery address is the same above"></textarea>
											</div>
										</div>
									</section>
								</section>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-12" style="border-left: 1px solid #ddd;">
								<section class="form-body" style="padding: 2%">
									<h4 class="form-section">Service Information</h4>
									<div class="form-group">
										<label class="control-label col-md-3">Item/Brand</label>
										<div class="col-md-9">
											<select name="brand" id="item" class="form-control input-sm">
												<option value="apple">Apple</option>
												<option value="acer">Acer</option>
												<option value="asus">Asus</option>
												<option value="dell">Dell</option>
												<option value="hp">HP</option>
												<option value="Macbook Pro">Macbook Pro</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Model</label>
										<div class="col-md-9">
											<input autocomplete="off" name="model" type="text" class="form-control input-sm" id="model">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">S/N  <span class="required">*</span></label>
										<div class="col-md-9">
											<input autocomplete="off" name="serial" type="text" class="form-control input-sm" id="serial">
										</div>
									</div>
									<div role="tabpanel" style="margin-top: 5%;">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 5%">
											<li role="presentation" class="active">
												<a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <span class="fa fa-tasks "></span> Preliminary Inspection </a>
											</li>
											<li role="presentation">
												<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab"><span class="fa fa-database"></span>  Data Recovery</a>
											</li>
											<li role="tabrecovery">
												<a href="#tab-accessories" aria-controls="tab" role="tab" data-toggle="tab"><span class="fa fa-file"></span> Accessories Received</a>
											</li>
										</ul>
									
										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="home">
												
												<div class="form-group">
													<label class="control-label col-md-3">Service Type</label>
													<div class="col-md-9">
														<select name="service_type" class="form-control input-sm">
															<option value="laptop"> Laptop</option>
															<option value="monitor"> LCD Monitor/SMPS</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="laptop-container" class="control-label col-md-3"></label>
													<div class="col-md-9">
														<section class="row" id="laptop-container">
															<div class="col-md-6 col-sm-6 col-xs-12">

																<div class="md-checkbox-list" >
																	<div class="md-checkbox">
																		<input name="laptop_broken_lcd" type="checkbox" value="1" id="broken-lcd" class="md-check">
																		<label for="broken-lcd">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Broken LCD
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input name="laptop_display_flickering" id="dim-display-flickering" type="checkbox" value="1" class="md-check">
																		<label for="dim-display-flickering">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Dim display Flickering
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input name="laptop_casing_broken" type="checkbox" id="casing-broken" value="1" class="md-check">
																		<label for="casing-broken">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Casing broken
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input id="defective-loose-hinges" name="laptop_loose_hinges" type="checkbox" value="1" class="md-check">
																		<label for="defective-loose-hinges">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Defective/loose hinges
																		</label>
																	</div>
																</div>

															</div>
															<div class="col-md-6 col-sm-6 col-xs-12">
																<div class="md-checkbox-list">


																	<div class="md-checkbox">
																		<input name="laptop_missing_keys" type="checkbox" value="1" id="missing-keys-caps" class="md-check">
																		<label for="missing-keys-caps">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Missing keys/caps etc.
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input name="laptop_broken_sockets" type="checkbox" value="1" id="broken-ports-sockets" class="md-check">
																		<label for="broken-ports-sockets">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Broken ports/sockets
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input name="laptop_hdd_defective" type="checkbox" value="1" id="making-noise-defective" class="md-check">
																		<label for="making-noise-defective">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			HDD making noise/Defective
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input name="laptop_optical_drive_damage" type="checkbox" value="1" id="optical-drive-physical-damage"
																					 class="md-check">
																		<label for="optical-drive-physical-damage">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Optical Drive physical damage
																		</label>
																	</div>
																</div>
															</div>
														</section>
														<section class="row" id="monitor-container">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="md-checkbox-list">

																	<div class="md-checkbox">
																		<input name="lcd_scratches" type="checkbox" value="1" id="lcd_scratches" class="md-check">
																		<label for="lcd_scratches">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Scratches/Marks/Lines in LCD
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input name="lcd_display_flickering" type="checkbox" value="1" id="lcd_display_flickering" class="md-check">
																		<label for="lcd_display_flickering">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Dim Display / Flickering
																		</label>
																	</div>

																	<div class="md-checkbox">
																		<input name="lcd_casing_broken" type="checkbox" value="1" id="lcd_casing_broken" class="md-check">
																		<label for="lcd_casing_broken">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span>
																			Casing broken
																		</label>
																	</div>

																</div>
															</div>
														</section>
													</div>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane" id="tab">
											
												<div class="form-group">
													<label for="hdd" class="form-label col-md-3">Internal/External HDD</label>
													<div class="col-md-9">
														<div class="md-checkbox-inline" style="border: 1px solid #ddd; padding: 5px;">
															<div class="md-checkbox">
																<input name="internal_18" type="checkbox" id="checkbox3" value="1" class="md-check">
																<label for="checkbox3">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	1.8 </label>
															</div>
															<div class="md-checkbox">
																<input name="internal_25" type="checkbox" id="checkbox1" value="1" class="md-check">
																<label for="checkbox1">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	2.5
																</label>
															</div>
															<div class="md-checkbox">
																<input name="internal_35" type="checkbox" id="checkbox2" value="1" class="md-check">
																<label for="checkbox2">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	3.5 </label>
															</div>
														
															<div class="md-checkbox">
																<input type="checkbox" name="recovery_laptop" value="1" id="recovery_laptop" class="md-check">
																<label for="recovery_laptop">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Laptop </label>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label for="server" class="control-label col-md-3">Server</label>
													<div class="col-md-9">
														<div class="md-checkbox-inline" style="border: 1px solid #ddd; padding: 5px;">
															<div class="md-checkbox">
																<input name="recovery_sas" type="checkbox" id="checkbox6" value="1" class="md-check">
																<label for="checkbox6">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	SAS </label>
															</div>
															<div class="md-checkbox">
																<input name="recovery_nas" type="checkbox" id="recovery_nas" value="1" class="md-check">
																<label for="recovery_nas">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	NAS </label>
															</div>
															<div class="md-checkbox">
																<input name="recovery_scsi" type="checkbox" id="checkbox4" value="1" class="md-check">
																<label for="checkbox4">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	SCSI
																</label>
															</div>

															<div class="md-checkbox">
																<input name="recovery_sata" type="checkbox" id="recovery_sata" value="1" class="md-check">
																<label for="recovery_sata">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	SATA
																</label>
															</div>
												
															
														</div>
													</div>
												</div>

												<div class="form-group">
													<label for="memory" class="control-label col-md-3 col-sm-3">Memory Card</label>
													<div class="col-sm-9 col-md-9">
														
														<div class="md-checkbox-inline" style="border: 1px solid #ddd; padding: 5px;">
															<div class="md-checkbox">
																<input name="recovery_ssd" type="checkbox" value="1" id="checkbox8" class="md-check">
																<label for="checkbox8">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	SSD
																</label>
															</div>
															<div class="md-checkbox">
																<input name="recovery_flash" value="1" type="checkbox" id="checkbox9" class="md-check">
																<label for="checkbox9">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Flashdrive
																</label>
															</div>
															<div class="md-checkbox">
																<input name="recovery_mobile" value="1" type="checkbox" id="checkbox10" class="md-check">
																<label for="checkbox10">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Mobile Phone
																</label>
															</div>
															<div class="md-checkbox">
																<input name="recovery_tablet" value="1" type="checkbox" id="checkbox11" class="md-check">
																<label for="checkbox11">
																	<span></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Tablet PC
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab-accessories">
												<div class="form-group">
													<label for="accessories" class="control-label col-md-3"></label>
													<div class="col-md-9">
														<section class="row">
															<div class="col-md-6 col-sm-6 col-xs-12">
																
															</div>
															<div class="col-md-6 col-sm-6 col-xs-12"></div>
														</section>
														<div class="md-checkbox-list">
															<div class="md-checkbox">
																<input name="accessories_power_cord" type="checkbox"
																			 value="1" id="accessories_power_cord"
																			 class="md-check">
																<label for="accessories_power_cord">
																	<span class="inc"></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Power adapter /Cord
																</label>
															</div>
															<div class="md-checkbox">
																<input name="accessories_battery" type="checkbox" value="1"
																			 id="accessories_battery" class="md-check">
																<label for="accessories_battery">
																	<span class="inc"></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Battery
																</label>
															</div>
															<div class="md-checkbox">
																<input name="accessories_pcmcia" type="checkbox" value="1"
																			 id="accessories_pcmcia" class="md-check">
																<label for="accessories_pcmcia">
																	<span class="inc"></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	PCMCIA card / Carry case
																</label>
															</div>
															<div class="md-checkbox">
																<input name="accessories_optical_drive" type="checkbox"
																			 value="1" id="accessories_optical_drive"
																			 class="md-check">
																<label for="accessories_optical_drive">
																	<span class="inc"></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Optical drive
																</label>
															</div>
															<div class="form-group">
																<label class="control-label col-md-2">others</label>
																<div class="col-md-10">
																	<input autocomplete="off" name="accessories_others" type="text" class="form-control input-sm" id="accessories_others">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>	
									<div class="form-group">
										<label class="control-label col-md-3">  Problem Reported by customer</label>
										<div class="col-md-9">
											<textarea autocomplete="off" name="problem_reported" class="form-control input-sm" rows="2"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Remarks</label>
										<div class="col-md-9">
											<textarea autocomplete="off" name="remarks" class="form-control input-sm" rows="2"></textarea>
										</div>
									</div>
									<section class="row">
										<div class="col-md-12">
											<div id="image_container" class="img-responsive"></div>
										</div>
									</section>
									<section class="row">
										<div class="col-md-3"></div>
										<div class="col-md-9 col-sm-9 col-xs-12" style="margin-top: 2%; margin-bottom: 1%;">

											<button onclick="$('#file').trigger('click')" id="btnChooseImage" type="button" class="btn btn-default btn-sm btn-dashed-border">
												<i class="fa fa-image"></i>
												Add Image
											</button>
											<input  accept="image/*"  capture="camera" onchange="readURL(this);" class="hide" type="file" multiple name="images[]" id="file" style="width: 100%;"/>
											<button data-toggle="modal" data-target="#camera" type="button" class="btn btn-default btn-sm btn-dashed-border">
												<i class="fa fa-camera"></i>
											</button>
										</div>
									</section>
									<div class="form-group" style="margin-top: 2%;">
										<label class="control-label col-md-3"></label>
										<div class="col-md-9">
											<button type="button" class="btn btn-default btn-sm reset"><span class="fa fa-ban"></span> Cancel</button>
											<button type="submit" id="print" class="btn btn-sm green-seagreen button-submit"><i class="fa fa-print"></i> Save & Print
												
											</button>
										</div>
									</div>
								</section>
							</div>
						</section>

					</form>
				</section>
			</div>

		</div>
	</div>
	@include('services.capture-image-dialog')
@endsection
@section('script')

	<script type="text/javascript" src="{{asset('/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/jquery-validation/js/additional-methods.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/typeahead/typeahead.js')}}"></script>
	<script type="text/javascript" src="{{asset('/scripts/form-wizard.js')}}"></script>
	<script !src="">
		var images = [];
		$(document).ready(function () {

			var preload_data = [
			  { id: 'user0', text: 'Disabled User', locked: true}
			  , { id: 'user1', text: 'Jane Doe'}
			  , { id: 'user2', text: 'John Doe', locked: true }
			  , { id: 'user3', text: 'Robert Paulson', locked: true }
			  , { id: 'user5', text: 'Spongebob Squarepants'}
			  , { id: 'user6', text: 'Planet Bob' }
			  , { id: 'user7', text: 'Inigo Montoya' }
			];

			$('input[name=search]').select2({
				placeholder: 'Search for customer name',
				allowClear: true,
				openOnEnter: true,
				minimumInputLength: 3,

				ajax:{
					url: '{{ route('customer.search') }}',
					dataType: 'json',
					quietMillis: 250,

					data: function(term, page){
					
						return { q: term, page: page };
					},

					results: function(data, page){
							console.log(data);
						 var more = (page * 30) < data.total_count; 
						 return { results: data.items, more: more };
					}
				},


				query: function (query) {

					var data = {results: []};
					 query.callback(data);

					  // data.results.push(query);
					
	
					    // if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
					    //     data.results.push({id: this.id, text: this.text });
					    // }
			

				
				},
			

	



			});

	


			$('#serial').focusout(function(){
			
				$.ajax({
				url: '{{ url('service/serialexist') }}',
				type: 'get',
				dataType : 'json',
				data: {serial : $(this).val()}
				}).done(function(response){
					if(response.exist == 1){
						new PNotify({
						type: 'info',
						text: response.message
					})	
					}
				;
				});
			});


			$('button.reset').click(function () {
				serviceType();

				$('#delivery-container').hide();


			});

			$('#submit_form').formValidation({
				message: 'This value is not valid',
				live: 'disabled',
				icon: {
					validating: 'fa fa-refresh fa-spin'
				},
				fields: {
					customer_name: {
						validators: {
							notEmpty: {
								message: 'The name is required and cannot be empty'
							},
							stringLength: {
								min: 3,
								message: 'The name must be more than 3 characters long'
							},
							regexp: {
								regexp: /^[a-zA-Z\s]+$/,
								message: 'The name can only consist of letter and spaces'
							}
						}
					},

					customer_mobile: {
						validators: {
							notEmpty: {
								message: 'mobile number is required and cannot be empty'
							},
							stringLength: {
								min: 3,
								message: 'mobile number must be more than 3 characters long'
							}
						}
					},

					serial: {
						validators: {
							notEmpty: {
								message: 'serial number is required and cannot be empty'
							},
							stringLength: {
								min: 3,
								message: 'serial number must be more than 3 characters long'
							}
						}
					}

				}
			}).on('success.form.fv', function (e) {
				e.preventDefault();
				var $form = $(e.target);

				var self = this;



				bootbox.confirm({
					message: '<i class="fa fa-info"></i> Please confirm that the information are correct. You can no longer modify the details after you confirm. Are you sure you want to save and print the service ?',
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
						   		url: $(self).attr('action'),
						   		type: $(self).attr('method'),
						   		data: $(self).serialize() + '&' + $.param({images: images}),
						   		dataType: 'JSON',
						   		beforeSend: function(xhr){
						   			$(".overlay").LoadingOverlay("show", {
						   		  		image: "",
						   		  		fontawesome: "fa fa-circle-o-notch fa-spin fa-4x spin"
						   			});
						   		}
						   	}).done(function (response) {
						   		 
						   		if (response.success) {
						   				new PNotify({
						   				type: 'success',
						   				delay: 3000,
						   				title: 'Success!',
						   				text: response.message,
						   				after_close: function(notice, timer_hide) {
						   					 window.open('{{route('service.printoncreate')}}');
									   		 location.replace('{{route('service.index')}}');
						   				}
						   			});
						   		}


						   		
						   	});


					
					   }

					}

				});

				


			}).on('err.form.fv', function (e) {
			});

			$('#delivery-container').hide();

			$('input[name="delivery"]#delivery').change(function () {
				if ($(this).prop('checked')) {
					$('#delivery-container').show();
				} else {
					$('#delivery-container').hide();
				}
			});


			var video = document.querySelector("#video");
			serviceType();
			startCamera();
			stopCamera();
			deleteImage();


			//take image
			document.getElementById("capture").addEventListener("click", function () {
				var canvas = document.createElement('canvas');
				canvas.width = 640;
				canvas.height = 480;

				var context = canvas.getContext('2d');
				context.drawImage(video, 0, 0, 640, 480);
				var url = canvas.toDataURL();

				images.push(url);
				showImages();

			});


		});

		function serviceType() {

			// $('#laptop-container').hide();
			$('#monitor-container').hide();
			$('#recovery-container').hide();

			// var service_type_selected = $('input[name=service_type]').val();

			// if(service_type_selected == 'laptop'){
			// 	$('#laptop-container').show();
			// }

			$('select[name="service_type"]').change(function () {

				$('#laptop-container').hide();
				$('#monitor-container').hide();
				$('#recovery-container').hide();

				var selected = $(this).val();

				switch (selected) {
					case 'laptop':
						$('#monitor-container').find('input[type=checkbox]:checked').removeAttr('checked');
						$('#laptop-container').show();
						break;
					case 'monitor':
						$('#laptop-container').find('input[type=checkbox]:checked').removeAttr('checked');
						$('#monitor-container').show();
						break;
					case 'recovery':
						$('#recovery-container').show();
						break;
					default:
						
						
						break;
				}
			});
		}

		function deleteImage() {
			$('#image_container').on('click', '.delete-image', function () {
				var index = $(this).data('imageid');
				images.splice(index, 1);
				showImages();
			});
		}

		// Grab elements, create settings, etc.
		function readURL(input) {
			if (input.files && input.files[0]) {

				for (var i = 0; i < input.files.length; i++) {
					var reader = new FileReader();
					reader.readAsDataURL(input.files[i]);

					reader.onload = function (e) {
						var url = e.target.result

						images.push(url);
						showImages();
					};
				}
			}
		}

		function showImages() {
			$('#image_container').html('');

			if (images.length <= 0) {
				return false;
			}
			for (var i = 0; i < images.length; i++) {
				var img = "<div class='pickup_image' style='display: inline-block'>\
                                <img style='width: 100px; margin-top: 5%;' src='" + images[i] + "' class='img-responsive img-thumbnail'/>\
                                <a href='javascript:;' class='text-danger delete-image' data-imageid='" + i + "'><i class='fa fa-minus-circle'></i></a>\
                              </div>";
				$('#image_container').append(img);
			}
		}

		function startCamera() {
			$('#camera').on('shown.bs.modal', function (e) {
				if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
					navigator.mediaDevices.getUserMedia({video: true}).then(function (stream) {
						localstream = stream;
						video.srcObject = stream;
						video.play();
					});
				}
			});
		}

		function stopCamera() {
			$('#camera').on('hidden.bs.modal', function (e) {
				video.pause();
				video.src = "";
				localstream.getTracks()[0].stop();
			});
		}
	</script>
@endsection