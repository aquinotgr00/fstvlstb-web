@extends('frontend-page.main')
@section('content')     
    <section id="home">
        <div class="container">
            <div class="row row-layout">
                <div class="col-md-3">
                    <h2 class="hidden-xs">@lang('index.left.heading')</h2>
                    <div class="row">
                        <div class="col-12 visible-xs">
                            <div class="thumbnail"><img src="{{asset('frontend/images/main-image.png')}}" alt=""></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>@lang('index.left.tracklist')</h2>
                            <ul class="treklist">
                                @foreach($tracklist as $i => $row)
                                <li class="treklist-stream @if(in_array($i, array(4,5,6,7,8))) inactive-stream @endif @if($row->id == 0) active @endif {{$row->status}}-stream" data-song="{{$row->name}}" data-file="{!!route('files.download',['id'=>$row->id])!!}" data-src="{{route('stream.audio',$row->id)}}"> 
                                    <div class="icon"><i class="fa fa-play"></i></div>
                                    <div class="number">{!! sprintf("%02d",$i+1) !!}</div>
                                    <div class="title">{{$row->name}}</div>
                                    <div class="date">{{$row->release_date}}</div>
                                </li>
                                @if(in_array($i, array(0,3,6)))
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
                                    <div class="title">@lang('index.left.playing') : <strong id="song-title" >GAS!</strong></div>
                                </div>
                                <div class="col-sm-6 col-xs-4 text-right">
                                
                                @guest('account')
                                    <a href="#" class="btn btn-danger btn-intip btn-xs" data-toggle="modal" data-target="#modal-daftar">@lang('index.left.download')</a>
                                @endguest
                                @auth('account')
                                    <a href="{{route('files.download')}}" id="file-download"class="btn btn-danger btn-intip btn-xs">@lang('index.left.download')</a>
                                @endauth
                                    
                                </div>
                            </div>        
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div class="hidden-xs desktop-footer">
                        <h2 class="text-white">@lang('footer.left.title')</h2>
                        <div class="hidden-xs">
                        <br/>
                        </div>
                        <small>
                            @lang('footer.left.detail')
                        </small>
                    </div>
                </div>
                <div class="col-md-6 hidden-xs">
                    <div class="main-image"><img src="{{asset('frontend/images/main-image.png')}}" alt=""></div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>@lang('index.right.boxset')</h2>
                            <p>
                               @lang('index.right.description')
                            </p>
                            <br/>        
                        </div>
                        <div class="col-md-12">
                            <h2 class="nomargin">@lang('index.right.pre-order')</h2>
                            <h2 class="nomargin">@lang('boxset.boxset')</h2>
                            <h2 class="nomargin">@lang('index.left.heading')</h2>
                            <h2 class="nomargin boks">@lang('boxset.edition')</h2>
                            <div class="pull-right hidden-xs inceng">
                                @guest('account') 
                                    <a href="/boxset" class="btn btn-danger btn-intip btn-xs" data-toggle="modal" data-target="#modal-daftar">@lang('index.right.peek')</a>
                                @endguest
                                @auth('account')
                                    <a href="/boxset" class="btn btn-danger btn-intip btn-xs">@lang('index.right.peek')</a>
                                @endauth 
                                
                            </div>
                            <div class="clearfix"></div>
                            <br/>
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
                            <br/>
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <p>
                                        @lang('index.right.pre-order') @lang('boxset.boxset') <br /> @lang('index.right.opened') : @lang('index.right.date')
                                    </p>  
                                </div>
                                <div class="col-md-12 col-xs-6 visible-xs">
                                    @guest('account')      
                                        <a href="#" class="btn btn-danger btn-intip btn-xs" data-toggle="modal" data-target="#modal-daftar" >@lang('index.right.peek')</a>
                                    @endguest
                                    @auth('account')
                                        <a href="/boxset" class="btn btn-danger btn-intip btn-xs">@lang('index.right.peek')</a>
                                    @endauth
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
                    <div class="hidden-xs desktop-footer">
                        <h2 class="text-white">@lang('footer.right.title')</h2>
                    </div>
                    <div class="visible-xs mobilefooter">
                        <h2 class="text-white nomargin">@lang('footer.left.title') @lang('footer.right.title')</h2>
                        <small>
                            @lang('footer.left.detail')
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
            var file = $( this ).data('file');
            if(song !=='' || source !=''){
                $( ".treklist-stream" ).removeClass( "active" )
                $(this).addClass("active")
                player.stop()
                console.log(song)
                $('#song-title').html(song)  
                $('#file-download').attr("href", file);
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
@endsection
