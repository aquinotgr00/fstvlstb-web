@extends('frontend-page.main')

@section('content')
    <section id="NIF">
        <div class="container">
            <div class="row">
                {{-- CHECKOUT DETAIL FORM --}}
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DETAIL FORM
                        </div>
                        <form action="/checkout-finish" method="post">
                            @csrf
                            <input type="hidden" name="account_id" value="{{ Auth::guard('account')->user()->id }}">
                            @php $quantity = 0; $amount = 0; @endphp
                            @foreach ($items as $key => $item)
                                @php
                                    $quantity += $item->product_quantity;
                                    $amount += $item->product_price;
                                @endphp
                                <input type="hidden" name="items[{{ $key }}][product_id]" value="{{ $item->product_id }}">
                                <input type="hidden" name="items[{{ $key }}][quantity]" value="{{ $item->product_quantity }}">
                                <input type="hidden" name="items[{{ $key }}][price]" value="{{ $item->product_price }}">
                                <input type="hidden" name="items[{{ $key }}][subtotal]" value="{{ $item->product_price*$item->product_quantity }}">
                                @if ( isset($item->product_size) )
                                    <input type="hidden" name="items[{{ $key }}][size]" value="{{ $item->product_size }}">                                    
                                @endif
                            @endforeach
                            <input type="hidden" name="quantity" value="{{ $quantity }}">
                            <input type="hidden" name="amount" value="{{ $amount }}">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="address">Alamat Lengkap Pengiriman</label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subdistrict">Kecamatan</label>
                                            <input class="form-control" type="text" name="subdistrict_id" id="subdistrict_id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="postal_code">Kode Pos</label>
                                            <input class="form-control" type="number" name="postal_code" id="postal_code">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="courier_name">Kurir</label>
                                            <input class="form-control" type="text" name="courier_name" id="courier_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="courier_fee">Ongkos Kirim</label>
                                            <input class="form-control" value="0" type="text" name="courier_fee" id="courier_fee">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="note">Catatan</label>
                                    <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="text-right">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- PRODUCT CHECKOUT LIST --}}
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            PRODUCT LIST
                        </div>
                        <div class="panel-body">
                            <div class="media">
                                {{-- list --}}
                                {{-- TODO: edit product in checkout --}}
                                @foreach ($items as $item)
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-6">
                                            <a href="#">
                                                <img style="width: 100%;" src="http://placehold.it/250x150/2aabd2/ffffff?text=Product+2" alt="product">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="media-heading">{{ $item->product_name }}</h4>
                                            ...
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection