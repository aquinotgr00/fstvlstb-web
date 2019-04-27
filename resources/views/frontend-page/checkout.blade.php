@extends('frontend-page.main')

@section('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
    <section id="checkout">
        <ul class="nav nav-pills container">
            <li id="menu1-nav" class="active"><a data-toggle="tab" href="#menu1">ALAMAT PRENGIRIMAN
                <span class="angel"><i class="fa fa-angle-right fa-lg"></i></span></a>
            </li>
                <li id="menu2-nav"><a data-toggle="tab" href="#menu2">PILIH AGEN PENGIRIMAN
                <span class="angel"><i class="fa fa-angle-right fa-lg"></i></span></a>
            </li>
            <li id="menu3-nav"><a data-toggle="tab" href="#menu3">ULASAN PESANAN</a></li>
        </ul>
        <div class="tab-content container">
            <div class="row">
                <form action="/checkout-store" method="post" id="checkout-form">
                    @csrf
                    <input type="hidden" name="account_id" value="{{ Auth::guard('account')->user()->id }}">
                    @php $quantity = 0; $amount = 0; @endphp
                    @foreach ($items as $key => $item)
                        @php
                            $quantity += $item->product_quantity;
                            $amount += $item->product_price;
                        @endphp
                        <input type="hidden" name="items[{{ $key }}][product_id]" value="{{ $item->product_id }}">
                        <input type="hidden" name="items[{{ $key }}][id]" value="{{ $item->product_id }}">
                        <input type="hidden" name="items[{{ $key }}][name]" value="{{ $item->product_name }}">
                        <input type="hidden" name="items[{{ $key }}][quantity]" value="{{ $item->product_quantity }}">
                        <input type="hidden" name="items[{{ $key }}][price]" value="{{ $item->product_price }}">
                        <input type="hidden" name="items[{{ $key }}][subtotal]" value="{{ $item->product_price*$item->product_quantity }}">
                        @if ( isset($item->product_size) )
                            <input type="hidden" name="items[{{ $key }}][size]" value="{{ $item->product_size }}">                                    
                        @endif
                    @endforeach
                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <div class="col-xs-4 tab-pane fade in active" id="menu1">
                        <div class="check-form">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" value="{{ Auth::guard('account')->user()->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="{{ Auth::guard('account')->user()->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" value="{{ Auth::guard('account')->user()->phone }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Kecamatan</label>
                                            <input type="hidden" name="city_id" id="city_id">
                                            <input type="hidden" name="subdistrict_id" id="subdistrict_id">
                                            <input class="form-control" type="text" name="subdistrict_text" id="subdistrict_text">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Kota</label>
                                            <input class="form-control" id="city_field" type="text" name="city_text" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Provinsi</label>
                                        <input class="form-control" id="province_field" type="text" name="province_text" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Kode Pos</label>
                                        <input class="postal_code_field" type="hidden" name="postal_code">
                                        <input class="form-control postal_code_field" type="number" name="postal_code_text" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button data-toggle="tab" class="btn btn-danger btn-block btn-submit" data-target="#menu2">LANJUT</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 tab-pane fade" id="menu2">
                        <div class="check-form">
                            <div class="form-group">
                                <label for="">Pilih Kurir</label>
                                <select class="form-control" name="courier_name" id="courier_name">
                                    <option>...</option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    <option value="tiki">Tiki</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Service</label>
                                <select id="courier_services" class="form-control">
                                    <option value="">...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment">Pembayaran</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="payment_method" value="direct_bank_transfer">
                                            Bank Transfer (Verifikasi Manual)
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="payment_method" value="others">
                                            Transfer Virtual Account (Verifikasi Otomatis)
                                        </label>
                                    </div>
                                </div>
                            </div>
                                {{-- TODO: add detail to each options --}}
                            <div class="form-group" id="payment_bank_group" style="display:none;">
                                <label for="payment_bank">Pilih Bank</label>
                                <select class="form-control" name="payment_bank" id="payment_bank" disabled>
                                    <option>...</option>
                                    <option value="bca">BCA</option>
                                    <option value="bni">BNI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button data-toggle="tab" class="btn btn-danger btn-block btn-submit" data-target="#menu3">LANJUT</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 tab-pane fade" id="menu3">
                        <div class="check-form">
                        <p class="nomargin">Item</p>
                        @foreach ($items as $item)
                            <div class="row">
                                <div class="col-xs-4">
                                    <img class="last-chck" src="images/gambar-cnth.jpg" alt="">
                                </div>
                                <div class="col-xs-4">
                                    <h6>{{ $item->product_name }}</h6>
                                    @if ( isset($item->product_size) )
                                    <p class="nomargin">Ukuran : {{ $item->product_size }}</p>
                                    @endif
                                    <p>Jumlah : {{ $item->product_quantity }}</p>
                                </div>
                                <div class="col-xs-4">
                                    <input type="hidden" class="product_prices" value="{{ $item->product_price }}">
                                    <h6>Rp. {{ $item->product_price }}</h6>
                                </div>
                            </div> 
                        @endforeach
                        </div>
                        <br/><br/><br/>
                        <div class="row">
                            <div class="col-xs-8">
                                <h6>ONGKOS KIRIM</h6>
                            </div>
                            <div class="col-xs-4">
                                <input id="courier_fee_field" type="hidden" name="courier_fee">
                                <h6 id="courier_fee">Rp. 0</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-8">
                                <h6>TOTAL HARGA</h6>
                            </div>
                            <div class="col-xs-4">
                                <h6 id="total_amount">Rp. 123.456,-</h6>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block" id="submit-button">BAYAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <br/><br/><br/>

    <div id="footer">
        <div class="visible-xs text-center mobilefooter">
            <h2>FSTVLST II. HAMPIR ROCK, NYARIS SENI</h2>
            <p>Terima kasih telah mengambil keputusan untuk mendukung FSTVLST.</p>
        </div>
        <div class="hidden-xs container">
            <h2 class="navbar-left">FSTVLST II. HAMPIR ROCK, NYARIS SENI</h2>
            <p class="navbar-right">Terimakasih telah mengambil keputusan untuk mendukung FSTVLST.</p>
        </div>
    </div>

    <!-- 
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
    -->
@endsection

@section('script')
    <script
        type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-Mk0Qk3hlWbNXlXV_"
    ></script>
    <script>
        $(document).ready(function () {
            var sum = 0;
            $(".product_prices").each(function(){
                sum += +$(this).val();
            });
            $("#total_amount").html('Rp. '+sum);
        });

        // TODO: add loading gif
        $( "#subdistrict_text" ).autocomplete({
            source: "/api/subdistrict",
            minLength: 3,
            select: function( event, ui ) {
                $('#city_id').val(ui.item.id);
                $('#subdistrict_id').val(ui.item.subdistrict_id);
                $('.postal_code_field').val(ui.item.postal_code);
                $('#city_field').val(ui.item.city_name);
                $('#province_field').val(ui.item.province_name);
            }
        });

        $('#courier_name').change(function () {
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
                    res.results[0].costs.map(function (service) {
                        var o = new Option(service.service, service.cost[0].value);
                        $(o).html(service.service);
                        $("#courier_services").append(o);
                    });
                }
            });
        });

        $('.btn-submit').click(function () {
            var target = $(this).data('target');
            $('#menu1-nav').removeClass('active');
            $('#menu2-nav').removeClass('active');
            $(`${target}-nav`).addClass('active');
        });

        var useMidtrans = false;

        $('input[type=radio][name=payment_method]').change(function() {
            if (this.value == 'direct_bank_transfer') {
                $('#payment_bank_group').css('display', 'block');
                $('#payment_bank').attr('disabled', false);
                useMidtrans = false;
            }
            else if (this.value == 'others') {
                $('#payment_bank_group').css('display', 'none');
                $('#payment_bank').attr('disabled', true);
                useMidtrans = true;
            }
        });

        $('#checkout-form').submit(function (evt) {
            evt.preventDefault();
            
            $.post('/checkout-store',$('#checkout-form').serialize(), function(response) {
                const {status, data} = response;
                if(status==='success') {
                    if (useMidtrans) {
                        $.post('/charge',JSON.stringify(data), function(success) {
                            console.log(success)
                            const charge = JSON.parse(success)

                            snap.pay(charge.token, {
                                onSuccess: function(result){
                                    console.log('success');
                                    // handlePaymentResponse(result);
                                    window.location = '/thank-you';
                                },
                                onPending: function(result){
                                    console.log('pending');
                                    // handlePaymentResponse(result);
                                    window.location = '/thank-you';
                                },
                                onError: function(result){
                                    console.log('error');
                                    // handlePaymentResponse(result);
                                },
                                onClose: function(){console.log('customer closed the popup without finishing the payment');}
                            });
                        })
                    }
                    window.location = '/thank-you';
                }
            })
            
            
        });

        $('#courier_services').change(function () {
            var sum = 0;
            var fee = +$(this).val();
            $('#courier_fee').html('Rp. '+fee);
            $('#courier_fee_field').val(fee);
            $(".product_prices").each(function(){
                sum += +$(this).val();
            });
            var total = +sum+fee;
            $("#total_amount").html('Rp. '+total);
        });
    </script>
@endsection