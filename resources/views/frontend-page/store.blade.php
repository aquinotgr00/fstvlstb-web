@extends('frontend-page.main')

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
                                    <div class="col-md-4 col-sm-6" style="margin-bottom:1rem; min-height:350px;">
                                        <!-- PRODUCT CONTAINER, identified by the class "sc-product-item"  -->
                                        <div class="sc-product-item">
                                            <!-- PRODUCT IMAGE, identified by data-name="product_image"  -->
                                            <img style="width: 100%;" data-name="product_image" src="http://placehold.it/250x150/2aabd2/ffffff?text=Product+1" alt="...">
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
                                            <button class="sc-add-to-cart btn btn-success">Add to cart</button>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            CART
                        </div>
                        <div class="panel-body">
                            <div class="media">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#">
                                            <img style="width: 100%;" src="http://placehold.it/250x150/2aabd2/ffffff?text=Product+2" alt="product">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="media-heading">Product 2</h4>
                                        ...
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="text-right">
                                <button class="btn btn-info">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Initialize the leaveStep event
        // $("#smartcart").on("cartSubmitted", function(evt) {
        //     evt.preventDefault();
        //     alert("Cart is submitted");
        // });

        $('#smartcart').smartCart({
            currencySettings: {
                locales: 'id-ID', // A string with a BCP 47 language tag, or an array of such strings
                currencyOptions:  {
                    style: 'currency', 
                    currency: 'IDR', 
                    currencyDisplay: 'symbol'
                }
            }
        });
        // $('.sc-add-to-cart').click(function (evt) {
        //     evt.preventDefault()
        //     var productId = $(this).data('id')
        //     console.log(productId)
        // })
    })
</script>
@endsection