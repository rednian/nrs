@extends('layouts.app')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
	{{--	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/>--}}
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-toggle/toggle-button.min.css')}}"/>

	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-editable/css/bootstrap-editable.css')}}"/>

	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
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
									<input autocomplete="off" name="brand" type="text" class="form-control input-sm" placeholder="brand / item">
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
										<option value="pending">Pending</option>
										<option value="done">Done</option>
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
					<section class="table-responsive">
						<table class="table table-condensed flip-content" id="tblServices">
							<thead class="flip-content">
							<tr>
								<th>Receipt. #</th>
								<th>Customer Name</th>
								<th>Mobile No.</th>
								<th>Brand/Item</th>
								<th>Remarks</th>
								<th>Date</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</section>

					@include('services.service-detail')
				</section>
			</div>
		</div>
		@include('services.show-modal')
		@endsection

		@section('script')
			<script type="text/javascript" src="{{asset('/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
{{--			<script type="text/javascript" src="{{asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>--}}
{{--			<script type="text/javascript" src="{{asset('/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>--}}
{{--			<script type="text/javascript" src="{{asset('/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script>--}}

			<script type="text/javascript" src="{{asset('/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>

			<script type="text/javascript" src="{{asset('/plugins/bootstrap-editable/js/bootstrap-editable.js')}}"></script>

			<script type="text/javascript" src="{{asset('/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
			<script type="text/javascript" src="{{asset('/scripts/components-pickers.js')}}"></script>

			<script src="{{asset('/plugins/bootstrap-toggle/toggle-button.min.js')}}"></script>
			<script type="text/javascript">
				$(document).ready(function () {

					dateRange();
					var tblServices = $('#tblServices').DataTable({
						destroy: true,
						dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>" +
						"<'row'<'col-xs-12't>>" +
						"<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
						processing: true,
						serverSide: true,
						ajax: {
							url: '{{ route('service.dataTable')}}',
							data: function (d) {
								d.customer_name = $('input[name=customer_name]').val();
								d.customer_email = $('input[name=customer_email]').val();
								d.customer_mobile = $('input[name=customer_mobile]').val();

								d.service_status = $('select#status').val();
								d.created_at = $('input[name=created_at]').val();
								d.brand = $('input[name=brand]').val();
							}
						},

						language: {
							infoFiltered: '',
							processing: '<span class="fa fa-spinner fa-spin fa-3x text-info"></span>'
						},
						columnDefs: [
							{
								targets: [7],
								className: 'text-right',
								sortable: false
							}
						],
						columns: [
							{data: 'receipt_no', name: 'receipt_no'},
							{data: 'customer_name', name: 'customer_name'},
							{data: 'customer_mobile', name: 'customer_mobile'},
							{data: 'brand', name: 'brand'},
							{data: 'remarks', name: 'remarks'},
							{data: 'created_at', name: 'created_at'},
							{
								render: function (data, type, full, meta) {
									return '<a href="javascript:;" data-value="' + full.service_status + '" id="service-status" data-pk="' + full.service_id + '" data-placeholder="Required"  class="editable editable-click">' + full.service_status + '</a>';
								}
							},
							{
								render: function (data, type, full, meta) {

									var id = full.service_id;
									var url = '{{url('service')}}/'+id+'/qrcode';

									return '<a onclick="view(this)" data-serviceid ="'+full.service_id+'" class="btn btn-xs btn-default"><span class="fa fa-folder-open text-primary"></span></a>' +
													'<a onclick="printService(this)" data-serviceid ="'+full.service_id+'" class="btn btn-xs btn-default"><span class="fa fa-print text-default"></span></a>' +
													// '<a href="'+url+'" class="btn btn-xs btn-default"><span class="fa fa-qrcode text-default"></span></a>' +
													'<a onclick="destroy(this)" data-serviceid ="'+full.service_id+'"  class="btn btn-outline btn-xs btn-default"><span class="fa fa-trash text-danger"></span></a>';

								}
							}
						],
						fnCreatedRow: function (row, data, index) {

						},
						initComplete: function (settings, json) {
							updateStatus();
						}
					});

					$('#form-filter').submit(function (e) {
						$('#tblServices').DataTable().ajax.reload();
						e.preventDefault();
					});

					$('#tblServices').wrap('<div class="table-responsive"></div>');

				});

				function printService(el) {
					var service_id = $(el).data('serviceid');
					$.ajax({
						url: '{{url('service/print')}}/'+service_id,
						// data: {service_id: service_id}
					}).done(function (response) {

						window.open('{{url('service/print')}}/'+service_id);
					});
				}

				function view(el) {

					var service_id = $(el).data('serviceid');

					$('#pre-inspection').html('');
					$('#modal-accessories-received').html('');
					$('#services-images-container').html('');

					$.ajax({
						url: '{{url('service')}}'+'/'+service_id,
						data: {service_id: service_id},
						dataType: 'json',
					}).done(function (response) {

						$('#show-service').modal('show');

						$.each(response, function (index, service) {

							$('#qrcode-container').html(service.qr);
							$('#c-name').html(service.customer_name);
							$('#phone').html(service.customer_phone);
							$('#mobile').html(service.customer_mobile);
							$('#c-address').html(service.customer_address);
							$('#c-email').html(service.customer_email);

							$('#ref').html(service.receipt_no);
							$('#service-brand').html(service.brand);
							$('#modal-service-serial').html(service.serial);
							$('#service-model').html(service.model);
							$('#problem').html(service.problem_reported);
							$('#remarks-show').html(service.remarks);


							var status = (service.service_status === 'done') ? 'label-success' : 'label-default';
							$('#status-service').html('<span class="label '+status+'">'+service.service_status+'</span>');



							var preliminary = service.laptop_broken_lcd == 1 ?  '<li>Broken LCD</li>' : '';
							   preliminary += service.laptop_display_flickering == 1 ?  '<li>Display Flickering</li>' : '';
							   preliminary += service.laptop_casing_broken == 1 ?  '<li>Casing Broken</li>' : '';
							   preliminary += service.laptop_loose_hinges == 1 ?  '<li>Loose Hinges</li>' : '';
							   preliminary += service.laptop_missing_keys == 1 ?  '<li>Missing Keys</li>' : '';
							   preliminary += service.laptop_broken_sockets == 1 ?  '<li>Broken sockets</li>' : '';
							   preliminary += service.laptop_hdd_deffective == 1 ?  '<li>HDD Deffective</li>' : '';
							   preliminary += service.laptop_optical_drive_damage == 1 ?  '<li>Optical drive damage</li>' : '';
							   preliminary += service.lcd_scratches == 1 ?  '<li>LCD scratches</li>' : '';
							   preliminary += service.lcd_display_flickering == 1 ?  '<li>Display flickering</li>' : '';
							   preliminary += service.lcd_casing_broken == 1 ?  '<li>Casing broken</li>' : '';
							   preliminary += service.lcd_casing_broken == 1 ?  '<li>Casing broken</li>' : '';
							   preliminary += service.recovery_hdd == 1 ?  '<li>Recovery HDD</li>' : '';
							   preliminary += service.recovery_laptop == 1 ?  '<li>Recovery Laptop</li>' : '';
							   preliminary += service.recovery_scsi == 1 ?  '<li>Recovery SCSI</li>' : '';
							   preliminary += service.recovery_sata == 1 ?  '<li>Recovery SATA</li>' : '';
							   preliminary += service.recovery_sas == 1 ?  '<li>Recovery SAS</li>' : '';
							   preliminary += service.recovery_nas == 1 ?  '<li>Recovery NAS</li>' : '';
							   preliminary += service.recovery_ssd == 1 ?  '<li>Recovery SSD</li>' : '';
							   preliminary += service.recovery_flash == 1 ?  '<li>Recovery flash drive</li>' : '';
							   preliminary += service.recovery_mobile == 1 ?  '<li>Recovery mobile</li>' : '';
							   preliminary += service.recovery_tablet == 1 ?  '<li>Recovery tablet</li>' : '';

							   $('#pre-inspection').append(preliminary);

							   var acc_received = service.accessories_power_cord == 1 ? '<li>Power cord</li>': '';
							   		 acc_received += service.accessories_battery == 1 ? '<li>Battery</li>': '';
							   		 acc_received += service.accessories_pcmcia == 1 ? '<li>PCMCIA</li>': '';
							   		 acc_received += service.accessories_optical_drive == 1 ? '<li>Optical Drive</li>': '';
							   		 acc_received += service.accessories_toner_cartridge == 1 ? '<li>Toner cartridge</li>': '';
							   		 acc_received += service.accessories_ink_cartridge == 1 ? '<li>Ink cartridge</li>': '';
							   		 acc_received += service.accessories_data_cable == 1 ? '<li>Data cable</li>': '';

							   		 $('#modal-accessories-received').append(acc_received);



							if(!$.isEmptyObject(service.images)){
								console.log(service.images);
								$.each(service.images, function (index, image) {
									var src = '{{asset('')}}'+image.upload_path;

									var html  = '<div class="col-sm-2">';
										  html += '<img src="'+src+'" class="img img-thumbnail img-responsive"/>';
										  html += '</div>';

										 $('#services-images-container').append(html);
								});
							}
							else{
								{{--var html  = '<div class="col-sm-3">';--}}
								{{--html		  += '<img src="{{asset('img/default.png')}}" class="img img-thumbnail img-responsive"/>';--}}
								{{--html 			+= '</div>';--}}
								{{--$('#services-images-container').html(html);--}}
							}

							// console.log(service.created_at.date);

							// var date = new Date(service.created_at.date);
							// var day = date.getDate();
							// var month = date.getMonth();
							// var year = date.getFullYear();
							// var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
							// $('#date').html(day+'-'+months[month]+'-'+year);

						});
					});
				}

				function updateStatus() {
					$('.editable').editable({
						type: 'select',
						autotext: 'auto',
						name: 'service_status',
						title: 'Update service status',
						url: '{{route('service.status')}}',
						source: [
							{value: 'done', text: 'done'},
							{value: 'pending', text: 'pending'},
							{value: 'returned', text: 'returned'},
						]
					});
				}


				function destroy(el) {
					var service_id = $(el).data('serviceid');
					(new PNotify({
						title: 'Confirmation Needed',
						text: 'Are you sure you want to delete the service?',
						icon: 'glyphicon glyphicon-question-sign',
						hide: false,
						confirm: {
							confirm: true
						},
						buttons: {
							closer: false,
							sticker: false
						},
						history: {
							history: false
						}
					})).get().on('pnotify.confirm', function() {

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

					}).on('pnotify.cancel', function() {});

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
			</script>
@endsection