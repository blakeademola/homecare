<header class="header-desktop2 d-block d-lg-none">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap2">
                <div class="logo d-block d-lg-none">
                    <a href="#" class="text-dark">
                        <img src="{{ asset('images/icon/homecare.png') }}" alt="Homecare" style="width: 50px; border-radius: 50%" />
                        <strong>
                        H<span class="d-md-inline d-sm-inline d-none">OM</span>E<span class="d-md-inline d-sm-inline d-none">CARE</span>
                        </strong>

                    </a>
                </div>
                <div class="header-button2">
                    <div class="header-button-item js-item-menu">

                    </div>

                    <div class="header-button-item mr-0 js-sidebar-btn">
                        <i class="zmdi zmdi-menu"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
    <div class="logo">
        <a href="#" class="text-dark">
            <img src="{{ asset('images/icon/homecare.png') }}" alt="HOME CARE CRM" style="width: 50px; border-radius: 50%" />
            <strong>
                H<span class="d-md-inline d-sm-inline d-none">OM</span>E<span class="d-md-inline d-sm-inline d-none">CARE</span>
            </strong>
            CRM
        </a>
    </div>

    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">

            </div>
            <h4 class="name">
                <a href="" class="text-dark">

                </a>
            </h4>

            <a href="{{ route('logout') }}">
                Logout
            </a>
        </div>

        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                @include('layouts.partials._menu')
            </ul>
        </nav>
    </div>
</aside>
