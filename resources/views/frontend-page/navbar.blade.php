<div id="navbar">
        <div class="container">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="home-btn navbar-btn" href="index.html">
                    <i class="span-bar"></i>
                    <i class="span-bar"></i>
                    </a>
                </li>
                <li class="hidden-xs"><a href="{!!Route('change.language','id')!!}">Bahasa</a></li>
                <li class="hidden-xs"><a href="{!!Route('change.language','en')!!}">English</a></li>
                <li class="hidden-xs"><a href="#">Arabic</a></li>
                <li class="visible-xs dropdown drop-bhs">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">ID<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{!!Route('change.language','en')!!}">EN</a></li>
                            <li><a href="#">AR</a></li>
                            <li><a href="#">JV</a></li>
                        </ul>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#modal-daftar">NIF</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modal-masuk">Keluar</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
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