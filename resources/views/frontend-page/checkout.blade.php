@extends('frontend-page.main')

@section('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
    <section id="checkout">
        <div class="checkout_loader_wrapper">
            <img src="{{ asset('images/fstvlst.gif') }}" alt="">
        </div>
        <ul class="nav nav-pills container">
            <li id="menu1-nav" class="menu-session-checkout active"><a data-toggle="tab" href="#menu1">ALAMAT PRENGIRIMAN
                <span class="angel"><i class="fa fa-angle-right fa-lg"></i></span></a>
            </li>
                <li id="menu2-nav" class="menu-session-checkout disabled">
                    <a id="link-2" class="disabled-all" data-toggle="tab" href="#menu2">PILIH AGEN PENGIRIMAN
                        <span class="angel"><i class="fa fa-angle-right fa-lg"></i></span>
                    </a>
            </li>
            <li id="menu3-nav" class="menu-session-checkout disabled">
                <a id="link-3" class="disabled-all" data-toggle="tab" href="#menu3">ULASAN PESANAN</a>
            </li>
        </ul>
        <div class="tab-content container">
            <div class="row">
                <form action="/checkout-store" method="post" id="checkout-form">
                    @csrf
                    <input type="hidden" name="account_id" value="{{ Auth::guard('account')->user()->id }}">
                    @php $quantity = 0; $amount = 0; @endphp
                    @foreach ($items as $key => $item)
                        @php
                            $subTotal = $item->product_price*$item->product_quantity;
                            $quantity += $item->product_quantity;
                            $amount += $subTotal;
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
                    <div class="col-xs-12 col-md-4 tab-pane fade in active" id="menu1">
                        <div class="check-form">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input disabled type="text" value="{{ Auth::guard('account')->user()->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input disabled type="email" value="{{ Auth::guard('account')->user()->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input disabled type="text" value="{{ Auth::guard('account')->user()->phone }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" name="address" value="{{ Auth::guard('account')->user()->address }}" class="form-control" required>
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
                                <button data-toggle="tab" id="btn-submit1" class="btn btn-danger btn-block btn-submit" disabled data-target="#menu2">LANJUT</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 tab-pane fade" id="menu2">
                        <div class="check-form">
                            <div class="form-group">
                                <label for="">Pilih Kurir</label>
                                <select disabled class="form-control" name="courier_name" id="courier_name">
                                    <option>...</option>
                                    <option value="ambil">Ambil di LIB</option>
                                    <option value="jnt">J&T</option>
                                </select>
                            </div>
                            <div class="form-group courier_service_wrapper">
                                <label for="">Pilih Servis</label>
                                <select disabled id="courier_services" class="form-control" required>
                                    <option value="">...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment">Pembayaran</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            <input type="radio" name="payment_method" value="direct_bank_transfer" checked>
                                            Bank Transfer (Verifikasi Manual)
                                        </label>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="payment_method" value="others">
                                            Transfer Virtual Account (Verifikasi Otomatis)
                                        </label>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="form-group" id="payment_bank_group">
                                <label for="payment_bank">Pilih Bank</label>
                                <select disabled class="form-control" name="payment_bank" id="payment_bank">
                                    {{-- <option>...</option> --}}
                                    <option value="bca">BCA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button data-toggle="tab" id="btn-submit2" class="btn btn-danger btn-block btn-submit" disabled data-target="#menu3">LANJUT</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 tab-pane fade" id="menu3">
                        <div class="check-form">
                        <p class="nomargin">Item</p>
                        @foreach ($items as $item)
                            <div class="row">
                                <div class="col-xs-4">
                                    <img class="last-chck" src="{!! $item->product_image !!}" alt="product image">
                                </div>
                                <div class="col-xs-4">
                                    <h6>{{ $item->product_name }}</h6>
                                    @if ( isset($item->product_size) )
                                    <p class="nomargin">Ukuran : {{ $item->product_size }}</p>
                                    @endif
                                    <p class="nomargin">Jumlah : {{ $item->product_quantity }}</p>
                                    <p>Harga : {{ $item->product_price }}</p>
                                </div>
                                <div class="col-xs-4">
                                    <input type="hidden" class="product_prices" value="{{ $item->product_price*$item->product_quantity }}">
                                    <h6>Rp. {{ $item->product_price*$item->product_quantity }}</h6>
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
                            <button disabled type="submit" id="btn-submit3" class="btn btn-danger btn-block" id="submit-button">BAYAR</button>
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

        function resetCourierFee() {
            $('#courier_fee').html(0);
            $('#courier_fee_field').val(0);
            $('#courier_services').children('option:not(:first)').remove();
        }

        $( "#subdistrict_text" ).autocomplete({
            source: "/api/subdistrict",
            minLength: 3,
            select: function( event, ui ) {
                $('#city_id').val(ui.item.id);
                $('#subdistrict_id').val(ui.item.subdistrict_id);
                $('.postal_code_field').val(ui.item.postal_code);
                $('#city_field').val(ui.item.city_name);
                $('#province_field').val(ui.item.province_name);
                $('#courier_name').val(0);
                resetCourierFee();
                checkFirstForm();
            }
        });

        $('input[name=address]').change(function () {
            checkFirstForm();
        });
        $('#payment_bank').change(function () {
            checkSecondForm();
        });

        function checkFirstForm() {
            var empty = $('#menu1').find("input").filter(function() {
                return this.value === "";
            });
            $('#btn-submit1').attr('disabled', false);
            $('#link-2').css('pointer-events', 'auto');
            $('#menu2-nav').removeClass('disabled');
            toggleFormTwo(true);
            if(empty.length) {
                $('#btn-submit1').attr('disabled', true);
                $('#link-2').css('pointer-events', 'none');
                $('#menu2-nav').addClass('disabled');
                toggleFormTwo(false);
            }
        };

        function checkSecondForm() {
            var empty = $('#menu2').find("select").filter(function() {
                return this.value === "";
            });
            $('#btn-submit2').attr('disabled', false);
            $('#btn-submit3').attr('disabled', false);
            $('#link-3').css('pointer-events', 'auto');
            $('#menu3-nav').removeClass('disabled');
            if(empty.length) {
                $('#btn-submit2').attr('disabled', true);
                $('#btn-submit3').attr('disabled', true);
                $('#link-3').css('pointer-events', 'none');
                $('#menu3-nav').addClass('disabled');
            }
        }

        function toggleFormTwo(active) {
            $('#courier_name').attr('disabled', true);
            $('#courier_services').attr('disabled', true);
            $('#payment_bank').attr('disabled', true);
            $('#courier_name').val(null);
            $('#courier_services').val(null);
            $('#payment_bank').val(null);
            resetCourierFee();
            if (active) {
                $('#courier_name').attr('disabled', false);
                $('#courier_services').attr('disabled', false);
                $('#payment_bank').attr('disabled', false);
            }
        }

        $('#courier_name').change(function () {
            checkSecondForm();
            if ($(this).val() !== 'ambil') {
                $('#courier_services').attr('required', true);
                $('.courier_service_wrapper').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: '/api/get-shipping-cost',
                    data: {
                        'origin': '419',
                        'originType': 'city',
                        'destination': $('#city_id').val(),
                        'destinationType': 'city',   
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
            } else if ($(this).val() === 'ambil' || $(this).val() === null) {
                $('.courier_service_wrapper').css('display', 'none');
                $('#courier_services').attr('required', false);
                resetCourierFee();
            }
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
            // else if (this.value == 'others') {
            //     $('#payment_bank_group').css('display', 'none');
            //     $('#payment_bank').attr('disabled', true);
            //     useMidtrans = true;
            // }
        });

        $('#checkout-form').submit(function (evt) {
            evt.preventDefault();

            $('.checkout_loader_wrapper').css('display', 'block');
            
            $.post('/checkout-store',$('#checkout-form').serialize(), function(response) {
                if (response === 'failed') {
                    location.reload();
                }
                const {status, data} = response;
                if(status==='success') {
                    localStorage.removeItem('simpleCart_items')
                    if (!useMidtrans) {
                        window.location = '/thank-you';
                    }
                    // else if (useMidtrans) {
                    //     $.post('/charge',JSON.stringify(data), function(success) {
                    //         console.log(success)
                    //         const charge = JSON.parse(success)
                    //         snap.pay(charge.token, {
                    //             onSuccess: function(result){
                    //                 console.log('success');
                    //                 // handlePaymentResponse(result);
                    //                 window.location = '/thank-you';
                    //             },
                    //             onPending: function(result){
                    //                 console.log('pending');
                    //                 // handlePaymentResponse(result);
                    //                 window.location = '/thank-you';
                    //             },
                    //             onError: function(result){
                    //                 console.log('error');
                    //                 // handlePaymentResponse(result);
                    //             },
                    //             onClose: function(){console.log('customer closed the popup without finishing the payment');}
                    //         });
                    //     })
                    // }
                }
            })
        });

        $('#courier_services').change(function () {
            checkSecondForm();
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