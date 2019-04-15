<div class="modal fade modalbox" id="modal-daftar">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h3 class="text-bold">PENDAFTARAN</h3>
                <p>
                    Jika sudah punya NIF, silahkan <a href="#" data-toggle="modal" data-target="#modal-masuk" data-dismiss="modal">Masuk</a>
                </p>
                <div class="row">
                    <div class="col-xs-8">
                    <form id="form-register" action="{{Route('member.register')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Roby Arifin">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="robyyoibanget@email.com">
                        </div>
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input type="text" name="phone" class="form-control" placeholder="081377788899">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap Banget</label>
                            <input type="text" name="address" class="form-control" placeholder="Jl. Manuk No. 65, Playen, GK, Yogyakarta, 55861">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="">Foto Wajah</label>
                            <div class="thumbnail thumbnail-photo">
                                <img id="thumbnail-upload" src="{{ asset('frontend/images/photo.png')}}" alt="">
                                <button class="btn btn-plus" type="button" onclick="chooseFile();"><i class="fa fa-plus"></i></button>
                                <div style="height:0px;overflow:hidden">
                                   <input type="file" id="fileInput" name="image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Kelamin</label>
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
                            <label >Tanggal Lahir</label>
                            <select  name="date" class="form-control">
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
                            <label >Bulan</label>
                            <select  name="month" class="form-control">
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
                            <label >Tahun</label>
                            <select  name="year" class="form-control">
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
                            <label for="">Kata Sandi</label>
                            <input type="password" name="password"  class="form-control" placeholder="Danish1234">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="">Pastikan Lagi Kata Sandi</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Danish1234">
                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <img src="{{asset('images/fstvlst.gif')}}" class="center-block loading" style="display: none;" width="50px" >
                    <button  type="submit" class="btn btn-danger btn-block btn-submit gas">GAS!</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade modalbox" id="modal-masuk">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h3 class="text-bold">MASUK</h3>
                <p>
                    Jika belum punya NIF, silahkan ke bagian <a href="#" data-toggle="modal" data-target="#modal-daftar" data-dismiss="modal">Pendaftaran</a>
                </p>
                <form id="form-login" action="{{Route('member.login')}}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="">NIF/ E-mail</label>
                    <input type="text" id="login-email" name="email" class="form-control" placeholder="004565">
                    <a id="error-login"></a>
                </div>
                <div class="form-group">
                    <label for="">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" placeholder="*********">
                </div>
                <div class="form-group text-right">
                    <a href="#" data-toggle="modal" data-target="#modal-reset" data-dismiss="modal">Lupa</a> Kata Sandi
                </div>
                <br/>
                <div class="hidden-xs">
                    <br/><br/><br/><br/>
                </div>
                <div class="form-group">
                    <img src="{{asset('images/fstvlst.gif')}}"  class="center-block loading" style="display: none;" width="50px" >
                    <button type="submit" class="btn btn-danger btn-block btn-submit gas" >GAS!</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="modal fade modalbox" id="modal-reset">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h3 class="text-bold">RESET</h3>
                <form id="form-reset" action="{{ route('password.email') }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="text" id="reset-email" name="email" class="form-control">
                    <a id="error-reset"></a>
                </div>
                <br/>
                <div class="hidden-xs">
                    <br/><br/><br/><br/>
                </div>
                <div class="form-group">
                    <img src="{{asset('images/fstvlst.gif')}}"  class="center-block loading" style="display: none;" width="50px" >
                    <button type="submit" class="btn btn-danger btn-block btn-submit gas" >GAS!</button>
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
                <h3 class="text-bold">SELAMAAT</h3>
                <p>
                    Kamu sudah terdaftar di FSTVLST, <br/>
                    NIF (Nomor Induk Festival)-mu adalah:
                </p>
                <h1 class="text-danger nomargin text-bold">{!! sprintf("%06d", Auth::guard('account')->user()->id)!!}</h1>
                <p>
                    Ini adalah nomor saktimu,<br/>
                    untuk segala urusan administratif dengan FSTVLST
                </p>
                <p>
                    <strong class="text-bold">Simpan, jangan lupakan.</strong>
                </p>
                <div class="thumbnail thumbnail-photo">
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
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endauth

    <div class="modal fade modal-error" id="modal-error">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="info">
                    <h2>SIX SEEK SICK!!</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            Kamu sudah 3 kali salah memasukkan kata sandi
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="#" class="btn btn-danger" data-dismiss="modal">Baiklah</a>
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
                    <h2>SIX SEEK SICK!!</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            Silahkan Cek Email untuk reset password
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="#" class="btn btn-danger" data-dismiss="modal">Baiklah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @if( Request::get('openmodal'))
        <script>
                 $(function(){
                     $('#modal-sukses').modal('show');
                     removeParam('openmodal');
                 });
                 function removeParam(parameter)
                    {
                      var url=document.location.href;
                      var urlparts= url.split('?');

                     if (urlparts.length>=2)
                     {
                      var urlBase=urlparts.shift(); 
                      var queryString=urlparts.join("?"); 

                      var prefix = encodeURIComponent(parameter)+'=';
                      var pars = queryString.split(/[&;]/g);
                      for (var i= pars.length; i-->0;)               
                          if (pars[i].lastIndexOf(prefix, 0)!==-1)   
                              pars.splice(i, 1);
                      url = urlBase;
                      window.history.pushState('',document.title,url); // added this line to push the new url directly to url bar .

                    }
                    return url;
                    }
        </script>
