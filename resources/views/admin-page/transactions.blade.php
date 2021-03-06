@extends('index')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title-1 m-b-25">Transaction List </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 p-0">
                        <div class="form-group">
                            <select class="form-control" name="status" id="status">
                                <option>Filter dari Status</option>
                                <option value="">All</option>
                                <option value="pending">Pending</option>
                                <option value="paid">Paid</option>
                                <option value="payment check">Payment Check</option>
                            </select>
                        </div>
                    </div>
                    <form action="{{ route('admin.transaction.export') }}" method="POST" style="display: contents;">@csrf
                        <div class="col-md-3 p-0 offset-md-3">
                            <label class="sr-only" for="start_date">Start Date</label>
                            <input name="start_date" type="date" class="form-control mb-2 mr-sm-2" id="start_date" placeholder="01/01/2018">
                        </div>
                        <div class="col-md-3 p-0">
                            <label class="sr-only" for="end_date">Username</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">-</div>
                                </div>
                                <input name="end_date" type="date" class="form-control" id="end_date" placeholder="01/31/2019">
                            </div>
                        </div>
                        <div class="col-md-1 p-0 text-right">
                            <button type="submit" class="btn btn-primary mb-2">
                                <i class="fa fa-download"></i>
                                EXCEL
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning" id="datatables-resource">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Created at</th>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('modal')
    <!-- The Transaction Edit Modal -->
    <div class="modal" id="modal-transaction-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form id="update_form" action="#" method="post">
                    @csrf

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Order Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div id="tracking_number_row" class="form-group row">
                                <label for="name" class="col-sm-12 col-form-label">Nomor Resi</label>
                                <div class="col-sm-12">
                                    <input type="text" disabled class="form-control" name="tracking_number" id="tracking_number" placeholder="nomor resi">
                                </div>
                            </div>
                            <div id="status_row" class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="input_status" disabled>
                                    <option>...</option>
                                    <option value="unpaid">unpaid</option>
                                    <option value="payment check">Payment Check</option>
                                    <option value="paid">paid</option>
                                    <option value="shipped">shipped</option>
                                    <option value="complete">complete</option>
                                    <option value="cancel">cancel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </form>
        
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openModalEdit(id) {
            $('#input_status').attr('disabled');
            $.get('/admin/transactions/get/'+ id, function (response) {
                $('#tracking_number_row').css('display', 'none');
                $('#status_row').css('display', 'none');
                $('#update_form').attr('action', '/admin/transactions/'+ response.id +'/update');
                
                if (response.status === 'paid') {
                    $('#tracking_number_row').css('display', 'block');
                    $('#tracking_number').attr('disabled', false);
                } else if (response.status == 'unpaid' || response.status == 'payment check') {
                    $('#status_row').css('display', 'block');
                    $('#input_status').attr('disabled', false);
                    $('#input_status').val(response.status);
                }
            });
        }

        $(document).ready( function () {
            var table = $('#datatables-resource').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('admin.transaction.list') !!}",
                rowId: 'id',    
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'name', name: 'name' },
                    { data: 'product', name: 'product' },
                    { data: 'status', name: 'status' },
                    { data: 'amount', name: 'amount' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                order: [0, 'desc'],
            });

            $('.open_modal_edit').click(function () {
                alert('clicked');
            });

            $('#status').change(function () {
                var status = $(this).val();
                table.search(status).draw();
            });
        });
    </script>
@endsection