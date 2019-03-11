<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<section class="container" id="printable">
		<h4 class="text-center"><strong>Service Authorization Form</strong></h4>
		<pre>
			
		<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2" style="vertical-align: middle; text-align: center;">Customer Details</th>
					<th colspan="2">Receipt No. <strong>232</strong></th>
				</tr>
				<tr>
					<td colspan="2">Date:  <strong>{{$services->created_at->format('F d, Y')}}</strong></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="3"><strong>Name {{ucwords($services->customer->customer_name)}}</strong></td>
				</tr>
				<tr>
					<td colspan="3">Address <strong>{{ucwords($services->customer->customer_address)}}</strong></td>
				</tr>
				<tr>
					<td><strong>Phone:</strong> {{ucwords($services->customer->customer_phone)}}</td>
					<td><strong>Mobile</strong> {{ucwords($services->customer->customer_mobile)}}</td>
					<td><strong>Email:</strong> {{ucwords($services->customer->customer_email)}}</td>
				</tr>
				<tr>
					<td>Item/Brand : {{ucwords($services->brand)}}</td>
					<td>Model : {{$services->model}}</td>
					<td>S/N: {{$services->serial}}</td>
				</tr>
			</tbody>
			{{-- @endforeach --}}
		</table>
		<h4 class="text-center"><strong>Preliminary Inspection Report</strong></h4>
		<table class="table table-bordered table-condensed">
				<thead>
				<tr>
					<th>
					  	<label><input type="checkbox" value=""> Accessories Received</label>
					</th>
				<th>
					  	<label><input type="checkbox" checked value=""> Data Recovery</label>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label><input type="checkbox" value=""> Power adapter /Cord</label>
					</td>
					<td>
						<label><input type="checkbox" value=""> Power adapter /Cord</label>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>
					  	<label><input type="checkbox" value=""> Laptop</label>
					</th>
					<th>
					  	<label><input type="checkbox" value=""> Printer</label>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> Broken LCD</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> Toner spillage</label>
					</td>
				</tr>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> Dim display flickering</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> Fuser sleeve torn off</label>
					</td>
				</tr>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> Casing broken</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> Ink leakage</label>
					</td>
				</tr>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> Deffective/loose hinges</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> Casing broken</label>
					</td>
				</tr>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> Missing keys/caps etc</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> <strong>LCD Monitor / SMPS</strong></label>
					</td>
				</tr>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> Broken ports / sockets</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> <strong>Scratches/Marks/Lines in LCD</strong></label>
					</td>
				</tr>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> HDD making noise</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> <strong>Dim display flickering</strong></label>
					</td>
				</tr>
				<tr>
					<td>
					  	<label><input type="checkbox" value=""> Optical drive physical damage</label>
					</td>
					<td>
					  	<label><input type="checkbox" value=""> <strong>Casing broken</strong></label>
					</td>
				</tr>
			</tbody>
		</table>
		<p>
			I hereby authorize GALA Infotech Computer Trading to perform the necessary repair/replacement if changes are in the
			limit mentioned above. I know GALA ICT will intimate me if there is any difference in repair charges or if the items is not repairable and I agree to the term and conditions given below.
		</p>
		<table class="table table-bordered">
			<tr>
				<td>Customer sign</td> 
				<td>Date</td> 
				<td>Athorization sign</td> 
			</tr>
		</table>
		{{-- @endforeach --}}
	</section>
</body>
</html>