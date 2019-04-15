<div id="navbar">
        <div class="container">
            <ul class="nav navbar-nav hidden-xs">
                <li>
                    <a class="home-btn navbar-btn" href="/">
                    <i class="span-bar"></i>
                    <i class="span-bar"></i>
                    </a>
                </li>
                <li><a href="{!!Route('change.language','id')!!}">Bahasa</a></li>
                <li><a href="{!!Route('change.language','en')!!}">English</a></li>
                <li><a href="#">Arabic</a></li>
            </ul> 
            <ul class="nav navbar-nav navbar-right hidden-xs">
                @guest('account')
                <li><a href="#" data-toggle="modal" data-target="#modal-daftar">@lang('header.register')</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modal-masuk">@lang('header.login')</a></li>
                @endguest
                @auth('account')
                    <li><a href="{{ Route('member.nif') }}">NIF</a></li>
                    <li><a href="{{ Route('member.logout') }}">@lang('header.logout')</a></li>
                @endauth
            </ul>
                <div class="navbar-header visible-xs">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="span-bar"></i>
                    <i class="span-bar"></i>
                  </button>
                  <a class="navbar-brand" href="#">FSTVLST II</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="visible-xs">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bahasa <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">English</a></li>
                            <li><a href="#">Arabic</a></li>
                            <li><a href="#">java</a></li>
                        </ul>
                    </li>
                        @guest('account')
                            <li><a href="#" data-toggle="modal" data-target="#modal-daftar">Pendaftaran</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-masuk">Masuk</a></li>
                        @endguest
                        @auth('account')
                            <li><a href="{{ Route('member.nif') }}">NIF</a></li>
                            <li><a href="{{ Route('member.logout') }}">Keluar</a></li>
                        @endauth
                        
                    </ul>
                </div>
                    
                </div>
                
                <!-- /.navbar-collapse -->
        </div>
    </div>