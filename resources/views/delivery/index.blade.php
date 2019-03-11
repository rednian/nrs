@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    @endsection
@section('content')
    <section class="row">
        <div class="col-md-12">
            <section class="panel panel-default">
                <div class="panel-heading">
                    <section class="row">
                        <div class="col-md-1 col-md-offset-10">
                            <a href="#create-delivery" data-toggle="modal" class="btn btn-sm green-haze ">New Delivery </a>
                            @include('delivery.create')
                        </div>
                    </section>
                </div>
                <div class="panel-body clear-fix">
                    <table class="table table-bordered" id="delivery-table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Customer name</td>
                                <td>Date Delivered</td>
                                <td>Delivery date</td>
                                <td>Status</td>
                                <td>Delivery Location</td>
                                <td>Delivery Notified</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('/pages/scripts/table-editable.js')}}"></script>

    <script>
        $(document).ready(function () {
            // TableEditable.init();
            var tblDelivery = $('#delivery-table').DataTable({
                destroy: true,
                // dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>" +
                // "<'row'<'col-xs-12't>>" +
                // "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('delivery.dataTable')}}'
                },

                language: {
                    infoFiltered: '',
                    processing: '<span class="fa fa-spinner fa-spin fa-3x text-info"></span>'
                },
                columnDefs: [
                    {
                        targets: [4],
                        className: 'text-right',
                        sortable: false
                    }
                ],
                columns: [
                    {data: 'reference_no', name: 'reference_no'},
                    {data: 'customer.customer_name', name: 'customer.customer_name'},
                    {data: 'date_delivered', name: 'date_delivered'},
                    {data: 'delivery_date', name: 'delivery_date'},
                    {data: 'delivery_status', name: 'delivery_status'},
                    {data: 'delivery_location', name: 'delivery_location'},
                    {data: 'delivery_notified', name: 'delivery_notified'},
                    {
                        render: function (data, type, full, meta) {
                            var delivery_id = full.delivery_id;
                            return '<a onclick="show('+delivery_id+')"   class="btn btn-xs btn-default"><span class="fa fa-folder-open text-primary"></span></a> ' +
                                // '<a  href="javascript:;" class="btn btn-outline btn-xs btn-default edit">edit </a> ' +
                                '<a  onclick="destroy(' + delivery_id + ');" class="btn btn-outline btn-xs btn-default"><span class="fa fa-trash text-danger"></span></a>';
                        }
                    }
                ],

            });

            getReferenceNo();
        });


        
        
        function getReferenceNo() {
            $('#create-delivery').on('shown.bs.modal', function () {
                $.ajax({
                    url: '{{route('delivery.reference_no')}}',
                }).done(function (response) {
                    $('#reference-no').val(response);
                });
            })

        }
        
        function destroy(delivery_id) {
            $.ajax({
                url: '{{url('delivery')}}'+'/'+delivery_id,
                type: 'delete'
            }).done(function (response) {
                $('#delivery-table').DataTable().ajax.reload();
            });
            
        }
    </script>

@endsection