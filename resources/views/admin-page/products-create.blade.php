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
    </style>
@endsection
@section('content')
    <!-- MAIN CONTENT-->
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title-1 m-b-25">Create Product</h2>
        </div>
        <div class="col-lg-4 text-right">
            <a href="/admin/products" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{-- TODO: make sure the images uploaded --}}
            <div class="card">
                {{-- <div class="card-header">Credit Card</div> --}}
                <div class="card-body">
                    {{-- <div class="card-title">
                        <h3 class="text-center title-2">Cooming Soon</h3>
                    </div> --}}
                    <form action="/admin/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="images" class="control-label mb-1">Product Image(s)</label>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary btn-block">
                                    Upload<input name="images[]" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div>
                            <i class="fa fa-plus imgAdd"></i>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label mb-1">Price</label>
                            <input name="price" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label mb-1">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="weight" class="control-label mb-1">Weight</label>
                            <input name="weight" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="has_size" class="form-check-label ">
                                        <input type="checkbox" id="has_size" name="has_size" value="1" class="form-check-input">Has Size
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                <span>Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
@section('script')
    <script>
    $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary btn-block">Upload<input type="file" name="images[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });

    $(document).on("click", "i.del" , function() {
        $(this).parent().remove();
    });

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
    </script>
@endsection