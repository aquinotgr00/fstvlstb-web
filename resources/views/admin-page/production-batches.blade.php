@extends('index')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title-1 m-b-25">Production List </h2>
        </div>
        <div class="col-lg-4 text-right">
            <button class="btn btn-primary">Input Tracking Number</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning" id="datatables-resource">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Status</th>
                            <th>Tracking Number</th>
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
                ajax: "{!! route('admin.production.list', $productionBatch->id) !!}",
                columns: [
                    { data: 'transaction_id', name: 'transaction_id' },
                    { data: 'status', name: 'status' },
                    { data: 'tracking_number', name: 'tracking_number' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
@endsection