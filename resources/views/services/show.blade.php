@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/select2/select2.css')}}"/>
@endsection
@section('content')
    {{--    <div class="page-head">
                    <div class="page-title">
                        <h1>{{$page_title}}</h1>
                    </div>
                </div> --}}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gears"></i>
                        <span class="caption-subject bold uppercase">Service</span>
                        {{-- <span class="caption-helper">weekly stats...</span> --}}
                    </div>
                    <div class="actions">
                        {{--     <a href="javascript:;" class="btn btn-circle btn-default">
                            <i class="fa fa-pencil"></i> Edit </a>
                            <a href="javascript:;" class="btn btn-circle btn-default">
                            <i class="fa fa-plus"></i> Add </a> --}}
                        <a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen"
                           data-original-title="" title=""></a>
                    </div>
                </div>
                <section class="portlet-body" style="padding: 0 7px 0 7px;">

                    <form role="form" enctype="multipart/form-data" id="submit_form"
                          action="{{route('service.update', $service->service_id)}}" method="post"
                          class="form-horizontal">
                        @csrf
                        @method('patch')
                        <section class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <section class="form-body">
                                    <h4 class="form-section">Customer Information</h4>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name</label>
                                        <div class="col-md-9">
                                            <input name="customer_name" value="{{$service->customer->customer_name}}"
                                                   type="text" class="form-control input-sm select2 "
                                                   id="customer-name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mobile</label>
                                        <div class="col-md-9">
                                            <input value="{{$service->customer->customer_mobile}}"
                                                   name="customer_mobile" type="text" class="form-control input-sm"
                                                   id="mobile">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Phone</label>
                                        <div class="col-md-9">
                                            <input value="{{$service->customer->customer_phone}}" name="customer_phone"
                                                   type="text" class="form-control input-sm">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input value="{{$service->customer->customer_email}}" name="customer_email"
                                                   type="text" class="form-control input-sm" id="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address</label>
                                        <div class="col-md-9">
                                            <textarea name="customer_address" id="address" class="form-control"
                                                      rows="3">{{$service->customer->customer_address}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-9">
                                            <div class="md-checkbox-list">
                                                <div class="md-checkbox">
                                                    <input name="delivery" type="checkbox" value="1" class="md-check"
                                                           id="delivery">
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

                                {{--<section class="row" id="delivery-container">--}}

                                {{--<div class="form-group">--}}
                                {{--<label class="control-label col-md-3">Delivery Date</label>--}}
                                {{--<div class="col-md-9">--}}
                                {{--<input name="delivery_date" value="{{$service->customer->customer_name}}" id="delivery-date" type="date" class="form-control input-sm">--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                {{--<label class="control-label col-md-3">Delivery Address</label>--}}
                                {{--<div class="col-md-9">--}}
                                {{--<textarea  class="form-control input-sm" name="delivery_address"id="delivery-address" rows="3" placeholder="leave empty if delivery address is the same above"></textarea>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</section>--}}
                                {{--</section>--}}

                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12" style="border-left: 1px solid #ddd;">
                                <section class="form-body" style="padding: 2%">
                                    <h4 class="form-section">Service Information</h4>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Item/Brand</label>
                                        <div class="col-md-9">
                                            <input name="brand" value="{{$service->brand}}" type="text"
                                                   class="form-control input-sm" id="item">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Model</label>
                                        <div class="col-md-9">
                                            <input value="{{$service->model}}" name="model" type="text"
                                                   class="form-control input-sm" id="model">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">S/N</label>
                                        <div class="col-md-9">
                                            <input {{$service->serial}} name="serial" type="text"
                                                   class="form-control input-sm" id="serial">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Service Type</label>
                                        <div class="col-md-9">
                                            <?php

                                             $laptop = [
                                                 $service->laptop_brokern_lcd,
                                                 $service->laptop_display_flickering,
                                                 $service->laptop_casing_broken,
                                                 $service->laptop_loose_hinges,
                                                 $service->laptop_missing_keys,
                                                 $service->laptop_broken_sockets,
                                                 $service->laptop_hdd_deffective,
                                                 $service->laptop_optical_drive_damage,
                                             ];

                                             $lcd = [
                                                 $service->lcd_scratches,
                                                 $service->lcd_display_flickering,
                                                 $service->lcd_casing_broken,
                                             ];

                                             $recovery= [
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

                                             $value = 'test';
                                             if(!is_null($laptop)){
                                                 $value = 'Laptop';
                                             }

                                            if(!is_null($recovery)){
                                                $value = 'Data Recovery';
                                            }


                                            if(!is_null($lcd)){
                                                $value = 'LCD Monitor';
                                            }




                                            ?>

                                            <input value="{{$value}}" type="text" class="form-control input-sm" id="serial">
                                        </div>
                                    </div>

                                    <section class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12"></div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">

                                            <section class="row" id="laptop-container">
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <div class="md-checkbox-list">

                                                        <div class="md-checkbox">
                                                            <input name="laptop_broken_lcd" type="checkbox" value="1"
                                                                   id="broken-lcd" class="md-check">
                                                            <label for="broken-lcd">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Broken LCD
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input name="laptop_display_flickering"
                                                                   id="dim-display-flickering" type="checkbox" value="1"
                                                                   class="md-check">
                                                            <label for="dim-display-flickering">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Dim display Flickering
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input name="laptop_casing_broken" type="checkbox"
                                                                   id="casing-broken" value="1" class="md-check">
                                                            <label for="casing-broken">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Casing broken
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input id="defective-loose-hinges"
                                                                   name="laptop_loose_hinges" type="checkbox" value="1"
                                                                   class="md-check">
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
                                                            <input name="laptop_missing_keys" type="checkbox" value="1"
                                                                   id="missing-keys-caps" class="md-check">
                                                            <label for="missing-keys-caps">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Missing keys/caps etc.
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input name="laptop_broken_sockets" type="checkbox"
                                                                   value="1" id="broken-ports-sockets" class="md-check">
                                                            <label for="broken-ports-sockets">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Broken ports/sockets
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input name="laptop_hdd_defective" type="checkbox" value="1"
                                                                   id="making-noise-defective" class="md-check">
                                                            <label for="making-noise-defective">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                HDD making noise/Defective
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input name="laptop_optical_drive_damage" type="checkbox"
                                                                   value="1" id="optical-drive-physical-damage"
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
                                                            <input name="lcd_scratches" type="checkbox" value="1"
                                                                   id="lcd_scratches" class="md-check">
                                                            <label for="lcd_scratches">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Scratches/Marks/Lines in LCD
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input name="lcd_display_flickering" type="checkbox"
                                                                   value="1" id="lcd_display_flickering"
                                                                   class="md-check">
                                                            <label for="lcd_display_flickering">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Dim Display / Flickering
                                                            </label>
                                                        </div>

                                                        <div class="md-checkbox">
                                                            <input name="lcd_casing_broken" type="checkbox" value="1"
                                                                   id="lcd_casing_broken" class="md-check">
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

                                            <section class="row" id="recovery-container">
                                                <div class="col-md-12 col-sm-12 col-xs-12">


                                                    <label>Internal/External HDD</label>
                                                    <div class="md-checkbox-inline">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1" class="md-check">
                                                            <label for="checkbox1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                2.5
                                                            </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2" class="md-check">
                                                            <label for="checkbox2">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                3.5 </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox3" class="md-check">
                                                            <label for="checkbox3">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                1.8 </label>
                                                        </div>
                                                    </div>

                                                    <label>Server</label>
                                                    <div class="md-checkbox-inline">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox4" class="md-check">
                                                            <label for="checkbox4">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                SCSI
                                                            </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox5" class="md-check">
                                                            <label for="checkbox5">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                SATA </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox6" class="md-check">
                                                            <label for="checkbox6">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                SAS </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox7" class="md-check">
                                                            <label for="checkbox7">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                NAS </label>
                                                        </div>
                                                    </div>

                                                    <label>Memory Card</label>
                                                    <div class="md-checkbox-inline">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox8" class="md-check">
                                                            <label for="checkbox8">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                SSD
                                                            </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox9" class="md-check">
                                                            <label for="checkbox9">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Flashdrive
                                                            </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox10" class="md-check">
                                                            <label for="checkbox10">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Mobile Phone
                                                            </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox11" class="md-check">
                                                            <label for="checkbox11">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>
                                                                Tablet PC
                                                            </label>
                                                        </div>

                                                    </div>


                                                </div>
                                            </section>


                                        </div>
                                    </section>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Accessories Received</label>
                                        <div class="col-md-9">
                                            <section class="row">
                                                <div class="col-md-6 col-sm-6 colxs-12">
                                                    <?php
                                                    $accessories = [
                                                        'power_cord' => $service->accessories_power_cord,
                                                        'battery' => $service->accessories_battery,
                                                        'pcmcia' => $service->accessories_pcmcia,
                                                        'optical_drive' => $service->accessories_optical_drive,
                                                        'toner_cartridge' => $service->accessories_toner_cartridge,
                                                        'ink_cartridge' => $service->accessories_ink_cartridge,
                                                        'data_cable' => $service->accessories_data_cable
                                                    ];

                                                    ?>
                                                    @if(!empty($accessories))
                                                        <div class="md-checkbox-list">
                                                            @if(!empty($service->accessories_power_cord))
                                                                <div class="md-checkbox">
                                                                    <input checked name="accessories_power_cord" type="checkbox"
                                                                           value="1" id="accessories_power_cord"
                                                                           class="md-check">
                                                                    <label for="accessories_power_cord">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        Power adapter /Cord
                                                                    </label>
                                                                </div>
                                                            @endif
                                                            @if(!empty($service->accessories_battery))
                                                                <div class="md-checkbox">
                                                                    <input checked name="accessories_battery" type="checkbox"
                                                                           value="1" id="accessories_battery"
                                                                           class="md-check">
                                                                    <label for="accessories_battery">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        Battery
                                                                    </label>
                                                                </div>
                                                            @endif

                                                            @if(!empty($service->accessories_pcmcia))
                                                                <div class="md-checkbox">
                                                                    <input checked name="accessories_pcmcia" type="checkbox"
                                                                           value="1" id="accessories_pcmcia"
                                                                           class="md-check">
                                                                    <label for="accessories_pcmcia">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        PCMCIA card / Carry case
                                                                    </label>
                                                                </div>
                                                            @endif
                                                            @if(!empty($service->accessories_optical_drive))
                                                                <div class="md-checkbox">
                                                                    <input checked name="accessories_optical_drive"
                                                                           type="checkbox"
                                                                           value="1" id="accessories_optical_drive"
                                                                           class="md-check">
                                                                    <label for="accessories_optical_drive">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        Optical drive
                                                                    </label>
                                                                </div>
                                                            @endif
                                                            @if(!empty($service->accessories_toner_cartridge))
                                                                <div class="md-checkbox">
                                                                    <input checked name="accessories_toner_cartridge"
                                                                           type="checkbox" value="1"
                                                                           id="accessories_toner_cartridge"
                                                                           class="md-check">
                                                                    <label for="accessories_toner_cartridge">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        Toner cartridge
                                                                    </label>
                                                                </div>
                                                            @endif
                                                            @if(!empty($service->accessories_ink_cartridge))
                                                                <div class="md-checkbox">
                                                                    <input checked name="accessories_ink_cartridge"
                                                                           type="checkbox" value="1"
                                                                           id="accessories_ink_cartridge"
                                                                           class="md-check">
                                                                    <label for="accessories_ink_cartridge">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        Ink cartridge
                                                                    </label>
                                                                </div>
                                                            @endif
                                                            @if(!empty($service->accessories_data_cable))
                                                                <div class="md-checkbox">
                                                                    <input checked name="accessories_data_cable" type="checkbox"
                                                                           value="1" id="accessories_data_cable"
                                                                           class="md-check">
                                                                    <label for="accessories_data_cable">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        Data / Signal cable
                                                                    </label>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    @endif

                                                </div>

                                            </section>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Problem Reported</label>
                                        <div class="col-md-9">
                                            <textarea name="problem_reported" class="form-control input-sm"
                                                      rows="3">{{ucfirst($service->problem_reported)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Remarks</label>
                                        <div class="col-md-9">
                                            <textarea name="remarks" class="form-control input-sm" rows="3">
                                                {{ucfirst($service->remarks)}}
                                            </textarea>
                                        </div>
                                    </div>

                                    <section class="row">
                                        <div class="col-md-12">
                                            <div id="image_container" class="img-responsive">
                                                @if($service->images)
                                                    @foreach($service->images as $image)
                                                        <img src="{{$image}}" alt="" class="img-responsive">
                                                    @endforeach

                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                    <section class="row">
                                        <div class="col-md-offet-3 col-md-9 col-sm-9 col-xs-12" style="margin-top: 2%">

                                            <button onclick="$('#file').trigger('click')" id="btnChooseImage"
                                                    type="button" class="btn btn-default btn-sm btn-dashed-border"><i
                                                        class="fa fa-image"></i> Add Image
                                                </button>
                                            <input accept="image/*" capture="user" capture="environment"
                                                   capture="camera" onchange="readURL(this);" class="hide" type="file"
                                                   multiple name="images[]" id="file" style="width: 100%;"/>

                                            <button data-toggle="modal" data-target="#camera" type="button"
                                                    class="btn btn-default btn-sm btn-dashed-border"><i
                                                        class="fa fa-camera"></i></button>
                                            @include('services.capture-image-dialog')
                                        </div>
                                    </section>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-9">
                                            <button type="button" class="btn btn-default btn-sm reset">Cancel</button>
                                            <button type="submit" class="btn btn-sm green-seagreen button-submit">Save
                                                <i class="m-icon-swapright m-icon-white"></i></button>

                                            <button type="button" id="print"
                                                    class="btn btn-sm green-seagreen button-submit">Save & Print <i
                                                        class="fa fa-print"></i></button>
                                        </div>
                                    </div>

                                </section>
                        </section>

            </div>
            </section>

            </form>

            </section>

        </div>
    </div>
@endsection
@section('script')

    <script type="text/javascript" src="{{asset('/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/jquery-validation/js/additional-methods.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/typeahead/typeahead.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/form-wizard.js')}}"></script>d

@endsection