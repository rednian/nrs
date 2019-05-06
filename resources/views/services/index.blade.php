@extends('layouts.app')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
	{{--	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/>--}}
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-toggle/toggle-button.min.css')}}"/>

	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-editable/css/bootstrap-editable.css')}}"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />

	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/slider.css')}}"/>
	<style>
		.table tr:hover{
			cursor: pointer;
		}
		.modal-dialog{
		    overflow-y: initial !important
		}
		.modal-body{
		    max-height: 550px;
		    overflow-y: auto;
		}
	</style>
@endsection
@section('content')
	<div class="row" id="service-app">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gears"></i>
						<span class="caption-subject bold uppercase"> Services</span>
					</div>
					<div class="actions">
						<a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen" data-original-title="" title=""></a>
					</div>
				</div>
				<section class="portlet-body" style="padding: 0 7px 0 7px;">
					<form action="#" method="get" role="form" id="form-filter">

						<section class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="form-group">
									<input autocomplete="off" type="text" name="customer_name" id="name" class="form-control input-sm select2"
												 placeholder="customer name">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="form-group">
									<input autocomplete="off" name="customer_email" type="email" class="form-control input-sm" placeholder="email">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="form-group">
									<input autocomplete="off" name="customer_mobile" type="text" class="form-control input-sm" placeholder="mobile">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<button type="submit" class="btn btn-sm blue-hoki">Apply Filters</button>
							</div>
						</section>


						<section class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="form-group">
									{{-- <input autocomplete="off" name="brand" type="text" class="form-control input-sm" placeholder="brand / item"> --}}
									<select name="brand" id="item" class="form-control input-sm">
										<option selected disabled>select item brand</option>
										<option value="all">All</option>
										<option value="apple">Apple</option>
										<option value="acer">Acer</option>
										<option value="asus">Asus</option>
										<option value="dell">Dell</option>
										<option value="hp">HP</option>
										<option value="Macbook Pro">Macbook Pro</option>
									</select>
								</div>

							</div>	
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="input-group" id="defaultrange">
									<input autocomplete="off" name="created_at" type="text" class="form-control input-sm">
									<span class="input-group-btn">
                            <button class="btn btn-sm default date-range-toggle" type="button"><i
																class="fa fa-calendar"></i></button>
                            </span>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="form-group">
									<select name="service_status" id="status" class="form-control input-sm">
										<option selected disabled>select status</option>
										<option value="all">All</option>
										<option value="New">New</option>
										<option value="In Progress">In Progress</option>
										<option value="Closed-Returned">Closed-Returned</option>
										<option value="Closed-Accomplished">Closed-Accomplished</option>
									</select>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="form-group">
									<button class="btn btn-sm btn-default reset">Clear</button>
								</div>
							</div>
						</section>
					</form>
					<section>
						<table class="table table-condensed table-hover flip-content" id="tblServices">
							<thead class="flip-content">
							<tr>
								<th></th>
								<th>Receipt. #</th>
								<th>Customer Name</th>
								<th>Mobile No.</th>
								<th>Brand/Item</th>
								<th>Remarks</th>
								<th>Date</th>
								<th>Status</th>
								<th></th>
							</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</section>	
				</section>
			</div>
		</div>
	</div>
	
