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
                <table class="table table-borderless table-striped table-earning" id="datatables-resource">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Created at</th>
                            <th>Name</th>
                            <th>Products</th>
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
                    { data: 'amount', name: 'amount' },
                ]
            });

            // $('#datatables-resource tbody').on('click', 'tr', function () {
            //     var id = table.row( this ).id();
            //     window.location = `/admin/products/item/${id}`
            // });
        });
    </script>
@endsection