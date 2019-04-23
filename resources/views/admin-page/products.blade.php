@extends('index')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title-1 m-b-25">Product List </h2>
        </div>
        <div class="col-lg-4 text-right">
            <a href="/admin/products/create" class="btn btn-success">Add Product</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning" id="datatables-resource">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Created at</th>
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
                ajax: "{!! route('admin.product.list') !!}",
                rowId: 'id',    
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'thumbnail', name: 'thumbnail' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });

            $('#datatables-resource tbody').on('click', 'tr', function () {
                var id = table.row( this ).id();
                window.location = `/admin/products/item/${id}`
            });
        });
    </script>
@endsection