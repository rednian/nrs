
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Delivery Report</title>

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
    </style>

</head> 
<body>

<div class="information">
    @php
        
        $laptop = [
            $services->laptop_broken_lcd, 
            $services->laptop_casing_broken,
            $services->laptop_loose_hinges,
            $services->laptop_missing_keys,
            $services->laptop_broken_sockets,
            $services->laptop_hdd_defective,
            $services->laptop_display_flickering,
            $services->laptop_optical_drive_damage,
        ];

        $lcd = [
            $services->lcd_scratches,
            $services->lcd_casing_broken,
            $services->lcd_display_flickering,
        ];

        $accessories = [
            $services->accessories_power_cord,
            $services->accessories_battery,
            $services->accessories_others,
            $services->accessories_pcmcia,
            $services->accessories_optical_drive,
            $services->accessories_toner_cartridge,
            $services->accessories_ink_cartridge,
            $services->accessories_data_cable,
        ];

        $recovery = [
            $services->recovery_hdd,
            $services->recovery_laptop,
            $services->recovery_scsi,
            $services->recovery_sata,
            $services->recovery_sas,
            $services->recovery_nas,
            $services->recovery_ssd,
            $services->recovery_flash,
            $services->recovery_mobile,
            $services->recovery_tablet,
        ];


    @endphp
    <img src="{{asset('img/nrs.png')}}" alt="" class="img img responsive" style="height: 50px; float: left">
    <h2 style=" clear: both; text-align: center;">Delivery Report</h2>
    <hr >
    <table width="100%" >
        <tr>    
            <td align="left" style="width: 15%;">
              <strong>  Customer Name</strong>
            </td>
            <td style="width: 60%; ">
                <strong>: </strong> {{ucwords($services->customer->customer_name)}}
            </td>
            <td align="left" style="width: 10%;">
                <strong>Date</strong>
            </td>
            <td>
                <strong>:</strong>
                {{date('d-M-Y')}}
            </td>
        </tr>
        <tr>
            <td><strong>Telephone No.</strong></td>
            <td><strong>:</strong> {{ !empty($services->customer->customer_phone) ? $services->customer->customer_phone : '-'}}</td>
            <td align="left"><strong>Receipt No.</strong></td>
            <td><strong>: </strong> <code style="color: #000;">{{$services->receipt_no}}</code> </td>
        </tr>
        <tr>
            <td><strong>Mobile</strong></td>
            <td><strong>:</strong> {{ $services->customer->customer_mobile ? $services->customer->customer_mobile : '-' }}</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td><strong>:</strong> {{ $services->customer->customer_address ? $services->customer->customer_address : '-'}}</td>
        </tr>

    </table>
    <hr>
    <section style="width: 30%; float: left; border: solid 1px #040505; margin-right: 2%">
        <table width="100%" class="table">
            <tr>
                <td><strong>Received Date</strong></td>
            </tr>
          {{--   <tr>
                <td><strong>Status</strong></td>
            </tr> --}}
            <tr>
                <td><strong>Item/Brand</strong></td>
            </tr>
            <tr>
                <td><strong>Model No.</strong></td>
            </tr>
            <tr>
                <td><strong>Serial No.</strong></td>
            </tr>
            <tr>
                <td><strong>Remarks</strong></td>
            </tr>
            <tr>
                <td><strong>Preliminary Inspection</strong></td>
            </tr>
            <tr>
                <td><strong>Data Recovery</strong></td>
            </tr>
            <tr>
                <td><strong>Accessories Received</strong></td>
            </tr>
              <tr>
                <td><strong>Reported Problem by the customer</strong></td>
            </tr>
        </table>
    </section>
    <section style="width: 68%; float: right; border: solid 1px #040505;">
        <table class="table">
            <tr>
                <td>{{date('d-M-Y', strtotime($services->created_at))}}</td>
            </tr>
           {{--  <tr>
                <td>{{$services->service_status}}</td>
            </tr> --}}
            <tr>
                <td>{{ucwords($services->brand)}}</td>
            </tr>
             <tr>
                <td>{{ucwords($services->model)}}</td>
            </tr>
             <tr>
                <td>{{ucwords($services->serial)}}</td>
            </tr>
           
             <tr>
                <td>{{ucfirst($services->remarks)}}</td>
            </tr>
              <tr>
                <td>
                    {{-- {{dd($services)}} --}}
                    @if (in_array(1, $laptop))
                         {{ $services->laptop_broken_lcd == 1 ? 'Broken LCD,': ''}}    
                         {{ $services->laptop_display_flickering == 1 ? 'Dim display flickering,': ''}}    
                         {{ $services->laptop_casing_broken == 1 ? 'Casing broken,': ''}}    
                         {{ $services->laptop_loose_hinges == 1 ? 'Defective/loose hinges,': ''}}    
                         {{ $services->laptop_missing_keys == 1 ? 'Missing key/caps etc.,': ''}}    
                         {{ $services->laptop_broken_sockets == 1 ? 'Broken ports/sockets,': ''}}    
                         {{ $services->laptop_hdd_defective == 1 ? 'HDD making noise/Defective ,': ''}}    
                         {{ $services->laptop_optical_drive_damage == 1 ? 'Optical Drive physical damage ,': ''}}    
                    @elseif(in_array(1, $lcd))
                        {{ $services->lcd_scratches == 1 ? 'Scratches/Marks/Lines in LCD,': ''}}    
                        {{ $services->lcd_display_flickering == 1 ? 'Dim Display / Flickering,': ''}}    
                        {{ $services->lcd_casing_broken == 1 ? 'Casing broken,': ''}}    
                    @else
                        <span> - </span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if (in_array(1, $recovery))
                       {{ $services->recovery_hdd == 1 ? 'HDD Recovery,': ''}}
                       {{ $services->recovery_laptop == 1 ? 'Laptop Recovery,': ''}}
                       {{ $services->recovery_scsi == 1 ? 'SCSI Recovery,': ''}}
                       {{ $services->recovery_sata == 1 ? 'SATA Recovery,': ''}}
                       {{ $services->recovery_sas == 1 ? 'SAS Recovery,': ''}}
                       {{ $services->recovery_nas == 1 ? 'NAS Recovery,': ''}}
                       {{ $services->recovery_ssd == 1 ? 'SSD Recovery,': ''}}
                       {{ $services->recovery_flash == 1 ? 'Flash driver Recovery,': ''}}
                       {{ $services->recovery_mobile == 1 ? 'Mobile Phone Recovery,': ''}}
                       {{ $services->recovery_tablet == 1 ? 'Tablet Recovery,': ''}}
                       {{ $services->internal_18 == 1 ? 'Internal/External 1.8,': ''}}
                       {{ $services->internal_25 == 1 ? 'Internal/External 2.5,': ''}}
                       {{ $services->internal_35 == 1 ? 'Internal/External 3.5': ''}}
                    @else
                       <span>-</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if (in_array(1, $accessories))
                        {{ $services->accessories_power_cord == 1 ? 'Power cord,': ''}}
                        {{ $services->accessories_battery == 1 ? 'Battery,': ''}}
                        {{ $services->accessories_pcmcia == 1 ? 'PCMCIA,': ''}}
                        {{ $services->accessories_optical_drive == 1 ? 'Optical drive,': ''}}
                        {{ $services->accessories_toner_cartridge == 1 ? 'Toner cartridge,': ''}}
                        {{ $services->accessories_ink_cartridge == 1 ? 'Ink cartridge,': ''}}
                        {{ $services->accessories_data_cable == 1 ? 'Data cable,': ''}}
                        {{ $services->accessories_others ? $services->accessories_others: ''}}
                    @else
                        <em>No Accessories received</em>
                    @endif
                </td>
            </tr>
              <tr>
                <td>{{ucfirst($services->problem_reported)}}</td>
            </tr>

        </table>

    </section>
    <div style="clear: both;"></div>
    <table width="100%">
        <tr>    
            <td align="left" style="width: 60%; ">
              <strong> Customer/Representative Signature</strong>
            </td>
            <td align="left" style="width: 40%;">
                <strong>NRS Infoways Representative</strong>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td align="left"  style="width: 60%; height: 30px;"><strong>Name:</strong></td>
            <td align="left"  style="width: 40%; height: 30px;"><strong>Name:</strong></td>
        </tr>
        <tr>
            <td align="left"  style="width: 60%;"><strong>Date:</strong></td>
            <td align="left"  style="width: 40%;"><strong>Date:</strong></td>
        </tr>
        <tr>
            <td align="left"  style="width: 60%; height: 30px;"><strong>Signature:</strong></td>
            <td align="=left"  style="width: 40%; height: 30px;"><strong>Signature:</strong></td>
        </tr>

    </table>
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
