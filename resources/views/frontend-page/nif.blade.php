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
                    <img id='nif-image' class='pointer' src="{!!Storage::disk('s3')->url(Auth::guard('account')->user()->images)!!}" alt="">
                    <form action="{{Route('member.change.image')}}" enctype="multipart/form-data" id='form-image' method="post">
                        @csrf
                        <input type="file" name="image" id="image_nif" style="display: none;" />
                    </form>
                </div>
                <div class="pull-left">
                    <a href="{{ route('images.download') }}" class="btn"><i class="fa fa-download"></i></a>
                </div>
               <!--  <div class="pull-right">
                    <a href="#" class="btn"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="btn"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn"><i class="fa fa-twitter"></i></a>
                </div> -->
            </div>
            <div class="col-md-5 mrgn">
                <form action="{{ route('member.change.nif') }}" method="post" id="change-password">
                    @csrf
                <div class="form-group row detail grs">
                    <label for="#" class="col-sm-5 col-form-label">@lang('nif.columns.name') <trobe class="pull-right">:</trobe></label>
                    <div class="col-sm-7">
                         <input type="text" name="name" class="form-control isian no-border"  value="{{ Auth::guard('account')->user()->name }}">
                    </div>
                    <label for="#" class="col-sm-5 col-form-label">@lang('nif.columns.nif') <trobe class="pull-right">:</trobe></label>
                    <div class="col-sm-7">
                        <p class="isian">{!! sprintf("%06d", Auth::guard('account')->user()->id)!!}</p>
                    </div>
                    <label for="#" class="col-sm-5 col-form-label">@lang('nif.columns.email') <trobe class="pull-right">:</trobe></label>
                    <div class="col-sm-7">
                         <p class="isian">{{ Auth::guard('account')->user()->email }}</p>
                    </div>
                    <label for="#" class="col-sm-5 col-form-label">@lang('nif.columns.phone') <trobe class="pull-right">:</trobe></label>
                    <div class="col-sm-7">
                        <input type="text" name="phone" class="form-control isian no-border" value="{{ Auth::guard('account')->user()->phone }}">
                    </div>
                    <label for="#" class="col-sm-5 col-form-label">@lang('nif.columns.address') <trobe class="pull-right">:</trobe></label>
                    <div class="col-sm-7">
                        <textarea name="address" class="form-control isian no-border">{{ Auth::guard('account')->user()->address }}</textarea>
                    </div>
                    <label for="#" class="col-sm-5 col-form-label">@lang('nif.columns.gender') <trobe class="pull-right">:</trobe></label>
                    <div class="col-sm-7">
                        <select name="gender" class="form-control isian no-border">
                            <option value="L" @if(Auth::guard('account')->user()->gender == "L") selected @endif >L</option>
                            <option value="P" @if(Auth::guard('account')->user()->gender == "P") selected @endif >P</option>
                            <option value="X" @if(Auth::guard('account')->user()->gender == "X") selected @endif >X</option>
                        </select>
                    </div>
                    <label for="#" class="col-sm-5 col-form-label">@lang('nif.columns.born_date') <trobe class="pull-right">:</trobe></label>
                    <div class="col-sm-7">
                        <input type="text" name="dob" class="form-control isian no-border" value="{{ Auth::guard('account')->user()->dob }}" readonly>
                    </div>
                </div>
                <div class="form-group col-sm-3">
                        <button class="btn btn-danger btn-block btn-submit" type="submit">
                            @lang('nif.edit.button')
                        </button>
                </div>
                </form>
            </div>

            <div class="col-md-4 mrgn">
                <section id="reset-password">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <form action="{{ route('member.ganti-password') }}" method="post" id="change-password">
                        @csrf
                        <div class="wrapper resetbox">
                            <div class="form-group row detail">
                                <label for="#" class="col-sm-12 col-form-label head">@lang('nif.change_password')</label>
                                <label for="#" class="col-sm-6 col-form-label">@lang('nif.old_password')</label>
                                <div class="col-sm-6" style="margin-bottom:8px;">
                                    <input type="password" name="password" class="form-control" placeholder="******" />
                                </div>
                                <label for="#" class="col-sm-6 col-form-label">@lang('nif.new_password')</label>
                                <div class="col-sm-6" style="margin-bottom:8px;">
                                    <input type="password" name="new_password" class="form-control"
                                        placeholder="******" id="new_password"/>
                                </div>
                                <label for="#" class="col-sm-6 col-form-label">@lang('nif.re_password')</label>
                                <div class="col-sm-6">
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        placeholder="******" />
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
    <div class="visible-xs container mobilefooter">
        <h2>@lang('index.left.heading'). @lang('footer.left.title') @lang('footer.right.title')</h2>
        <p>@lang('footer.left.detail')</p>
    </div>
    <div class="hidden-xs container">
        <h2 class="navbar-left">@lang('index.left.heading'). @lang('footer.left.title') @lang('footer.right.title')</h2>
        <p class="navbar-right">@lang('footer.left.detail')</p>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $('input[name="dob"]').datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd/mm/yy'
        });
    });
    $("#nif-image").click(function() {
        $("input[id='image_nif']").click();
    });
    $("input[id='image_nif']").change(function() {
      $('#form-image').submit()
    });


    $("#change-password").validate({
        rules: {
            password: {
                required: true
            },
            new_password: {
                required: true
            },
            new_password_confirmation: {
                required: true,
                equalTo: "#new_password"
            }
        },
        messages: {
            password: {
                required: ''
            },
            new_password: {
                required: ''
            },
            new_password_confirmation: {
                required: ''
            }
        },
        errorPlacement: function (error, element) {
            $(element).attr('id', 'input-required');
        }
    });
</script>
@endsection