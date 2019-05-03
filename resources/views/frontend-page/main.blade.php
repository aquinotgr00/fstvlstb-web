<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>FSTVLST</title>

  <!-- CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('dist/css/plyr.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}">

  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="{{asset('dist/js/plyr.js')}}"></script>
  <script src="{{asset('frontend/js/myScript.js')}}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138417080-1"></script>

  {{-- another additional css --}}
  @yield('css')
  <script>
    $.ajaxSetup({
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-138417080-1');
  </script>
</head>

<body>
  @include('frontend-page.navbar')
  @yield('content')
  @include('frontend-page.modal')
  @yield('script')
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
                split       = number_string.split(','),
                sisa        = split[0].length % 3,
                rupiah        = split[0].substr(0, sisa),
                ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
    
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
                $('.loader_wrapper').css('display', 'block');
                $('#product_images .carousel-item').not(':first').remove();
                $('#product-sizes').css('display', 'none');
                $('#product-sizes').removeClass('show');
                $('#item_qty').val(1);
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
                    if (response.product_images.length >= 1) {
                        response.product_images.map(function (image) {
                            if (image.image !== response.thumbnail) {
                                $('#product_images').append('<div class="item carousel-item">' +
                                    '<div><img class="product_add_images" src="'+ getThumbnail(image.image) +'" alt=""></div>' +
                                '</div>');
                            }
                        });
                    }
                    if (response.has_size) {
                        $('#product-sizes').css('display', 'block');
                        $('#product-sizes').addClass('show');
                    }
                    $('#product_images .carousel-item:first-child').addClass('active');
                    $('.loader_wrapper').css('display', 'none');
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
                                            '<a href="javascript:;" class="btn btn-xs pull-right simpleCart_remove"><span class="fa fa-trash"></span></a>' +
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
                    updateMobileCart();
                },
                beforeRemove: function (item) {
                    if ( (simpleCart.quantity() - item.quantity()) === 0 ) {
                        $('.checkout_btn_wrapper').css('display', 'none');
                        $('.empty_card_wrapper').css('display', 'block');
                    }
                },
            })

            function updateMobileCart() {
                simpleCart.bind('update', function(){
                    var cartt = $('#main_cart_items').html();
                    $('#main_cart_items').clone().appendTo("#mobile_cart_items");
                    $('#mobile_cart_items').html($('#main_cart_items').html());
                });
            }

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
                updateMobileCart();
            });

            //-- Click on sizes items to make the active class move.
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })
        })
    </script>
</body>

</html>