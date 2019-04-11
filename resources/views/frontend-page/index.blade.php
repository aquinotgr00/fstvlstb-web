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
    <link rel="stylesheet" href="{{asset('dist/css/plyr.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="{{asset('dist/js/plyr.js')}}"></script>

</head>
<body>
      @include('frontend-page.navbar')
    <section id="home">
        <div class="container">
            <div class="row row-layout">
                <div class="col-md-3">
                    <h2>FSTVLST II</h2>
                    <div class="row">
                        <div class="col-xs-6 visible-xs">
                            <div class="thumbnail"><img src="{{asset('frontend/images/main-image.png')}}" alt=""></div>
                        </div>
                        <div class="col-md-12 col-xs-6">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et voluptate nam eaque debitis nobis repellat illo corrupti magni ratione asperiores excepturi quasi vero cumque maxime obcaecati, quia recusandae cupiditate expedita dolore totam veniam voluptatibus quis! Repellat nihil, laudantium ducimus officiis.
                            </p>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>TREKLIST</h2>
                            <ul class="treklist">
                                @foreach($tracklist as $i => $row)
                                <li class="treklist-stream @if($row->id == 0) active @endif {{$row->status}}-stream" data-song="GAS!" data-src="{{route('stream.audio',$row->id)}}"> 
                                    <div class="icon"><i class="fa fa-play"></i></div>
                                    <div class="number">{!! sprintf("%02d",$i+1) !!}</div>
                                    <div class="title">{{$row->name}}</div>
                                    <div class="date">{{$row->release_date}}</div>
                                </li>
                                @if(in_array($i, array(0,3,5)))
                                <li class="divider"></li>
                                @endif
                                @endforeach
                            </ul>  
                        </div>
                    </div>
                    <div class="media-player">
                        <audio id="player" controls>
                            <source id="player-stream" src="" type="audio/mp3" />
                        </audio>
                        <div class="info">
                            <div class="row">
                                <div class="col-sm-6 col-xs-8">
                                    <div class="title">Memainkan : <strong id="song-title" >GAS!</strong></div>
                                </div>
                                <div class="col-sm-6 col-xs-4 text-right">
                                    <a href="#" class="btn btn-danger btn-intip btn-xs">Unduh</a>
                                </div>
                            </div>        
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div class="hidden-xs desktop-footer">
                        <h2 class="text-white">ALMOST ROCK</h2>
                        <div class="hidden-xs">
                        <br/>
                        </div>
                        <small>
                            Terima kasih telah mengambil keputusan untuk mendukung FSTVLST.
                        </small>
                    </div>
                </div>
                <div class="col-md-6 hidden-xs">
                    <div class="main-image"><img src="{{asset('frontend/images/main-image.png')}}" alt=""></div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 col-xs-6">
                            <h2>BOKSET</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et voluptate nam eaque debitis nobis repellat illo corrupti magni ratione asperiores excepturi quasi vero cumque maxime obcaecati, quia recusandae cupiditate expedita dolore totam veniam voluptatibus quis! Repellat nihil, laudantium ducimus officiis.
                            </p>
                            <br/>        
                        </div>
                        <div class="col-md-12 col-xs-6">
                            <h2 class="nomargin">EDISI 01</h2>
                            <div class="pull-left">
                                <h2 class="nomargin">PRE-ORDER</h2>
                            </div>
                            <div class="pull-right hidden-xs">
                                @guest('account') 
                                <a href="/boxset" class="btn btn-danger btn-intip btn-xs" data-toggle="modal" data-target="#modal-daftar">Intip</a>
                                @endguest
                                @auth('account')
                                        <a href="/boxset" class="btn btn-danger btn-intip btn-xs">Intip</a>
                                @endauth 
                                
                            </div>
                            <div class="clearfix"></div>
                            <br/>
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
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <p>
                                        PRE-ORDER DIBUKA : 01/05/2019
                                    </p>  
                                </div>
                                <div class="col-md-12 col-xs-6 visible-xs">
                                           
                                    <a href="/boxst" class="btn btn-danger btn-intip btn-xs">Intip</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="hidden-xs">
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                    <div class="hidden-xs">
                        <h2 class="text-white">BARELY ART</h2>
                    </div>
                    <div class="visible-xs text-center mobilefooter">
                        <h2 class="text-white nomargin">ALMOST ROCK BARELY ART</h2>
                        <small>
                            Terima kasih telah mengambil keputusan untuk mendukung FSTVLST.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    const player = new Plyr('#player',{
        controls :['play', 'progress']
    });

    $(function(){
        $(".plyr__control").on( "click", function() {
            var streamsource =$('#player-stream').attr("src");
            if(streamsource == ""){
                player.stop()
                $('#song-title').html('GAS!')  
                $("#player").attr("src","{!!route('stream.audio.single')!!}");
                player.source = {
                        type: 'audio',
                        title: 'Example title',
                        sources: [
                            {
                                src: "{!!route('stream.audio.single')!!}",
                                type: 'audio/mp3',
                            }
                        ],
                    };
                player.play()
            }
        });

        $( ".treklist-stream" ).on( "click", function() {
            var source = $( this ).data('src');
            var song = $( this ).data('song');
            if(song !=='' || source !=''){
                $( ".treklist-stream" ).removeClass( "active" )
                $(this).addClass("active")
                player.stop()
                $('#song-title').html(song)  
                $("#player-stream").attr("src", source);
                $("#player").attr("src","{!!route('stream.audio.single')!!}");
                player.source = {
                        type: 'audio',
                        title: song,
                        sources: [
                            {
                                src: source,
                                type: 'audio/mp3',
                            }
                        ],
                    };
                player.play()
            }
            
        });
    });
</script>
    @include('frontend-page.modal')
</body>
</html>