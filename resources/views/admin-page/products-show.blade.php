@extends('index')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title-1 m-b-25">{{ $product->name }} </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <img src="https://media.karousell.com/media/photos/products/2017/01/27/kaos_gap_polos_round_neck_hitam__black_1485501396_3b8c4a3a.png" alt="{{ $product->name   }}">
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong>Product Detail</strong>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>: {{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>: {{ $product->price }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button class="btn btn-primary">Edit Product</button>
                        <button class="btn btn-danger">Delete Product</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Transaction List</h2>

            <div class="row">
                <div class="col-lg-6">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="menu1-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="menu1" aria-selected="false">Paid</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="menu2-tab" data-toggle="tab" href="#menu2" role="tab" aria-controls="menu2" aria-selected="false">Batches</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right ">
                    <button type="button" class="btn btn-warning white-text" data-toggle="modal" data-target="#mediumModal">
                        Create a batch
                    </button>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning" id="datatables-resource">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Email</th>
                                    <th>Phone</th> --}}
                                    <th>Amount</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade active" id="menu1" role="tabpanel" aria-labelledby="menu1-tab">
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning" id="datatables-paid">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Email</th>
                                    <th>Phone</th> --}}
                                    <th>Amount</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade active" id="menu2" role="tabpanel" aria-labelledby="menu2-tab">
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning" id="datatables-batch">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Quantity</th>
                                    <th>Start production date</th>
                                    <th>End production date</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
@section('modal')
    {{-- CREATE BATCH FORM MODAL --}}
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/admin/production-batch" method="POST" id="create_batch_form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Create a batch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="start_production_date" class="control-label mb-1">Start Production Date</label>
                                        <input id="start_production_date" name="start_production_date" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="end_production_date" class="control-label mb-1">End Production Date</label>
                                    <input id="end_production_date" name="end_production_date" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="control-label mb-1">Notes</label>
                                <textarea name="notes" id="notes" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function () {

            $('#create_batch_form').submit(function (evt) {
                evt.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        console.log(data); // show response from the php script.
                    }
                });
            });

            // TODO: Continue simplified data table loadingitem
            // function loadDataTable(status) {
            //     $('#datatables-resource').DataTable({
            //         processing: true,
            //         serverSide: true,
            //         ajax: `{!! route('admin.transaction.item', ['id' => $product->id, 'status' => 'paid']) !!}`,
            //         columns: [
            //             { data: 'id', name: 'id' },
            //             { data: 'name', name: 'name' },
            //             { data: 'email', name: 'email' },
            //             { data: 'phone', name: 'phone' },
            //             { data: 'amount', name: 'amount' },
            //             { data: 'created_at', name: 'created_at' }
            //         ]
            //     });
            // }
            // $('#paid-data').click(function (e) {
            //     e.preventDefault();
            //     table
            //         .clear()
            //         .destroy();
            //     loadDataTable('unpaid');
            // });

            var table = $('#datatables-resource').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('admin.transaction.list-by-id', ['id' => $product->id, 'status' => 'unpaid']) !!}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    // { data: 'email', name: 'email' },
                    // { data: 'phone', name: 'phone' },
                    { data: 'amount', name: 'amount' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });

            $('#datatables-paid').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('admin.transaction.list-by-id', ['id' => $product->id, 'status' => 'paid']) !!}",
                buttons: [
                    {
                        text: 'My button',
                        action: function ( e, dt, node, config ) {
                            alert( 'Button activated' );
                        }
                    }
                ],
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    // { data: 'email', name: 'email' },
                    // { data: 'phone', name: 'phone' },
                    { data: 'amount', name: 'amount' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });

            // TODO: production batch list won't show anything
            $('#datatables-batch').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('admin.production-batch.list-by-id', $product->id) !!}",
                buttons: [
                    {
                        text: 'My button',
                        action: function ( e, dt, node, config ) {
                            alert( 'Button activated' );
                        }
                    }
                ],
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'quantity', name: 'quantity' },
                    { data: 'start_production_date', name: 'start_production_date' },
                    { data: 'end_production_date', name: 'end_production_date' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
@endsection