@extends('frontend-page.main')

@section('css')
    <link rel="stylesheet" href="{{asset('frontend/css/smart_cart.css')}}">
@endsection

@section('content')
    <section id="NIF">
        <div class="container">
            <div class="row">
                {{-- PRODUCT LIST --}}
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Products
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- BEGIN PRODUCTS -->
                                @foreach ($products as $item)
                                    <div class="col-md-4 col-sm-6" style="margin-bottom:1rem;">
                                        <!-- PRODUCT CONTAINER, identified by the class "sc-product-item"  -->
                                        <div class="sc-product-item" style="min-height:420px;">
                                            <!-- PRODUCT IMAGE, identified by data-name="product_image"  -->
                                            <img style="width: 100%;" data-name="product_image" src="{!!Storage::disk('s3')->url($item->thumbnail)!!}" alt="...">
                                            <!-- PRODUCT NAME, identified by data-name="product_name" or can be an element with name="product_name"  -->
                                            <h4 data-name="product_name">{{ $item->name }}</h4>
                                            <!-- PRODUCT DESCRIPTION, identified by data-name="product_desc" or can be an element with name="product_desc"  -->
                                            <p data-name="product_desc">{{ $item->description }}</p>
                                            <hr class="line">

                                            @if ($item->has_size)
                                                <div class="form-group">
                                                    <label>Size: </label>
                                                    <select name="product_size" class="form-control input-sm">
                                                        <option>S</option>
                                                        <option>M</option>
                                                        <option>L</option>
                                                    </select>
                                                </div>
                                            @endif
                                            <!-- PRODUCT PRICE, identified by name="product_price" or can be an element with data-name="product_price"  -->
                                            <input name="product_price" value="{{ $item->price }}" type="hidden" />
                                            <!-- PRODUCT ID, identified by name="product_id" or can be an element with data-name="product_id"  -->
                                            <input name="product_id" value="{{ $item->id }}" type="hidden" />
                                            <input type="hidden" name="product_weight" value="{{ $item->weight }}">
                                            <!-- ADD TO CART BUTTON, identified by class="sc-add-to-cart"  -->
                                            <button style="position:absolute;bottom:0;" class="sc-add-to-cart btn btn-success">Add to cart</button>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- END PRODUCTS -->
                            </div>
                        </div>
                    </div>
                </div>
                {{-- CART --}}
                <div class="col-md-4">
                    <form action="/checkout" method="POST">
                        @csrf
                        <!-- SmartCart element -->
                        <div id="smartcart"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="{{asset('frontend/js/jquery.smartCart.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#smartcart').smartCart({
            cartItemTemplate: '<img class="img-responsive pull-left" src="{product_image}" /><h4 class="list-group-item-heading">{product_name} ({product_size})</h4><p class="list-group-item-text">{product_desc}</p>',
            currencySettings: {
                locales: 'id-ID', // A string with a BCP 47 language tag, or an array of such strings
                currencyOptions:  {
                    style: 'currency', 
                    currency: 'IDR', 
                    currencyDisplay: 'symbol'
                }
            }
        });
    })
</script>
@endsection