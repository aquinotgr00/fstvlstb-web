@extends('frontend-page.main')
@section('content')

<section id="NIF">
    <div class="container">
        <h2 class="nifhead">{{ Auth::guard('account')->user()->name }}</h2>
        <h2 class="nomargin">{!! sprintf("%06d", Auth::guard('account')->user()->id)!!}</h2>
        <br /><br />
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
                <section id="reset-pass">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <form action="{{ route('member.ganti-password') }}" method="post">
                        @csrf
                        <div class="wrapper resetbox">
                            <div class="form-group row detail">
                                <label for="#" class="col-sm-12 col-form-label head">@lang('nif.change_password')</label>
                                <label for="#" class="col-sm-6 col-form-label">@lang('nif.old_password')</label>
                                <div class="col-sm-6" style="margin-bottom:8px;">
                                    <input type="password" name="password" class="form-control" placeholder="******" />
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $errors->first('password') }}</i>
                                    </span>
                                    @endif
                                </div>
                                <label for="#" class="col-sm-6 col-form-label">@lang('nif.new_password')</label>
                                <div class="col-sm-6" style="margin-bottom:8px;">
                                    <input type="password" name="new_password" class="form-control"
                                        placeholder="******" />
                                    @if ($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $errors->first('new_password') }}</i>
                                    </span>
                                    @endif
                                </div>
                                <label for="#" class="col-sm-6 col-form-label">@lang('nif.re_password')</label>
                                <div class="col-sm-6">
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        placeholder="******" />
                                    @if ($errors->has('new_password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $errors->first('new_password_confirmation') }}</i>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-block btn-submit" type="submit">
                                    @lang('nif.button')
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</section>
<br /><br /><br /><br />

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