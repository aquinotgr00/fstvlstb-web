@extends('frontend-page.main')
@section('content')
    <section id="NIF">
        <div class="container">
            <h2 class="nifhead">{{ Auth::guard('account')->user()->name }}</h2>
            <h2 class="nomargin">{!! sprintf("%06d", Auth::guard('account')->user()->id)!!}</h2>
            <br/><br/>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail thumbnail-photo thumbnail-nif">
                        <img src="{{ asset(Auth::guard('account')->user()->images)}}" alt="">
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('images.download') }}" class="btn"><i class="fa fa-download"></i></a>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="btn"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="btn"><i class="fa fa-twitter"></i></a>
                    </div>   
                </div>
                    <div class="col-md-5 mrgn">
                        <div class="form-group row detail grs">
                            <label for="#" class="col-sm-4 col-form-label">@lang('nif.columns.name')</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->name }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">@lang('nif.columns.nif')</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {!! sprintf("%06d", Auth::guard('account')->user()->id)!!}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">@lang('nif.columns.email')</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->email }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">@lang('nif.columns.phone')</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->phone }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">@lang('nif.columns.address')</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->address }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">@lang('nif.columns.gender')</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->gender }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">@lang('nif.columns.born_date')</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->dob }}</p>
                                </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4 mrgn">
                        <div class="form-group row detail">
                            <label for="#" class="col-sm-12 col-form-label head">@lang('nif.change_password')</label>
                            <label for="#" class="col-sm-6 col-form-label">@lang('nif.old_password')</label>
                                <div class="col-sm-6">
                                    <p class="isian">: ******</p>
                                </div>
                            <label for="#" class="col-sm-6 col-form-label">@lang('nif.new_password')</label>
                                <div class="col-sm-6">
                                    <p class="isian">: ******</p>
                                </div>
                            <label for="#" class="col-sm-6 col-form-label">@lang('nif.re_password')</label>
                                <div class="col-sm-6">
                                    <p class="isian">: ******</p>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <br/><br/><br/><br/>

    <div id="footer">
        <div class="visible-xs text-center mobilefooter">
            <h2>@lang('index.left.heading'). @lang('footer.left.title') @lang('footer.right.title')</h2>
            <p>@lang('footer.left.detail')</p>
        </div>
        <div class="hidden-xs container">
            <h2 class="navbar-left">@lang('index.left.heading'). @lang('footer.left.title') @lang('footer.right.title')</h2>
            <p class="navbar-right">@lang('footer.left.detail')</p>
        </div>
    </div>
@endsection