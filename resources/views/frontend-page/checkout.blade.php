@extends('frontend-page.main')

@section('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

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
                                    <label for="payment_bank">Pembayaran</label>
                                    <select class="form-control" name="payment_bank" id="payment_bank">
                                        <option>Silahkan Pilih Bank</option>
                                        <option value="bca">BCA</option>
                                        <option value="bni">BNI</option>
                                        <option value="mandiri">Mandiri</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat Lengkap Pengiriman</label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subdistrict">Kecamatan</label>
                                            <input type="hidden" name="city_id" id="city_id">
                                            <input type="hidden" name="subdistrict_id" id="subdistrict_id">
                                            <input class="form-control" type="text" name="subdistrict_text" id="subdistrict_text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="postal_code">Kode Pos</label>
                                            <input class="postal_code_field" type="hidden" name="postal_code">
                                            <input class="form-control postal_code_field" type="number" name="postal_code_text" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="courier_name">Kurir</label>
                                            <select class="form-control" name="courier_name" id="courier_name">
                                                <option>Pilih Kurir</option>
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">Tiki</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- TODO: user can choose which service --}}
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="courier_type">Layanan</label>
                                            <select class="form-control" name="courier_type" id="courier_type">
                                                <option>Pilih Layanan</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="courier_fee">Ongkos Kirim</label>
                                            <input class="courier_fee_field" type="hidden" name="courier_fee">
                                            <input class="form-control courier_fee_field" type="text" name="courier_fee_text" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="note">Catatan</label>
                                    <textarea class="form-control" name="note" id="note" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="text-right">
                                    <button class="btn btn-info" type="submit">Bayar</button>
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
                                            <h4 class="media-heading">
                                                {{ $item->product_name }}
                                                {{ (isset($item->product_size)) ? '('.$item->product_size.')' : '' }}
                                            </h4>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $item->product_desc }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Harga</td>
                                                        <td>{{ $item->product_price }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

@section('script')
    <script>
        $( "#subdistrict_text" ).autocomplete({
            source: "/api/subdistrict",
            minLength: 3,
            select: function( event, ui ) {
                $('#city_id').val(ui.item.id);
                $('#subdistrict_id').val(ui.item.subdistrict_id);
                $('.postal_code_field').val(ui.item.postal_code);
                // console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                // console.log(ui.item)
            }
        });

        $('#courier_name').change(function () {
            // console.log($(this).val());
            $.ajax({
                type: 'POST',
                url: '/api/get-shipping-cost',
                data: {
                    'origin': '419',
                    'destination': $('#city_id').val(),
                    'weight': '300',
                    'courier': $(this).val()
                },
                success: function (res) {
                    console.log(res.results);
                    console.log(res.results[0].costs[0].cost[0].value);
                    $('.courier_fee_field').val(res.results[0].costs[0].cost[0].value);
                }
            });
        });
    </script>
@endsection