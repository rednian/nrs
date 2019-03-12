@extends('layouts.app')
@section('content')
    <section class="row">
			<div class="col-md-12">
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-upload"></i>
							<span class="caption-subject bold uppercase">upload image </span>
						</div>
						<div class="actions">
							<a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen" data-original-title="" title=""></a>
						</div>
					</div>
					<section class="portlet-body" style="">
						<form action="{{route('service.upload')}}" method="post" id="frm-upload" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<input type="hidden" class="form-control"value="{{Request::segment(2)}}" name="service_id">
							</div>

							<section class="row">
								<div class="col-md-12">
									<div id="image_container" class="img-responsive"></div>
								</div>
							</section>

							<section class="row">

								<div class="col-md-9 col-sm-9 col-xs-12" style="margin-top: 2%; margin-bottom: 1%;">

									<button onclick="$('#file').trigger('click')" id="btnChooseImage" type="button" class="btn btn-default btn-sm btn-dashed-border">
										<i class="fa fa-image"></i>
										Add Image
									</button>
									<input  accept="image/*"  capture="environment" capture="camera" onchange="readURL(this);" class="hide" type="file" multiple name="images[]" id="file" style="width: 100%;"/>
									<button data-toggle="modal" data-target="#camera" type="button" class="btn btn-default btn-sm btn-dashed-border">
										<i class="fa fa-camera"></i>
									</button>
								</div>
							</section>

							<div class="form-group">
								<button class="btn btn-sm btn-success">upload image</button>
							</div>

						</form>
					</section>
				</div>
			</div>
		</section>
		@include('services.capture-image-dialog')
@stop
@section('script')
	<script>
		var images = [];

		$(document).ready(function () {

			$('form#frm-upload').submit(function (e) {
				e.preventDefault();
				$.ajax({
					url: $(this).attr('action'),
					type: $(this).attr('method'),
					data: $(this).serialize() + '&' + $.param({images: images}),
					dataType: 'JSON'
				}).done(function (response) {
					new PNotify({
						type: 'success',
						delay: 3000,
						title: 'Success!',
						text: 'Image(s) successfully added.',
						after_close: function(notice, timer_hide) {
							location.replace('{{route('service.index')}}');
						}
					});

				});

			});





			var video = document.querySelector("#video");

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
@stop