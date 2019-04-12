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
                            <label for="#" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->name }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">NIF</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {!! sprintf("%06d", Auth::guard('account')->user()->id)!!}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->email }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">Nomer Telepon</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->phone }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->address }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">Kelamin</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->gender }}</p>
                                </div>
                            <label for="#" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <p class="isian">: {{ Auth::guard('account')->user()->dob }}</p>
                                </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4 mrgn">
                        <div class="form-group row detail">
                            <label for="#" class="col-sm-12 col-form-label head">GANTI KATA SANDI</label>
                            <label for="#" class="col-sm-6 col-form-label">Kata Sandi Lama</label>
                                <div class="col-sm-6">
                                    <p class="isian">: ******</p>
                                </div>
                            <label for="#" class="col-sm-6 col-form-label">Kata Sandi Baru</label>
                                <div class="col-sm-6">
                                    <p class="isian">: ******</p>
                                </div>
                            <label for="#" class="col-sm-6 col-form-label">Konfirmasi Kata Sandi Baru</label>
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
            <h2>FSTVLST II. HAMPIR ROCK, NYARIS SENI</h2>
            <p>Terima kasih telah mengambil keputusan untuk mendukung FSTVLST.</p>
        </div>
        <div class="hidden-xs container">
            <h2 class="navbar-left">FSTVLST II. HAMPIR ROCK, NYARIS SENI</h2>
            <p class="navbar-right">Terimakasih telah mengambil keputusan untuk mendukung FSTVLST.</p>
        </div>
    </div>
@endsection