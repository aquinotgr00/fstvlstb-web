<div class="modal fade modalbox" id="modal-daftar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal">&times;</button>
            <h3 class="text-bold">@lang('modal.register.heading')</h3>
            <p>
                @lang('modal.register.have_account')
            </p>
            <div id="alert-response"></div>
            <form id="form-register" action="{{Route('member.register')}}" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.name')</label>
                            <input type="text" name="name" class="form-control" placeholder="Roby Arifin Wisnusirin">
                        </div>
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.email')</label>
                            <input type="email" name="email" id="register-email" class="form-control"
                                placeholder="robysirin@email.com">
                        </div>
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.phone')</label>
                            <input type="text" name="phone" id="register-phone" class="form-control"
                                placeholder="081010519945">
                        </div>
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.address')</label>
                            <input type="text" name="address" class="form-control"
                                placeholder="Jl. Budi Daya Permai, Blok S No. 5, Tamalanrea, Makassar 90245">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.photo')</label>
                            <div class="thumbnail thumbnail-photo">
                                <img id="thumbnail-upload" src="{{ asset('frontend/images/photo.png')}}" alt="">
                                <button class="btn btn-plus" type="button" onclick="chooseFile();"><i
                                        class="fa fa-plus"></i></button>
                                <div style="height:0px;overflow:hidden">
                                    <input type="file" id="fileInput" name="image" />
                                </div>
                            </div>
                            <p id="error-image-required"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.gender')</label>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-warning active">
                                    <input type="radio" name="gender" id="option1" value="L" checked> L
                                </label>
                                <label class="btn btn-warning">
                                    <input type="radio" name="gender" id="option2" value="P"> P
                                </label>
                                <label class="btn btn-warning">
                                    <input type="radio" name="gender" id="option3" value="X"> X
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-xs-4">
                        <div class="form-group">
                            <label>@lang('modal.register.columns.born_date')</label>
                            <select name="date" class="form-control">
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <div class="form-group">
                            <label>@lang('modal.register.columns.month')</label>
                            <select name="month" class="form-control">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <div class="form-group">
                            <label>@lang('modal.register.columns.year')</label>
                            <select name="year" class="form-control">
                                @for($i = date("Y"); $i >= date( 'Y' ,strtotime ( '-60 year' , date("Y") )) ; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.password')</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Opus1234">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="">@lang('modal.register.columns.re_password')</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Opus1234">
                        </div>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <img src="{{asset('images/fstvlst.gif')}}" class="center-block loading" style="display: none;"
                        width="50px">
                    <button type="submit"
                        class="btn btn-danger btn-block btn-submit gas">@lang('modal.register.columns.gas')</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade modalbox" id="modal-masuk">
    <div class="modal-dialog">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal">&times;</button>
            <h3 class="text-bold">@lang('modal.login.heading')</h3>
            <p>
                @lang('modal.login.need_account')
            </p>
            <form id="form-login" action="{{Route('member.login')}}" method="post">
                <div class="form-group">
                    <label for="">@lang('modal.login.columns.email')</label>
                    <input type="text" id="login-email" name="email" class="form-control" placeholder="000645">
                    <a id="error-login"></a>
                </div>
                <div class="form-group">
                    <label for="">@lang('modal.login.columns.password')</label>
                    <input type="password" name="password" class="form-control" placeholder="********">
                </div>
                <div class="form-group text-right">
                    @lang('modal.login.columns.forgot_password')
                </div>
                <br />
                <div class="hidden-xs">
                    <br /><br /><br /><br />
                </div>
                <div class="form-group">
                    <img src="{{asset('images/fstvlst.gif')}}" class="center-block loading" style="display: none;"
                        width="50px">
                    <button type="submit"
                        class="btn btn-danger btn-block btn-submit gas">@lang('modal.login.columns.gas')</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade modalbox" id="modal-reset">
    <div class="modal-dialog">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal">&times;</button>
            <h3 class="text-bold">@lang('modal.reset.heading')</h3>
            <form id="form-reset" action="{{ route('password.email') }}" method="post">
                <div class="form-group">
                    <label for="">@lang('modal.reset.columns.email')</label>
                    <input type="text" id="reset-email" name="email" class="form-control"
                        placeholder="robysirin@email.com">
                    <a id="error-reset"></a>
                </div>
                <br />
                <div class="hidden-xs">
                    <br /><br /><br /><br />
                </div>
                <div class="form-group">
                    <img src="{{asset('images/fstvlst.gif')}}" class="center-block loading" style="display: none;"
                        width="50px">
                    <button type="submit"
                        class="btn btn-danger btn-block btn-submit gas">@lang('modal.reset.columns.gas')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@auth('account')
<div class="modal fade modalbox" id="modal-sukses">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <button class="close" type="button" data-dismiss="modal">&times;</button>
            <h3 class="text-bold">@lang('modal.succeed.heading')</h3>
            <p>
                @lang('modal.succeed.top_detail')
            </p>
            <h1 class="text-danger nomargin text-bold">{!! sprintf("%06d", Auth::guard('account')->user()->id)!!}
            </h1>
            <p>
                @lang('modal.succeed.bot_detail')
            </p>
            <p>
                <strong class="text-bold">@lang('modal.succeed.dont_forget')</strong>
            </p>
            <div class="thumbnail thumbnail-photo">
                <img src="{!!Storage::disk('s3')->url(Auth::guard('account')->user()->images)!!}" alt="">
            </div>
            <div class="pull-left">
                <a href="{{ route('images.download') }}" class="btn"><i class="fa fa-download"></i></a>
            </div>
            <!--  <div class="pull-right">
                    <a href="#" class="btn"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="btn"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn"><i class="fa fa-twitter"></i></a>
                </div> -->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>

{{-- modal for product detail in /boxset --}}
{{-- <div class="modal fade modalbox" id="modal-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-order">
            <div class="row loader_wrapper">
                <img src="{{ asset('images/fstvlst.gif') }}" alt="">
            </div>
            <button class="close" type="button" data-dismiss="modal">&times;</button>
            <div class="row simpleCart_shelfItem">
                <div class="col-xs-12 col-md-4">
                    <div class="row">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="product_images">
                            <div class="item carousel-item active">
                                <div><img id="product_image" class="item_image" src="" alt=""></div>
                            </div>
                        </div>
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-long-arrow-left fa-lg"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-long-arrow-right fa-lg"></i>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-8 m-3">
                    <h2 class="item_name" id="product-name"></h2>
                    <p class="item_productId" style="display:none;"></p>
                    <p class="item_price" style="display:none;"></p>
                    <p class="item_weight" style="display:none;"></p>
                    <p class="harga" id="product-price">Rp. 0</p>
                    <p id="product-desc" class="item_desc" data-name="product_desc"></p>
                    <p style="display:none; color:red;" class="product-notes">Untuk pemesanan cenderamata beda ukuran kaos silakan tambah ke keranjang terlebih dahulu, lalu pilih cenderamata dengan ukuran berbeda</p>
                    <div style="display:none;" id="product-sizes" class="product-notes section row">
                        <div class="col-xs-4">
                            <h5>UKURAN KAOS</h5>
                        </div>
                        <div class="col-xs-5 optional">
                            <h5 class="attr2 sizes" data-value="S">S</h5>
                            <h5 class="attr2 sizes" data-value="M">M</h5>
                            <h5 class="attr2 sizes" data-value="L">L</h5>
                            <h5 class="attr2 sizes" data-value="XL">XL</h5>
                            <h5 class="attr2 sizes" data-value="XXL">XXL</h5>
                        </div>
                    </div>
                    <br/>
                    <div class="section row">
                        <div class="col-xs-4">
                            <h5>JUMLAH</h5>
                        </div>
                        <div class="col-xs-5 optional jmlh">
                            <div class="btn-number btn-minus"><span class="fa fa-minus fa-2x"></span></div>
                            <input type="number" id="item_qty" class="item_quantity num-order" value="1" />
                            <div class="btn-number btn-plus"><span class="fa fa-plus fa-2x"></span></div>   
                        </div>

                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <a href="javascript:;" class="btn btn-danger btn-block btn-submit item_add" data-toggle="modal" data-target="#" data-dismiss="#">MASUK KERANJANG</a>
                </div>
            </div>
        </div>
    </div>
</div>  --}}

{{-- DEPRECATED!! checkout form modal --}}
<div id="modal-checkout" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">BUY</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
                <form id="form-checkout" action="{{Route('member.register')}}" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label for="">@lang('modal.register.columns.name')</label>
                                <input type="text" name="name" class="form-control" placeholder="Roby Arifin Wisnusirin">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
@endauth

<div class="modal fade modal-error" id="modal-error">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="info">
                <h2>@lang('modal.error.hold_on')</h2>
                <div class="row">
                    <div class="col-sm-6">
                        @lang('modal.error.too_many_attempt')
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">@lang('modal.error.button')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-error" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="info">
                <h2>@lang('modal.succeed.success')</h2>
                <div class="row">
                    <div class="col-sm-6">
                        @lang('modal.succeed.check_email')
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">@lang('modal.error.button')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if( Request::get('openmodal'))
<script>
    $(function () {
        $('#modal-sukses').modal('show');
        removeParam('openmodal');
    });
    function removeParam(parameter) {
        var url = document.location.href;
        var urlparts = url.split('?');

        if (urlparts.length >= 2) {
            var urlBase = urlparts.shift();
            var queryString = urlparts.join("?");

            var prefix = encodeURIComponent(parameter) + '=';
            var pars = queryString.split(/[&;]/g);
            for (var i = pars.length; i-- > 0;)
                if (pars[i].lastIndexOf(prefix, 0) !== -1)
                    pars.splice(i, 1);
            url = urlBase;
            window.history.pushState('', document.title, url); // added this line to push the new url directly to url bar .

        }
        return url;
    }
</script>
@endif
<script>
    $("#form-login").validate({
        rules: {
            email: {
                required: true

            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: ''
            },
            password: {
                required: ''
            }
        },
        errorPlacement: function (error, element) {
            $(element).attr('id', 'input-required');
        },
        submitHandler: function (form, event) {
            event.preventDefault(); // avoid to execute the actual submit of the form.
            $(".loading").show();
            $(".gas").hide();
            var form = $("#form-login");
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    $(".loading").hide();
                    $(".gas").show();
                    switch (data.status) {
                        case "Failed":
                            $('#error-login').html(data.message)
                            break;
                        case "Limit":
                            $('#modal-masuk').modal('hide')
                            $('#modal-error').modal('show')
                            break;
                        case "Success":
                            $(location).attr("href", data.intended);
                            break;
                        default:
                            console.log(data)

                    }
                }
            });
        }
    });

    $("#form-reset").validate({
        rules: {
            email: {
                required: ''
            }
        },
        messages: {
            email: {
                required: ''
            }
        },
        errorPlacement: function (error, element) {
            $(element).attr('id', 'input-required');
        },
        submitHandler: function (form, event) {
            event.preventDefault(); // avoid to execute the actual submit of the form.
            $(".loading").show();
            $(".gas").hide();
            var form = $("#form-reset");
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    $(".loading").hide();
                    $(".gas").show();
                    console.log(data)
                    switch (data.status) {
                        case "Failed":
                            $('#error-reset').html(data.email)
                            break;
                        case "Limit":
                            console.log(data)
                            break;
                        case "Success":
                            $('#modal-reset').modal('hide');
                            $('#modal-success').modal('show');
                            $(location).attr("href", data.intended);
                            break;
                        default:
                            console.log(data)

                    }
                }
            });
        }
    });

    $("#form-register").validate({
        rules: {
            email: {
                required: true
            },
            name: {
                required: true
            },
            phone: {
                required: true
            },
            address: {
                required: true
            },
            gender: {
                required: true
            },
            password_confirmation: {
                required: '',
                minlength: 6,
                equalTo: "#password"
            },
            image: {
                required: true,
                extension: "jpeg|jpg|png"
            }
        },
        messages: {
            email: {
                required: ''
            },
            name: {
                required: ''
            },
            phone: {
                required: ''
            },
            address: {
                required: ''
            },
            gender: {
                required: ''
            },
            password_confirmation: {
                required: '',
                minlength: '',
                equalTo: ''
            },
            image: {
                required: true,
                extension: ''
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") == 'image') {
                $('#error-image-required').text('Foto Wajib diisi (*.jpeg / *.jpg / *.png)');
            } else {
                $(element).attr('id', 'input-required');
            }
        },
        submitHandler: function (form, event) {
            $("#form-register").validate().resetForm();
            event.preventDefault(); // avoid to execute the actual submit of the form.
            $(".loading").show();
            $(".gas").hide();
            var form = $("#form-register");
            var url = form.attr('action');
            var fd = new FormData(form[0]);
            $.ajax({
                type: "POST",
                url: url,
                data: fd,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                success: function (data) {
                    if (typeof data.errors !== "undefined") {
                        var alert = "";
                        $.each(data.errors, function (index, value) {
                            alert += "<div class='alert alert-danger'>" + index + " " + value[0] + "</div>";
                        });
                        $('div#alert-response').html(alert);
                    }
                    $(".loading").hide();
                    $(".gas").show();
                    switch (data.status) {
                        case "Failed":
                            Object.keys(data.errors).forEach(function (key) {
                                $('#register-' + key).attr('id', 'input-required');
                            });
                            $('#error-login').html(data.message)
                            break;
                        case "Limit":
                            break;
                        case "Success":
                            $(location).attr("href", data.intended + '?openmodal=1');
                            break;
                        default:
                            console.log(data);
                            break;
                    }
                }
            });

        }
    });

    function chooseFile() {
        document.getElementById("fileInput").click();
    }
    
    $(function () {
        $('#fileInput').change(function () {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#thumbnail-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

    });
</script>