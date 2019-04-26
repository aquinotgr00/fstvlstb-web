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
            <div class="table-responsive table--no-card m-b-40">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="status" id="status">
                                <option>Filter dari Status</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                                <option value="bank confirmation">Bank Confirmation</option>
                            </select>
                        </div>
                    </div>
                </div>
                <table class="table table-borderless table-striped table-earning" id="datatables-resource">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Created at</th>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>amount</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
@section('script')
    <script>
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
                ]
            });

            $('#datatables-resource tbody').on('click', 'tr', function () {
                var id = table.row( this ).id();
                window.location = `/admin/transactions/item/${id}`
            });

            $('#status').change(function () {
                console.log('changed');
                $('#datatables-resource').html = '';
            });
        });
    </script>
@endsection