@endif
<script>
$( "#form-login" ).validate({
  rules: {
    email: {
      required: true

    },
    password: {
      required: true
    }
  },
  submitHandler: function(form,event) {
    event.preventDefault(); // avoid to execute the actual submit of the form.
    $(".loading").show();
    $(".gas").hide();
    var form = $("#form-login");
    var url = form.attr('action');
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
            $(".loading").hide();
            $(".gas").show();
            switch(data.status) 
            {
              case "Failed":
                $('#error-login').html(data.message)
                break;
              case "Limit":
                console.log(data)
                break;
               case "Success":
                $(location).attr("href",data.intended);
                break;
              default:
                console.log(data)
               
            }
           }
         });
  }
});

$( "#form-reset" ).validate({
  rules: {
    email: {
      required: true
    }
  },
  submitHandler: function(form,event) {
    event.preventDefault(); // avoid to execute the actual submit of the form.
    $(".loading").show();
    $(".gas").hide();
    var form = $("#form-reset");
    var url = form.attr('action');
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
            $(".loading").hide();
            $(".gas").show();
            console.log(data)
            switch(data.status) 
            {
              case "Failed":
                $('#error-reset').html(data.email)
                break;
              case "Limit":
                console.log(data)
                break;
               case "Success":
               $('#modal-reset').modal('hide');
               $('#modal-success').modal('show');
                $(location).attr("href",data.intended);
                break;
              default:
                console.log(data)
               
            }
           }
         });
  }
});

$( "#form-register" ).validate({
  rules: {
    email: {
      required: true
    },
    name:{
        required: true
    },
    phone:{
        required: true
    },
    address:{
        required: true
    },
    gender:{
        required: true
    },
    password: {
      required: true,
      minlength: 6,
    },
    password_confirmation: {
      required: true,
      minlength: 6,
      equalTo: "#password"
    }
  },
  submitHandler: function(form,event) {
    event.preventDefault(); // avoid to execute the actual submit of the form.
    $(".loading").show();
    $(".gas").hide();
    var form = $("#form-register");
    var url = form.attr('action');
    var fd = new FormData(form[0]);
    console.log($('#fileInput').val)
    $.ajax({
           type: "POST",
           url: url,
           data: fd,
           enctype: 'multipart/form-data',
           processData: false,
           contentType: false,
           success: function(data)
           {
            $(".loading").hide();
            $(".gas").show();
            switch(data.status) 
            {
              case "Failed":
                $('#error-login').html(data.message)
                break;
              case "Limit":
                console.log(data)
                break;
              case "Success":
                $(location).attr("href",data.intended+'?openmodal=1');
                break;
              default:
                 console.log(data)
           }
         }
        });
    }
});
function chooseFile() {
      document.getElementById("fileInput").click();
   }
$(function(){
  $('#fileInput').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#thumbnail-upload').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
  });

});
</script>