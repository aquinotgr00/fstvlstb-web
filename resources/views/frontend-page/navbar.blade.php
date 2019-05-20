    <div id="navbar">
        <div class="container">
            <ul class="nav navbar-nav hidden-xs">
                <li class="mr-3">
                    <a class="home-btn navbar-btn" href="/">
                    <i class="span-bar"></i>
                    <i class="span-bar"></i>
                    </a>
                </li>
                <li><a class="custom-header-font"  href="{!!Route('change.language','id')!!}">@lang('header.lang.bahasa')</a></li>
                <li><a class="custom-header-font"  href="{!!Route('change.language','en')!!}">@lang('header.lang.english')</a></li>
                <li><a class="custom-header-font"  href="{!!Route('change.language','ar')!!}">@lang('header.lang.arab')</a></li>
            </ul> 
            <ul class="nav navbar-nav navbar-right hidden-xs">
                @guest('account')
                <li><a class="custom-header-font"  href="#" data-toggle="modal" data-target="#modal-daftar">@lang('header.register')</a></li>
                <li><a class="custom-header-font"  href="#" data-toggle="modal" data-target="#modal-masuk">@lang('header.login')</a></li>
                @endguest
                @auth('account')
                    <li><a class="custom-header-font" href="{{ Route('member.nif') }}">@lang('header.nif')</a></li>
                    <li><a class="custom-header-font" href="{{ Route('member.logout') }}">@lang('header.logout')</a></li>
                     <li class="dropdown dropdown-cart">
                        <a href="javascript:;" class="custom-header-font dropdown-toggle" role="button" aria-expanded="false">
                            Keranjang :
                            <span class="badge simpleCart_quantity"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li><span class="empty_card_wrapper">Keranjang Anda Kosong</span></li>
                            <li id="main_cart_items" class="simpleCart_items"></li>
                            <li class="checkout checkout_btn_wrapper">
                                <div class="cart_total_wrapper">
                                    <span>Total:</span>
                                    <span class="simpleCart_total"></span>
                                </div>
                                <button class="btn btn-danger btn-intip btn-block btn-submit simpleCart_checkout">Checkout</button>
                            </li>
                        </ul>
                    </li> 
                @endauth
            </ul>
            <div class="navbar-header visible-xs">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="span-bar"></i>
                    <i class="span-bar"></i>
                </button>
                <a class="navbar-brand" href="/">@lang('index.left.heading')</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="visible-xs">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('index.local') <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{!!Route('change.language','id')!!}">@lang('header.lang.bahasa')</a></li>
                                <li><a href="{!!Route('change.language','en')!!}">@lang('header.lang.english')</a></li>
                                <li><a href="{!!Route('change.language','ar')!!}">@lang('header.lang.arab')</a></li>
                            </ul>
                        </li>
                        @guest('account')
                            <li><a href="#" data-toggle="modal" data-target="#modal-daftar">@lang('header.register')</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-masuk">@lang('header.login')</a></li>
                        @endguest
                        @auth('account')
                            <li><a href="{{ Route('member.nif') }}">@lang('header.nif')</a></li>
                            <li><a href="{{ Route('member.logout') }}">@lang('header.logout')</a></li>
                            {{-- <li class="dropdown dropdown-cart">
                                <a href="javascript:;" class="custom-header-font dropdown-toggle" role="button" aria-expanded="false">
                                    Keranjang :
                                    <span class="badge simpleCart_quantity"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-cart" role="menu">
                                    <li><span class="empty_card_wrapper">Keranjang Anda Kosong</span></li>
                                    <li id="mobile_cart_items"></li>
                                    <li class="checkout checkout_btn_wrapper">
                                        <div class="cart_total_wrapper">
                                            <span>Total:</span>
                                            <span class="simpleCart_total"></span>
                                        </div>
                                        <button class="btn btn-danger btn-block btn-submit simpleCart_checkout">Checkout</button>
                                    </li>
                                </ul>
                            </li> --}}
                        @endauth
                    </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>