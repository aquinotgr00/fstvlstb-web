<div id="navbar">
        <div class="container">
            <a class="home-btn navbar-btn navbar-left" href="/">
                <i class="span-bar"></i>
                <i class="span-bar"></i>
            </a>
            <ul class="nav navbar-nav navbar-right">
                @guest('account')
                <li><a href="#" data-toggle="modal" data-target="#modal-daftar">Pendaftaran</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modal-masuk">Masuk</a></li>
                @endguest
                @auth('account')
                    <li><a href="#" data-toggle="modal" data-target="#modal-sukses">NIF</a></li>
                    <li><a href="{{ Route('member.logout') }}">Keluar</a></li>
                @endauth
            </ul>

        </div>
    </div>