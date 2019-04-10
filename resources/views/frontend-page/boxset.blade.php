<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
    <title>FSTVLST</title>

    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/app.css')}}">


    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
    @include('frontend-page.navbar')
    <section id="boxset">
        <div class="container">
            <div class="row row-layout">
                <div class="col-md-4">
                    <h2 class="text-warning">INTIP</h2>
                    <br/>
                    <h2 class="nomargin">BOXSET</h2>
                    <h2 class="nomargin">EDISI 01</h2>
                    <br/><br/>
                    <ul class="treklist nomargin">
                        <li>
                            <div class="number">01</div>
                            <div class="title">CD FSTVLST II</div>
                        </li>
                        <li>
                            <div class="number">02</div>
                            <div class="title">Buku Lirik & Kord</div>
                        </li>
                        <li>
                            <div class="number">03</div>
                            <div class="title">Kaos</div>
                        </li>
                        <li>
                            <div class="number">04</div>
                            <div class="title">Dog Tag dengan NIF</div>
                        </li>
                        <li>
                            <div class="number">05</div>
                            <div class="title">Stiker/ Emblem</div>
                        </li>
                    </ul>
                    <br/>
                    <div class="hidden-xs">
                        <h2>
                            PRE-ORDER DIBUKA 01/05/2019
                        </h2>
                        <br/><br/>
                        <a href="#" class="btn btn-danger btn-intip btn-xs">Notif Ya!</a>
                        <br/><br/>
                        <div class="hidden-xs">
                            <br/><br/><br/><br/>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et voluptate nam eaque debitis nobis repellat illo corrupti magni ratione asperiores excepturi quasi vero cumque maxime obcaecati, quia recusandae cupiditate expedita dolore totam veniam voluptatibus quis! Repellat nihil, laudantium ducimus officiis.
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
                                    PRE-ORDER DIBUKA <br/> 01/05/2019
                                </h2>  
                            </div>
                            <div class="col-xs-4 text-right">
                                <a href="#" class="btn btn-danger btn-intip btn-xs">Notif Ya!</a>
                            </div>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et voluptate nam eaque debitis nobis repellat illo corrupti magni ratione asperiores excepturi quasi vero cumque maxime obcaecati, quia recusandae cupiditate expedita dolore totam veniam voluptatibus quis! Repellat nihil, laudantium ducimus officiis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend-page.modal')
    
</body>
</html>