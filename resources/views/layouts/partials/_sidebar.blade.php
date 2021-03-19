<aside class="menu-sidebar2 d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('dashboard') }}" class="text-dark">
            <img src="{{ asset('images/icon/homecare.png') }}" alt="Home care" style="width: 50px; border-radius: 50%" />
            <strong>HOMECARE</strong>
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
               @include('layouts.partials._menu')
            </ul>
        </nav>
    </div>
</aside>