@include('auth.create-modal')
@include('services.service-detail')
@include('services.show-modal')
@include('services.service-status-modal')
@include('services.update-status')
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/bootstrap-editable/js/bootstrap-editable.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

	<script type="text/javascript" src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" ></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
	
	<script type="text/javascript" src="{{ asset('/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('/scripts/ecommerce-products-edit.js') }}"></script>
	<script type="text/javascript" src="{{asset('/scripts/components-pickers.js')}}"></script>

	<script src="{{asset('/plugins/bootstrap-toggle/toggle-button.min.js')}}"></script>
	<script type="text/javascript">

		var service_data = {};
			$(document).ready(function () {

				$('a#modal-delivery.btn').click(function(e){
					

					var id = this.pathname.split('/');

					service_id = id[3];

					$.ajax({
						url: '{{ url('service/checkstatus') }}',
						data: {service_id: id[3]},
						async: false
					}).done(function(response){
						if(response.service_status == 'New' || response.service_status == 'new' || response.service_status == 'In Progress' || response.service_status == 'in progress'){
							e.preventDefault();

							service_data = response;

							$('#service-status-show').modal('show');
						}
					});

						
				});
					$('#service-status-show').on('hidden.bs.modal', function () {
							$('select[name=service_status#service-status]').html('');
							var html = [];
					});

				$('#service-status-show').on('shown.bs.modal', function () {

					$('select[name=service_status#service-status]').html('');

					$('input[name=service_id]#service_id').val(service_data.service_id);

						var html = [];
						var selected = 'selected';

						html.push('<option '+(service_data.service_status == 'New' ? selected : "" )+' value="New">New</option>');
						html.push('<option  '+(service_data.service_status == 'In Progress' ? selected : "" )+' value="In Progress">In Progress</option>');
						html.push('<option  '+ (service_data.service_status == 'Closed-Returned' ? selected : "" )+' value="Closed-Returned">Closed-Returned</option>');
						html.push('<option  '+ (service_data.service_status == 'Closed-Accomplished' ? selected : "" )+' value="Closed-Accomplished">Closed-Accomplished</option>');
						html.join('');

						$('select[name=service_status]#service-status').append(html);

						$('form#frm-status').submit(function(e){
							e.preventDefault();
							$.ajax({
								url: $(this).attr('action'),
								type: $(this).attr('method'),
								data: $(this).serialize(),
								dataType: 'json'
							}).done(function(response){

								if(response.success){
									$('#service-status-show').modal('hide');
									$('#show-service').modal('hide');
									if (response.data.service_status == 'Closed-Accomplished' || response.data.service_status == 'Closed-Returned') {
										window.open('{{ url('service/print') }}/'+response.data.service_id+'?type=delivery', '_blank');
									}
								
								$('#tblServices').DataTable().ajax.reload();

									// new PNotify({
									// 	type: 'success',
									// 	text: response.message,
									// 	history: false,
									// 	after_close: function(notice, timer_hide) {
											 	
									// 	}
									// });
							
								}
							});
						});

				});


	$('#tblServices tbody').on( 'click', 'tr', function () {

		if ( $(this).hasClass('selected') ) {
		   $(this).removeClass('selected');
		}
		else {
		   tblServices.$('tr.selected').removeClass('selected');
		   $(this).addClass('selected');
		}

	});

				

	jQuery('#tblServices').on('click','tbody tr', function (evt) {
	    var cell=$(evt.target).closest('td');

	    if( cell.index() <= 6 && cell.index() != 0){

	    	var data = $('#tblServices').DataTable().row('.selected').data();
	    	view(data.service_id);
	   }
	});


				$('#show-service').on('shown.bs.modal', function () {

					$('#frm-upload-note').submit(function(e){
						e.preventDefault();
						$.ajax({
							url: $(this).attr('action'),
							type: $(this).attr('method'),
							data: new FormData(this),
							processData: false,
							cache: false,
					        contentType: false,
						}).done(function(response){
							$('input').val('');
							new PNotify({
								type: 'success',
								text: 'File(s) Successfully uploaded'
							});
							location.reload();
						});
					});

					$('#fileupload').submit(function(e){
						e.preventDefault();
						$.ajax({
							url: $(this).attr('action'),
							type: $(this).attr('method'),
							data: new FormData(this),
							processData: false,
							cache: false,
					        contentType: false,
						}).done(function(response){
							$('input').val('');
							new PNotify({
								type: 'success',
								text: 'File(s) Successfully uploaded'
							});
							location.reload();
						});
					});


					$(".various").fancybox({
							maxWidth	: 800,
							maxHeight	: 600,
							fitToView	: false,
							width		: '70%',
							height		: '70%',
							autoSize	: false,
							closeClick	: false,
							openEffect	: 'none',
							closeEffect	: 'none'
						});


				});


					dateRange();

					var tblServices = $('#tblServices').DataTable({
						destroy: true,
						dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>" +
						"<'row'<'col-xs-12't>>" +
						"<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
						processing: true,
						serverSide: true,
						stateSave:  true,
						order: [0, 'desc'],
						ajax: {
							url: '{{ route('service.dataTable')}}',
							data: function (d) {

								d.customer_name = $('input[name=customer_name]').val();
								d.customer_email = $('input[name=customer_email]').val();
								d.customer_mobile = $('input[name=customer_mobile]').val();

								d.service_status = $('select#status').val();
								d.created_at = $('input[name=created_at]').val();
								d.brand = $('select[name=brand]').val();
							}
						},

						language: {
							infoFiltered: '',
							processing: '<img src="{{ asset('img/ajax-loader.gif') }}">'
						},
						columnDefs: [
							{
								targets: [7],
								className: 'text-right',
								sortable: false
							}
						],
						columns: [
							{
								render: function (data, type, full, meta) {

									var id = full.service_id;
									var url = '{{url('service')}}/'+id+'/qrcode';

									return '<a onclick="destroy(this)" data-serviceid ="'+full.service_id+'"  class="btn btn-outline btn-xs prevent text-danger btn-default"> Delete</a>';

								}
							},
							{data: 'receipt_no', name: 'receipt_no'},
							{data: 'customer_name', name: 'customer_name'},
							{data: 'customer_mobile', name: 'customer_mobile'},
							{data: 'brand', name: 'brand'},
							{data: 'remarks', name: 'remarks'},
							{data: 'created_at', name: 'created_at'},
							{
								render: function (data, type, full, meta) {
									return '<a  class="btn btn-link btn-sm " onclick="updateStatus(this)" data-status="'+full.service_status+'" data-serviceid ="'+full.service_id+'" data-toggle="modal" href="#service-status-modal">'+full.service_status+'</a>';
								}
							},
							{
								render: function (data, type, full, meta) {

									var id = full.service_id;
									var url = '{{url('service/print')}}/'+id;
									return '<a href="'+url+'" title="print service athorization form" target="_blank" data-serviceid ="'+full.service_id+'" class="btn btn-xs btn-default prevent">print S.A. form</a>';

								}
							}
						],
						fnCreatedRow: function (row, data, index) {

							// $('td', row).click(function(){
							// 	view(data.service_id);
							// });
						},
						initComplete: function (settings, json) {
							$('a.prevent').click(function(e){e.stopPropagation();});
						}
					});

			

					$('#form-filter').submit(function (e) {
						$('#tblServices').DataTable().ajax.reload();
						e.preventDefault();
					});

					$('#tblServices').wrap('<div class="table-responsive"></div>');

				});


				function view(el) {

					var service_id = el;
					// var service_id = $(el).data('serviceid');

					$('#pre-inspection').html('');
					$('#modal-accessories-received').html('');
					$('#services-images-container').html('');
					$('#slider-container').html('');
					$('#images-container').html('');
					 $('ul#data-recovery').html('');
					 $('#file-container').html('');
					 $('#notes-container').html('');


					$.ajax({
						url: '{{url('service')}}'+'/'+service_id,
						data: {service_id: service_id},
						dataType: 'json',
					}).done(function (response) {


						$('#show-service').modal('show');

						//service details
						$('#service-modal-brand').html(response.brand);
						$('#qrcode-container').html(response.qr_code);
						$('#ref').html(response.receipt_no);
						$('#modal-service-serial').html(response.serial);
						$('#service-model').html(response.model);
						$('#problem').html(response.problem_reported);
						$('#remarks-show').html(response.remarks);
						$('.service_id').val(response.service_id);
						$('#reason').html(response.service_status_reason);

						var print_url = '{{ url('service/print') }}/'+response.service_id;
						$('a#modal-print').attr('href',print_url+'?type=print');
						$('a#modal-delivery').attr('href',print_url+'?type=delivery');
						$('a#modal-detail').attr('href','{{url('service/detail')}}/'+response.service_id);

						// var status = (response.service_status === 'done') ? 'label-success' : 'label-warning';
						var status = null;
						switch(response.service_status) {
						  case 'New':
						  		status = 'label-default';
						    break;
						  case 'In Progress':
						    	status = 'label-info';
						    break;
						  case 'Closed-Returned':
						    status = 'label-warning';
						    break;
						  case 'Closed-Accomplished':
						    status = 'label-success';
						    break;
						} 

						
						$('#status-service').html('<span class="label '+status+'">'+response.service_status+'</span>');

						var date = new Date(response.created_at);
						var day = date.getDate();
						var month = date.getMonth();
						var year = date.getFullYear();
						var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
						$('#date').html(day+'-'+months[month]+'-'+year);


						var preliminary = response.laptop_broken_lcd == 1 ?  '<li>Broken LCD</li>' : '';
						   preliminary += response.laptop_display_flickering == 1 ?  '<li>Display Flickering</li>' : '';
						   preliminary += response.laptop_casing_broken == 1 ?  '<li>Casing Broken</li>' : '';
						   preliminary += response.laptop_loose_hinges == 1 ?  '<li>Loose Hinges</li>' : '';
						   preliminary += response.laptop_missing_keys == 1 ?  '<li>Missing Keys</li>' : '';
						   preliminary += response.laptop_broken_sockets == 1 ?  '<li>Broken sockets</li>' : '';
						   preliminary += response.laptop_hdd_defective == 1 ?  '<li>HDD Defective</li>' : '';
						   preliminary += response.laptop_optical_drive_damage == 1 ?  '<li>Optical drive damage</li>' : '';
						   preliminary += response.lcd_scratches == 1 ?  '<li>LCD scratches</li>' : '';
						   preliminary += response.lcd_display_flickering == 1 ?  '<li>Display flickering</li>' : '';
						   preliminary += response.lcd_casing_broken == 1 ?  '<li>Casing broken</li>' : '';
						   preliminary += response.lcd_casing_broken == 1 ?  '<li>Casing broken</li>' : '';
						   preliminary += response.recovery_hdd == 1 ?  '<li>Recovery HDD</li>' : '';

						   $('#pre-inspection').append(preliminary);
						   
						  var recovery = response.recovery_laptop == 1 ?  '<li>Recovery Laptop</li>' : '';
							   recovery += response.recovery_scsi == 1 ?  '<li>Recovery SCSI</li>' : '';
							   recovery += response.recovery_sata == 1 ?  '<li>Recovery SATA</li>' : '';
							   recovery += response.recovery_sas == 1 ?  '<li>Recovery SAS</li>' : '';
							   recovery += response.recovery_nas == 1 ?  '<li>Recovery NAS</li>' : '';
							   recovery += response.recovery_ssd == 1 ?  '<li>Recovery SSD</li>' : '';
							   recovery += response.recovery_flash == 1 ?  '<li>Recovery flash drive</li>' : '';
							   recovery += response.recovery_mobile == 1 ?  '<li>Recovery mobile</li>' : '';
							   recovery += response.recovery_tablet == 1 ?  '<li>Recovery tablet</li>' : '';
							   recovery += response.internal_18 == 1 ?  '<li> Internal/External HDD 1.8</li>' : '';
							   recovery += response.internal_25 == 1 ?  '<li> Internal/External HDD 2.5</li>' : '';
							   recovery += response.internal_35 == 1 ?  '<li> Internal/External HDD 3.5</li>' : '';

							   $('ul#data-recovery').append(recovery);

						   var acc_received = response.accessories_power_cord == 1 ? '<li>Power cord</li>': '';
					   		 acc_received += response.accessories_battery == 1 ? '<li>Battery</li>': '';
					   		 acc_received += response.accessories_pcmcia == 1 ? '<li>PCMCIA</li>': '';
					   		 acc_received += response.accessories_optical_drive == 1 ? '<li>Optical Drive</li>': '';
					   		 acc_received += response.accessories_toner_cartridge == 1 ? '<li>Toner cartridge</li>': '';
					   		 acc_received += response.accessories_ink_cartridge == 1 ? '<li>Ink cartridge</li>': '';
					   		 acc_received += response.accessories_data_cable == 1 ? '<li>Data cable</li>': '';

					   		 $('#modal-accessories-received').append(acc_received);


						//customer details
						$('#c-name').html(response.customer.customer_name);
						$('#phone').html(response.customer.customer_phone);
						$('#mobile').html(response.customer.customer_mobile);
						$('#c-address').html(response.customer.customer_address);
						$('#c-email').html(response.customer.customer_email);

						$('#c-email').attr('href','mailto:'+response.customer.customer_email);
						

						if(!$.isEmptyObject(response.files)){
							var icons = window.FileIcons; 
							$.each(response.files, function(index, file){

								var path = '{{asset('')}}'+file.file_path;

								var class_name = icons.getClassWithColor(file.filename);


								if(file.upload_type == 'file'){

									var html = [];
										html.push('<li><a href="'+path+'" data-fancybox fancybox-type="iframe" class="fancybox various" ><span class="'+class_name+'"></span> '+file.filename+'<a/></li>');
										html.join('');

										$('#file-container').append(html);
								}

								if(file.upload_type == 'note'){

									var html = [];
										html.push('<li><a href="'+path+'" title="'+file.filename+'" data-fancybox fancybox-type="iframe" class="fancybox various" ><span class="'+class_name+'"></span> '+file.filename+'<a/></li>');
										html.join('');

										$('#notes-container').append(html);
								}
							
							});
						}

						//display images
						if(!$.isEmptyObject(response.images)){
							var counter = 1;
							$.each(response.images, function (index, image) {

								var thumbnail_path = '{{asset('')}}'+image.thumbnail_path;
								var original_path = '{{asset('')}}'+image.upload_path;


								var style = counter == 1 ? ' ': 'display:none';

								 var html  = '<a href="'+original_path+'" data-type="image" data-type="ajax" data-fancybox>';
									 html += '<img  src="'+thumbnail_path+'" class="mySlides img img-responsive img-thumbnail center-block" style="max-height: 260px;'+style+'">';
									 html += '</a>';

									$('#images-container').append(html);

									//slider
									var slider 	= '<div class="col-sm-3" style="margin-bottom: 2%;">';
										slider += '<img style="max-height: 80px;" class=" img img-responsive w3-opacity w3-hover-opacity-off" src="'+thumbnail_path+'" style="width:100%;cursor:pointer" onclick="currentDiv('+counter+')">';
										slider += '</div>';
									$('#slider-container').append(slider);

								counter++;
								});
							}
							else{
								
								var html = '<img src="{{asset('img/default.png')}}" class=" img img-thumbnail img-responsive center-block" style="height: 250px;" />';
						

								$('#images-container').html(html);
							}

					});
				}

				function updateStatus(el) {

		

					$('#service-status-modal').on('shown.bs.modal', function () {
					

						$('select#service-status').html('');
						var service_id = $(el).data('serviceid');
						var service_status = $(el).data('status');
						var html = [];
						var selected = 'selected';

						$('input#service_id').val(service_id);


						html.push('<option '+(service_status == 'New' ? selected : "" )+' value="New">New</option>');
						html.push('<option  '+(service_status == 'In Progress' ? selected : "" )+' value="In Progress">In Progress</option>');
						html.push('<option  '+ (service_status == 'Closed-Returned' ? selected : "" )+' value="Closed-Returned">Closed-Returned</option>');
						html.push('<option  '+ (service_status == 'Closed-Accomplished' ? selected : "" )+' value="Closed-Accomplished">Closed-Accomplished</option>');
						html.join('');
							

						var data = ['pending', 'done', 'returned'];

						

						$('select#service-status').append(html);

						$('form#frm-status').submit(function(e){
							e.preventDefault();
							$.ajax({
								url: $(this).attr('action'),
								type: $(this).attr('method'),
								data: $(this).serialize(),
								dataType: 'json'
							}).done(function(response){

								if(response.success){
									$('#service-status-modal').modal('hide');
								
								$('#tblServices').DataTable().ajax.reload();

									// new PNotify({
									// 	type: 'success',
									// 	text: response.message,
									// 	history: false,
									// 	after_close: function(notice, timer_hide) {
											 	
									// 	}
									// });
							
								}
							});
						});
						});

				}


				function destroy(el) {
					var service_id = $(el).data('serviceid');


					bootbox.confirm({
						message: 'Are you sure you want to delete this service?',
						buttons: {
							cancel: {
								label: '<i class="fa fa-ban"></i> No',
								className: 'btn btn-sm btn-default'
							},
							confirm:{
								label: '<i class="fa fa-trash"></i> Yes',
								className: 'btn btn-danger btn-sm'
							}
						},
						callback: function(result){
						   if(result){
							  $.ajax({
							  	url: '{{url('service')}}/'+ service_id,
							  	data: {'_method':'DELETE' , service_id: service_id},
							  	type: 'post'
							  }).done(function (response) {
							  	new PNotify({
							  		type: 'success',
							  		text: 'Service Successfully deleted.'
							  	});
							  	$('#tblServices').DataTable().ajax.reload();
							  });
						   }
						}

					});

				

				}

				function dateRange() {
					$('input[name="created_at"]').daterangepicker({
						autoUpdateInput: false,
						locale: {
							cancelLabel: 'Clear'
						},
						ranges: {
							'Today': [moment(), moment()],
							'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
							'Last 7 Days': [moment().subtract(6, 'days'), moment()],
							'Last 30 Days': [moment().subtract(29, 'days'), moment()],
							'This Month': [moment().startOf('month'), moment().endOf('month')],
							'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
						}
					});

					$('input[name="created_at"]').on('apply.daterangepicker', function (ev, picker) {
						$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
					});

					$('input[name="created_at"]').on('cancel.daterangepicker', function (ev, picker) {
						$(this).val('');
					});
				}

				function currentDiv(n) {
				  showDivs(slideIndex = n);
				}

				function showDivs(n) {
				  var i;
				  var x = document.getElementsByClassName("mySlides");
				  var dots = document.getElementsByClassName("demo");
				  if (n > x.length) {slideIndex = 1}
				  if (n < 1) {slideIndex = x.length}
				  for (i = 0; i < x.length; i++) {
				    x[i].style.display = "none";
				  }
				  for (i = 0; i < dots.length; i++) {
				    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
				  }
				  x[slideIndex-1].style.display = "block";
				  // dots[slideIndex-1].className += " w3-opacity-off";
				}
			</script>
@endsection