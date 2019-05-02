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
                            {{-- @lang('boxset.open_pre_order') @lang('index.right.date') --}}
                            <a href="#" data-toggle="modal" data-target="#modal-product" data-id="6" class="btn btn-danger btn-block btn-submit buy-boxset-btn single-product">Beli Bokset</a>
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
@endsection

@section('script')
    <script src="{{asset('frontend/js/simpleCart.js')}}"></script>
    <script>
        function getThumbnail(thumbnail) {
            if ('{{ env('AWS_BUCKET') }}' === 'fstvlst-bucket') {
                return 'https://fstvlst-bucket.s3.ap-southeast-1.amazonaws.com/'+ thumbnail;
            } else if ('{{ env('AWS_BUCKET') }}' === 'fstvlst-bucket-staging') {
                return 'https://fstvlst-bucket-staging.s3.ap-southeast-1.amazonaws.com/' + thumbnail;
            }
        }
        $(document).ready(function () {
            /* Fungsi formatRupiah */
            function formatRupiah(angka){
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
                return 'Rp. ' + rupiah;
            }

            // simple cart init
            var selectedSize = ''
            $('.item_add').attr('disabled')
            $('.sizes').click(function () {
                var size = $(this).data('value')
                selectedSize = size
                $('.sizes').map(function (size) {
                    $(this).removeClass('active');
                });
            })

           $('.single-product').click(function () {
                selectedSize = ''
                $('#product_images .carousel-item').not(':first').remove();
                $('#product-sizes').css('display', 'none');
                $('#product-sizes').removeClass('show');
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
                    $('#product_image').attr('src', getThumbnail(response.thumbnail));
                    console.log(getThumbnail(response.thumbnail));
                    if (response.product_images.length >= 1) {
                        response.product_images.map(function (image) {
                            if (image.image !== response.thumbnail) {
                                $('#product_images').append('<div class="item carousel-item">' +
                                    '<div><img class="item_image" src="'+ getThumbnail(image.image) +'" alt=""></div>' +
                                '</div>');
                            }
                        });
                    }
                    if (response.has_size) {
                        $('#product-sizes').css('display', 'block');
                        $('#product-sizes').addClass('show');
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
                                            '<span class="item-info">' +
                                                '<span><h5>'+ item.get('name') +'</h5></span>' +
                                                '<span><small>Ukuran : '+ item.get('size') +'</small></span>' +
                                                '<span><small>Jumlah : '+ item.quantity() +' </small></span>' +
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
                    if ( $('#product-sizes').hasClass('show') && selectedSize === '' ) {
                        item.set('size', 'M')
                    }
                    $('.checkout_btn_wrapper').css('display', 'block');
                    $('.empty_card_wrapper').css('display', 'none');
                },
                afterAdd: function () {
                    $('#modal-product').modal('hide');
                    $('.dropdown-cart').toggleClass('open');
                },
                beforeRemove: function (item) {
                    if ( (simpleCart.quantity() - item.quantity()) === 0 ) {
                        $('.checkout_btn_wrapper').css('display', 'none');
                        $('.empty_card_wrapper').css('display', 'block');
                    }
                },
            })

            function isCartEmpty() {
                if (simpleCart.quantity() === 0) {
                    $('.checkout_btn_wrapper').css('display', 'none');
                } else if (simpleCart.quantity() !== 0) {
                    $('.empty_card_wrapper').css('display', 'none');
                }
            }

            // handle dropdown
            $('li.dropdown.dropdown-cart a').on('click', function (event) {
                $(this).parent().toggleClass('open');
            });
            // listen click outside the dropdown body and dismiss the dropdown
            $('body').on('click', function (e) {
                if (!$('li.dropdown.dropdown-cart').is(e.target) 
                    && $('li.dropdown.dropdown-cart').has(e.target).length === 0 
                    && $('.open').has(e.target).length === 0
                ) {
                    $('li.dropdown.dropdown-cart').removeClass('open');
                }
            });

            simpleCart.bind( 'load' , function(){
                isCartEmpty();
            });

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
            // var input = ('#item_qty');
            // $(".btn-number").click(function(){
            //     if ($(this).hasClass('btn-plus')) {
            //         // input.val(parseInt(input.val())+1);
            //     } else if (input.val()>=1) {
            //         // input.val(parseInt(input.val())-1);
            //     }
            // });
        })
    </script>
@endsection