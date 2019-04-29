@extends('frontend-page.main')
@section('content') 
    <section id="boxset">
        <div class="container">
            <div class="row row-layout">
                {{-- product list --}}
                <div class="col-md-4">
                    <h2 class="text-warning">@lang('boxset.peek')</h2>
                    <br/>
                    <h2 class="nomargin">@lang('boxset.boxset')</h2>
                    <h2 class="nomargin">@lang('index.left.heading')</h2>
                    <h2 class="nomargin">@lang('boxset.edition')</h2>
                    <br/><br/>
                    <ul class="treklist nomargin">
                        <li>
                            <div class="number">@lang('index.01')</div>
                            <div class="title">@lang('index.right.kaos')</div>
                        </li>
                        <li>
                            <div class="number">@lang('index.02')</div>
                            <div class="title">@lang('index.right.buku')</div>
                        </li>
                        <li>
                            <div class="number">@lang('index.03')</div>
                            <div class="title">@lang('index.right.kalung')</div>
                        </li>
                        <li>
                            <div class="number">@lang('index.04')</div>
                            <div class="title">@lang('index.right.emblem')</div>
                        </li>
                        <li>
                            <div class="number">@lang('index.05')</div>
                            <div class="title">@lang('index.right.lakban')</div>
                        </li>
                    </ul>
                    <br/>
                    <div class="hidden-xs">
                        <h2>
                            @lang('boxset.open_pre_order') @lang('index.right.date')
                        </h2>
                        <br/><br/>
                        <br/><br/>
                        <div class="hidden-xs">
                            <br/><br/><br/><br/>
                        </div>
                        <p>
                            @lang('boxset.description')
                        </p>
                    </div>
                </div>
                {{-- product big image --}}
                <div class="col-md-8">
                    <div class="main-image">
                        <img src="{{ asset('frontend/images/boxset-image.png')}}" alt="">
                        <div class="marker-container">
                            <a href="#" class="marker single-product" style="top:25%;left:12%" data-toggle="modal" data-target="#modal-product" data-id="1"><span class="number">01</span></a>
                            <a href="#" class="marker single-product" style="top:19%;left:48%" data-toggle="modal" data-target="#modal-product" data-id="5"><span class="number">05</span></a>
                            <a href="#" class="marker single-product" style="top:55%;left:48%" data-toggle="modal" data-target="#modal-product" data-id="3"><span class="number">03</span></a>
                            <a href="#" class="marker single-product" style="top:45%;left:88%" data-toggle="modal" data-target="#modal-product" data-id="2"><span class="number">02</span></a>
                            <a href="#" class="marker single-product" style="top:60%;left:7%" data-toggle="modal" data-target="#modal-product" data-id="4"><span class="number">04</span></a>
                        </div>
                    </div>
                    <div class="visible-xs">
                        <br/>
                        <div class="row">
                            <div class="col-xs-8">
                                <h2 style="font-size: 30px;">
                                    @lang('boxset.pre-order') @lang('boxset.opened') <br/> 01/05/2019
                                </h2>  
                            </div>

                        </div>
                        <p>
                            @lang('boxset.description')
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- CART --}}
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="{{asset('frontend/js/simpleCart.js')}}"></script>
    <script>
        $(document).ready(function () {
            /* Fungsi formatRupiah */
            // function formatRupiah(angka, prefix){
            function formatRupiah(angka){
                // var number_string = angka.replace(/[^,\d]/g, '').toString(),
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    
                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
    
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                // return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                return 'Rp. ' + rupiah;
            }

            // simple cart init
            var selectedSize = ''
            $('.item_add').attr('disabled')
            $('.sizes').click(function () {
                var size = $(this).data('value')
                selectedSize = size
            })

           $('.single-product').click(function () {
                selectedSize = ''
                console.log(selectedSize)
                $('#product-sizes').css('display', 'none');
                var id = $(this).data('id');
                $.get(`/api/product/${id}`, function (response) {
                    $('.item_add').attr('disabled', false)
                    $('.item_productId').html(response.id);
                    $('input[name=product_price]').val(response.price);
                    $('#product-name').html(response.name);
                    $('.item_price').html(response.price);
                    $('.item_weight').html(response.weight);
                    $('#product-price').html(formatRupiah(response.price));
                    $('.item_desc').html(response.description);
                    if (response.has_size) {
                        $('#product-sizes').css('display', 'block');
                    }
                });
            }); 

            simpleCart.currency({
                code: "IDR",
                name: "Indonesian Rupiah",
                symbol: "Rp. ",
                delimiter: ".", 
                decimal: ",", 
                accuracy: 0
            });
            simpleCart({
                currency: 'IDR',
                checkout: { 
                    type: "SendForm" , 
                    url: "/checkout",
                    extra_data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        customItemName: $(this).get('item_name_1')
                    }, 
                },
                cartColumns: [
                    { view: function (item, column) {
                            var image = item.get('image')
                            return '<span class="item">' +
                                        '<span class="item-left">' +
                                            `<img class="img-chck" src="${image}" alt="">` +
                                            // p{{asset('frontend/images/gambar-cnth-2.jpg')}}
                                            '<span class="item-info">' +
                                                '<span><h5>'+ item.get('name') +'</h5></span>' +
                                                '<span><small>Ukuran : '+ item.get('size') +'</small></span>' +
                                                '<span><small>Jumlah : '+ item.quantity() +'</small></span>' +
                                                '<span><h5>'+ simpleCart.toCurrency(item.price()) +' x '+ item.quantity() +' = '+ simpleCart.toCurrency(item.price()*item.quantity()) +'</h5></span>' +
                                            '</span>' +
                                        '</span>' +
                                        '<span class="item-right item-remove">' +
                                            '<a href="javascript:;" class="btn btn-xs pull-right simpleCart_remove">x</a>' +
                                        '</span>' +
                                    '</span>'
                        },
                        attr: 'custom',
                    },
                ],
                beforeAdd: function (item) {
                    item.set('size', selectedSize)
                },
            }) 

            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })   
        })
    </script>
@endsection