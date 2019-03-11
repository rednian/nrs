<div class="modal  fade" id="create-delivery" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
                <form id="form-delivery" action="{{route('delivery.store')}}" method="post" class="form-horizontal">
                    <section class="row">
                        <div class="col-md-6">
                            <section class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Customer Details</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-sm" id="name" name="customer_name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Mobile</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-sm" id="mobile" name="customer_mobile" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-sm" id="phone"  name="customer_phone">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control input-sm" id="email"  name="customer_email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Address</label>
                                        <div class="col-sm-10">
                                            <textarea name="customer_address" id="address"  rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                        <div class="col-md-6">
                            <section class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Delivery Details</h4>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Ref #</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-sm"  name="reference_no" id="reference-no"  readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="delivery-date">Delivery Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="delivery_date" class="form-control input-sm" id="delivery-date" value="{{date('Y-m-d')}}">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Delivery Location</label>
                                        <div class="col-sm-10">
                                            <textarea name="delivery_location" id=""  rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <button class="btn btn-success green-haze pull-right" type="submit">Save Delivery</button>
                            <button class="btn btn-success btn-danger pull-right reset" type="button" style="margin-right: 1%">Clear</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>s
    <!-- /.modal-dialog -->
</div>