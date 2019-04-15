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
                    <h2 class="nomargin">{{__('messages.index.right.edition', ['number' => '01'])}}</h2>
                    <br/><br/>
                    <ul class="treklist nomargin">
                        <li>
                            <div class="number">01</div>
                            <div class="title">Kaos</div>
                        </li>
                        <li>
                            <div class="number">02</div>
                            <div class="title">Buku Lirik & Kord</div>
                        </li>
                        <li>
                            <div class="number">03</div>
                            <div class="title">Kalung Dog Tag Dengan NIF</div>
                        </li>
                        <li>
                            <div class="number">04</div>
                            <div class="title">Emblem & Peniti</div>
                        </li>
                        <li>
                            <div class="number">05</div>
                            <div class="title">Lakban FSTVLST</div>
                        </li>
                    </ul>
                    <br/>
                    <div class="hidden-xs">
                        <h2>
                            @lang('boxset.open_pre_order') 01/05/2019
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
                            <a href="#" class="marker" style="top:19%;left:48%"><span class="number">01</span></a>
                            <a href="#" class="marker" style="top:25%;left:12%"><span class="number">02</span></a>
                            <a href="#" class="marker" style="top:55%;left:48%"><span class="number">03</span></a>
                            <a href="#" class="marker" style="top:45%;left:88%"><span class="number">04</span></a>
                            <a href="#" class="marker" style="top:60%;left:7%"><span class="number">05</span></a>
                        </div>
                    </div>
                    <div class="visible-xs">
                        <br/>
                        <div class="row">
                            <div class="col-xs-8">
                                <h2 style="font-size: 30px;">
                                    @lanng('boxset.pre-order') @lang('boxset.opened') <br/> 01/05/2019
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