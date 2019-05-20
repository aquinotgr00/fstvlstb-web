@extends('frontend-page.main')
@section('content') 
    <section id="boxset">
        <div class="container">
            <div class="row row-layout">
                {{-- product list --}}
                <div class="col-md-4">
                    <h2 class="text-warning">@lang('boxset.peek')</h2>
                    <br/>
                    <h2 class="nomargin">@lang('index.right.pre-order') @lang('boxset.boxset')</h2>
                    <h2 class="nomargin">@lang('index.left.heading') @lang('boxset.edition')</h2>
                    <h2 class="nomargin boks">@lang('index.right.closed')</h2>
                    {{-- <br/><br/>
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
                    <br/> --}}
                    <div class="hidden-xs">
                        {{-- <h5 class="nomargin boxset-text">Semua cendera mata juga bisa dibeli secara eceran,</h5>
                        <h5 class="nomargin boxset-text">dengan cara klik lingkaran kuning di gambar.</h5> --}}
                        <br/><br/>
                        {{-- <h5 class="nomargin mb-1 boxset-text">Masa Pra-Pesan: 3 - 20 Mei 2019</h5> --}}
                        <h5 class="nomargin mb-1 boxset-text">Masa Produksi: 20 Mei – 20 Juni 2019</h5>
                        <h5 class="nomargin mb-1 boxset-text">Masa pengiriman: Mulai 21 Juni 2019</h5>
                        <br/><br/>
                        <h2 class="nomargin boks">@lang('index.right.coming-soon')</h2>
                        <h2>
                            {{-- @lang('boxset.open_pre_order') @lang('index.right.date') --}}
                            {{-- <a href="#" data-toggle="modal" data-target="#modal-product" data-id="6" class="btn btn-danger btn-intip btn-block btn-submit buy-boxset-btn single-product">Pesan Bokset</a> --}}
                        </h2>
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
                            <a href="#" class="marker single-product" style="top:25%;left:12%" data-toggle="modal" data-target="#modal-product" data-id="1"><span class="number"></span></a>
                            <a href="#" class="marker single-product" style="top:19%;left:48%" data-toggle="modal" data-target="#modal-product" data-id="5"><span class="number"></span></a>
                            <a href="#" class="marker single-product" style="top:55%;left:48%" data-toggle="modal" data-target="#modal-product" data-id="3"><span class="number"></span></a>
                            <a href="#" class="marker single-product" style="top:45%;left:88%" data-toggle="modal" data-target="#modal-product" data-id="2"><span class="number"></span></a>
                            <a href="#" class="marker single-product" style="top:60%;left:7%" data-toggle="modal" data-target="#modal-product" data-id="4"><span class="number"></span></a>
                        </div>
                    </div>
                    <div class="visible-xs">
                        <br/><br/>
                        <h5 class="nomargin boxset-text">Semua cendera mata juga bisa dibeli secara eceran,</h5>
                        <h5 class="nomargin boxset-text">dengan cara klik lingkaran kuning di gambar.</h5>
                        <br/><br/>
                        {{-- <h5 class="nomargin mb-1 boxset-text">Masa Pra-Pesan: 3 - 20 Mei 2019</h5> --}}
                        <h5 class="nomargin mb-1 boxset-text">Masa Produksi: 20 Mei – 20 Juni 2019</h5>
                        <h5 class="nomargin mb-1 boxset-text">Masa pengiriman: Mulai 21 Juni 2019</h5>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 style="font-size: 30px;">
                                    {{-- @lang('boxset.open_pre_order') @lang('index.right.date') --}}
                                    <a href="#" data-toggle="modal" data-target="#modal-product" data-id="6" class="btn btn-danger btn-intip btn-block btn-submit buy-boxset-btn single-product">Beli Bokset</a>
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
    
@endsection