<!-- HEADER -->
<header>
    <!-- MAIN HEADER -->
    <div id="header" class="p-0">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="/" class="logo">
                            <img src="/assets/img/logo.svg" alt="Electro">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form class="rounded" method="GET" action="{{ route('home') }}">
                            <div class="input-group">
                                <input name="search" class="input px-3 rounded-start-pill" placeholder="بحث...">
                                <button type="submit" class="search-btn rounded-end-pill"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                    @auth
                        <div>
                            <a href="{{ route('user.show', auth()->user()->id) }}">
                                <i class="fa fa-user-o"></i>
                                <span>{{ Str::limit(auth()->user()->first_name. ' '. auth()->user()->first_name, 11, "...")}}</span>
                            </a>
                        </div>
                        @else
                        <div>
                            <a href="{{ route('login') }}">
                                <i class="fa fa-user-o"></i>
                                <span>تسجيل الدخول</span>
                            </a>
                        </div>
                    @endauth

                        @auth
                            @if (auth()->user()->cart)
                            <div class="dropdown">
                                <a class="text-white" href="{{ route('cart.list') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>سلتك</span>
                                    <div id="cart-items" class="qty">{{ auth()->user()->cart?->items->count() }}</div>
                                </a>
                            </div>
                            @else
                            <div class="dropdown">
                                <a class="text-white" href="{{ route('cart.list') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>سلتك</span>
                                    <div id="cart-items" class="qty">{{ auth()->user()->cart?->items->count() }}</div>
                                </a>
                            </div>
                            @endif


                        @endauth

                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>القائمة</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
