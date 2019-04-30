@extends('index')
@section('css')
    <style>
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color:#fff;
            background-size: cover;
        background-repeat:no-repeat;
            display: inline-block;
        box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .imgUp
    {
        margin-bottom:15px;
    }
    .del
    {
        position:absolute;
        top:0px;
        right:15px;
        width:30px;
        height:30px;
        text-align:center;
        line-height:30px;
        background-color:rgba(255,255,255,0.6);
        cursor:pointer;
    }
    .imgAdd
    {
        width:30px;
        height:30px;
        border-radius:50%;
        background-color:#4bd7ef;
        color:#fff;
        box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
        text-align:center;
        line-height:30px;
        margin-top:0px;
        cursor:pointer;
        font-size:15px;
    }
    span.warning_image { color: red; display: none; }
    </style>
@endsection
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
                {{-- TODO: show the true image --}}
                <img src="{!! Storage::disk('s3')->url($product->thumbnail) !!}" alt="{{ $product->name   }}">
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
                        <tr>
                            <th>Description</th>
                            <td>: {{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>: {{ $product->weight }}</td>
                        </tr>
                        <tr>
                            <th>Has Size</th>
                            <td>: {{ $product->has_size }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button data-toggle="modal" data-target="#modal-product-edit" class="btn btn-primary">Edit Product</button>
                        &nbsp;
                        <form class="form-inline float-right" action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
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
                                    <th>Email</th>
                                    <th>Phone</th>
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
                                    <th>Email</th>
                                    <th>Phone</th>
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
    </div> --}}
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

    {{-- edit product modal --}}
    <div class="modal" id="modal-product-edit">
        <div class="modal-dialog">
            <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <form id="edit-product" action="/admin/products/item/{{ $product->id }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <div class="form-group row">
                        <label for="image">Gambar </label>
                        <div class="col-sm-12">
                            <span class="warning_image">sebuah produk butuh sebuah gambar</span>
                            {{-- <div class="col-sm-12 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary btn-block">
                                    Upload<input name="images[]" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div> --}}
                            <i class="fa fa-plus imgAdd"></i>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-12 col-form-label">Nama</label>
                        <div class="col-sm-12">
                            <input value="{{ $product->name }}" type="text" class="form-control" name="name" id="name" placeholder="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-12 col-form-label">Price</label>
                        <div class="col-sm-12">
                            <input value="{{ $product->price }}" type="number" class="form-control" name="price" id="price" placeholder="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="weight" class="col-sm-12 col-form-label">Description</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="description" id="" rows="3">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="weight" class="col-sm-6 col-form-label">Weight (gr)</label>
                        <div class="col-sm-6">
                            <input value="{{ $product->weight }}" type="number" class="form-control" name="weight" id="weight" placeholder="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="has_size" class="col-sm-6 col-form-label">Has Size</label>
                        <div class="col-sm-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="has_size" id="has_size" value="1" @if($product->has_size) checked @endif>
                                Has size
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" id="btn-submit">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        
            </form>
        
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready( function () {

            $('#edit-product').submit(function () {
                console.log('submitted')
            })

            $(".imgAdd").click(function(){
                $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-12 imgUp"><div class="imagePreview"></div><label class="btn btn-primary btn-block">Upload<input type="file" name="images[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
                $('#btn-submit').attr('disabled', false);
                $('.warning_image').css('display', 'none');
            });

            $(document).on("click", "i.del" , function() {
                $(this).parent().remove();
                if ( $('.imgUp').length == 0 ) {
                    $('#btn-submit').attr('disabled', true);
                    $('.warning_image').css('display', 'block');
                }
            });

            @if ( count($product->productImages) >= 2 )
                @foreach($product->productImages as $key => $image)
                    $('.imgAdd').closest(".row").find('.imgAdd').before('<div class="col-sm-12 imgUp"><div class="imagePreview imagePreview{!! $key !!}"></div><label class="btn btn-primary btn-block">Upload<input type="file" name="images[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');

                    var key = '{!! $key !!}';

                    var ele = $(`.imagePreview${key}`);

                    var uploadFile = $('.uploadFile');

                    if (key == 0) {
                        console.log(key);
                        uploadFile.closest(".imgUp").find(".imagePreview").css("background-image", "url('{!! Storage::disk('s3')->url($image->image) !!}')");
                    } else if (key != 0) {
                        console.log(key);
                        ele.css("background-image", "url('{!! Storage::disk('s3')->url($image->image) !!}')");
                    }
                    // }
                @endforeach
            @elseif ( count($product->productImages) == 1 )
                $('.imgAdd').closest(".row").find('.imgAdd').before('<div class="col-sm-12 imgUp"><div class="imagePreview"></div><label class="btn btn-primary btn-block">Upload<input type="file" name="images[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
                $('.imagePreview').css('background-image', 'url("{!! Storage::disk('s3')->url($product->thumbnail) !!}")')
            @endif

            $(function() {
                $(document).on("change",".uploadFile", function()
                {
                    var uploadFile = $(this);
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
            
                    if (/^image/.test( files[0].type)){ // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file
                        
                        reader.onloadend = function(){ // set image data as background of div
                            //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                            uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                        }
                    }
                
                });
            });

            // $('#create_batch_form').submit(function (evt) {
            //     evt.preventDefault();
            //     var form = $(this);
            //     var url = form.attr('action');
            //     $.ajax({
            //         type: "POST",
            //         url: url,
            //         data: form.serialize(), // serializes the form's elements.
            //         success: function(data)
            //         {
            //             // console.log(data); // show response from the php script.
            //             location.reload();
            //         }
            //     });
            // });

            // TODO: Continue simplified data table loadingitem
            // function loadDataTable(status) {
            //     $('#datatables-resource').DataTable({
            //         processing: true,
            //         serverSide: true,
            //         ajax: `{!! route('admin.transaction.list-by-id', ['id' => $product->id, 'status' => 'paid']) !!}`,
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

            // var table = $('#datatables-resource').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{!! route('admin.transaction.list-by-id', ['id' => $product->id, 'status' => 'unpaid']) !!}",
            //     columns: [
            //         { data: 'id', name: 'id' },
            //         { data: 'name', name: 'name' },
            //         // { data: 'email', name: 'email' },
            //         // { data: 'phone', name: 'phone' },
            //         { data: 'amount', name: 'amount' },
            //         { data: 'created_at', name: 'created_at' }
            //     ]
            // });

            // $('#datatables-paid').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{!! route('admin.transaction.list-by-id', ['id' => $product->id, 'status' => 'paid']) !!}",
            //     columns: [
            //         { data: 'id', name: 'id' },
            //         { data: 'name', name: 'name' },
            //         // { data: 'email', name: 'email' },
            //         // { data: 'phone', name: 'phone' },
            //         { data: 'amount', name: 'amount' },
            //         { data: 'created_at', name: 'created_at' }
            //     ]
            // });

            // var batchTable = $('#datatables-batch').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{!! route('admin.production-batch.list-by-id', $product->id) !!}",
            //     rowId: 'id',    
            //     columns: [
            //         { data: 'id', name: 'id' },
            //         { data: 'batch_qty', name: 'quantity' },
            //         { data: 'start_production_date', name: 'start_production_date' },
            //         { data: 'end_production_date', name: 'end_production_date' },
            //         { data: 'created_at', name: 'created_at' }
            //     ]
            // });
            
            // $('#datatables-batch tbody').on('click', 'tr', function () {
            //     var id = batchTable.row( this ).id();
            //     window.location = `/admin/production-batch/${id}`;
            // });
        });
    </script>
@endsection