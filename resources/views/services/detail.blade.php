
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Detail |</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 2% 2% 0 2%;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            /*background-color: #60A7A6;*/
            /*color: #FFF;*/
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        .table tr td{
            height: 30px;   
        }
        table.signature tr td{
            height: 40px;
        }
        hr{ 
          height: 1px;
          color: #040505;
          background-color: #040505;
          border: none;
        }
        .table td, .table th{
        	 border: 1px solid black;

        }
        .table th{
        	height: 35px;
        	line-height: all;
        	text-align: center;
        }
        .table td{

        }
        table{
        	 border-collapse: collapse;
        }
        .service-info td{
        	height: 20px;
        }
    </style>

</head> 
<body>

<div class="information">
    @php
        
        $laptop = [
            $service->laptop_broken_lcd, 
            $service->laptop_casing_broken,
            $service->laptop_loose_hinges,
            $service->laptop_missing_keys,
            $service->laptop_broken_sockets,
            $service->laptop_hdd_defective,
            $service->laptop_display_flickering,
            $service->laptop_optical_drive_damage,
        ];

        $lcd = [
            $service->lcd_scratches,
            $service->lcd_casing_broken,
            $service->lcd_display_flickering,
        ];

        $accessories = [
            $service->accessories_power_cord,
            $service->accessories_battery,
            $service->accessories_others,
            $service->accessories_pcmcia,
            $service->accessories_optical_drive,
            $service->accessories_toner_cartridge,
            $service->accessories_ink_cartridge,
            $service->accessories_data_cable,
        ];

        $recovery = [
            $service->recovery_hdd,
            $service->recovery_laptop,
            $service->recovery_scsi,
            $service->recovery_sata,
            $service->recovery_sas,
            $service->recovery_nas,
            $service->recovery_ssd,
            $service->recovery_flash,
            $service->recovery_mobile,
            $service->recovery_tablet,
        ];


    @endphp
    <img src="{{asset('img/nrs.png')}}" alt="" class="img img responsive" style="height: 50px; float: left">
    <h3 style=" clear: both; text-align: center;">Service Report</h3>
    <hr >
    <table width="100%" >
        <tr>    
            <td align="left" style="width: 15%;">
              <strong>  Customer Name</strong>
            </td>
            <td style="width: 60%; ">
                <strong>: </strong> {{ucwords($service->customer->customer_name)}}
            </td>
            <td align="left" style="width: 10%;">
                <strong>Report Date</strong>
            </td>
            <td>
                <strong>:</strong>
                {{date('d-M-Y')}}
            </td>
        </tr>
        <tr>
            <td><strong>Telephone No.</strong></td>
            <td><strong>:</strong> {{ !empty($service->customer->customer_phone) ? $service->customer->customer_phone : '-'}}</td>
            <td align="right"><strong>Receipt No.</strong></td>
            <td><strong>: </strong> <code style="color: #bc0136;">{{$service->receipt_no}}</code> </td>
        </tr>
        <tr>
            <td><strong>Mobile</strong></td>
            <td><strong>:</strong> {{ $service->customer->customer_mobile ? $service->customer->customer_mobile : '-' }}</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td><strong>:</strong> {{ $service->customer->customer_address ? $service->customer->customer_address : '-'}}</td>
        </tr>

    </table>
    <hr>
    <table width="100%" class="service-info">
        <tr>
            <td style="width: 15%;"><strong>Received Date</strong></td>
            <td><strong>: </strong>{{$service->created_at->format('d-M-Y')}}</td>
        </tr>
        <tr>
            <td><strong>Status</strong></td>
            <td><strong>: </strong> {{$service->service_status}}</td>
        </tr>
        @if ($service->service_status_reason)
           <tr>
               <td><strong>Status Reason</strong></td>
               <td><strong>: </strong> {{$service->service_status_reason}}</td>
           </tr>
        @endif
        <tr>
            <td><strong>Item/Brand</strong></td>
            <td><strong>: </strong> {{$service->brand}}</td>
        </tr>
        <tr>
            <td><strong>Model No.</strong></td>
            <td><strong>: </strong> {{$service->model}}</td>
        </tr>
        <tr>
            <td><strong>Serial No.</strong></td>
            <td><strong>: </strong> {{$service->serial}}</td>
        </tr>
        <tr>
            <td><strong>Remarks</strong></td>
            <td><strong>: </strong> {{$service->remarks}}</td>
        </tr>
          <tr>
            <td><strong>Problem Reported by the customer</strong></td>
            <td><strong>: </strong> {{$service->problem_reported}}</td>
        </tr>

    </table>
    <table width="100%" class="table" style="margin-top: 3%">
    	<thead>
    		<tr>
    			<th >Preliminary Inspection</th>
    			<th>Data Recovey</th>
    			<th>Accessories Recieved</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>
    				@if (in_array(1, $laptop))
    					<ol>
    						  @if ($service->laptop_broken_lcd == 1) <li>Brokern LCD</li>@endif   
    						  @if ($service->laptop_display_flickering == 1) <li>Dim display flickering</li>@endif   
    						  @if ($service->laptop_casing_broken == 1) <li>Casing broken</li>@endif   
    						  @if ($service->laptop_loose_hinges == 1) <li>Defective/Loose hinges</li>@endif   
    						  @if ($service->laptop_missing_keys == 1) <li>Missing key/caps etc</li>@endif   
    						  @if ($service->laptop_broken_sockets == 1) <li>Broken ports/sockets</li>@endif   
    						  @if ($service->laptop_hdd_defective == 1) <li>HDD making noise/Defective</li>@endif   
    						  @if ($service->laptop_optical_drive_damage == 1) <li>Optical Drive physical damage</li>@endif   
    					
    				@elseif(in_array(1, $lcd))
		    				@if ($service->lcd_scratches == 1) <li>Scratches/Marks/Lines in LCD</li>@endif
		    				@if ($service->lcd_display_flickering == 1) <li>Dim Display /Flickering</li>@endif
		    				@if ($service->lcd_casing_broken == 1) <li>Casing broken</li>@endif
    				    </ol>   
    				@else
    				    <span> -- </span>
    				@endif
    			</td>
    			<td>
    				@if (in_array(1, $recovery))
    					<ul>
    						@if ($service->recovery_hdd == 1) <li>HDD Recovery</li>@endif
    						@if ($service->recovery_laptop == 1) <li>Laptop Recovery</li>@endif
    						@if ($service->recovery_scsi == 1) <li>SCSI Recovery</li>@endif
    						@if ($service->recovery_sata == 1) <li>SATA Recovery</li>@endif
    						@if ($service->recovery_sas == 1) <li>SAS Recovery</li>@endif
    						@if ($service->recovery_nas == 1) <li>NAS Recovery</li>@endif
    						@if ($service->recovery_ssd == 1) <li>SSD Recovery</li>@endif
    						@if ($service->recovery_flash == 1) <li>Flash Drive Recovery</li>@endif
    						@if ($service->recovery_mobile == 1) <li>Mobile Recovery</li>@endif
    						@if ($service->recovery_tablet == 1) <li>Tablet Recovery</li>@endif
    						@if ($service->internal_18 == 1) <li>Internal/External 1.8</li>@endif
    						@if ($service->internal_25 == 1) <li>Internal/External 2.5</li>@endif
    						@if ($service->internal_35 == 1) <li>Internal/External 3.5</li>@endif
    					</ul>
    				@else
    				   {{-- <span>--</span> --}}
    				@endif
    			</td>
    			<td>
    				@if (in_array(1, $accessories))
    				<ol>
    					@if ($service->accessories_power_cord == 1) <li>Power cord</li>@endif
    					@if ($service->accessories_battery == 1) <li>Battery</li>@endif
    					@if ($service->accessories_pcmcia == 1) <li>PCMCIA</li>@endif
    					@if ($service->accessories_optical_drive == 1) <li>Optical drive</li>@endif
    					@if ($service->accessories_toner_cartridge == 1) <li>Toner cartridge</li>@endif
    					@if ($service->accessories_ink_cartridge == 1) <li>Ink cartridge</li>@endif
    					@if ($service->accessories_data_cable == 1) <li>Data cable</li>@endif
    					@if ($service->accessories_others == 1) <li>{{$services->accessories_others}}</li>@endif
    				</ol>
    				@else
    				    {{-- <em style="text-align: center;"> -- </em> --}}
    				@endif
    			</td>
    		</tr>
    	</tbody>
    </table>
  

    <h5 style="text-align: center; margin-bottom: 5%">Service Images</h5>
 
    <div style="clear: both;"></div>
    <section style="width: 100%">
    	  @if (!empty($service->images))
    	@foreach ($service->images as $image)
    		
    			<img src="{{ asset($image->thumbnail_path) }}" style="display: block; width: 24%; margin: 0 0 2% 1%;">
    	
    	@endforeach
    @endif
    </section>
  

</div>

<div class="information" style="position: absolute; bottom: 0;">
<hr>

<table width="100%">
    <tr>
        <td align="left" style="width: 50%;">
          <h5><a style="color: #000;" href="https://www.nrsinfoways.com/">NRS Infoways</a></h5><br>


        </td>
        <td align="right" style="width: 50%;">
           <span>Address: 103, Al Makhawi Building - Umm Hurair Rd - Dubai</span><br>
           <span>Phone: 04 370 9181</span>
        </td>
    </tr>

</table>
</div>
</body>
</html>
