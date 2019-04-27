@extends('frontend-page.main')
@section('content') 
    <section id="boxset">
        <div class="container">
            <div class="row row-layout">
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
                <div class="col-md-8">
                    <div class="main-image">
                        <img src="{{ asset('frontend/images/boxset-image.png')}}" alt="">
                        <div class="marker-container">
                            <a href="#" class="marker" style="top:25%;left:12%" data-toggle="modal" data-target="#modal-kaos"><span class="number">01</span></a>
                            <a href="#" class="marker" style="top:19%;left:48%"><span class="number">05</span></a>
                            <a href="#" class="marker" style="top:48%;left:48%"><span class="number">03</span></a>
                            <a href="#" class="marker" style="top:45%;left:88%"><span class="number">02</span></a>
                            <a href="#" class="marker" style="top:60%;left:7%"><span class="number">04</span></a>
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
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $('.single-product').click(function () {
                // alert($(this).data('id'));
                var id = $(this).data('id');
                $.get(`/api/product/${id}`, function (response) {
                    console.log(response);
                    $('#product-name').html(response.name);
                    $('#product-price').html(response.price);
                });
            });

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