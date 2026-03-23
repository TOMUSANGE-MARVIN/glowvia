@hookinsert('layout.header.top')

<header id="appHeader" class="fashion-header">
  {{-- ── Desktop ─────────────────────────────────────────────── --}}
  <div class="fashion-nav">
    <div class="container fashion-nav-inner">

      {{-- Logo --}}
      <div class="fn-logo">
        <a href="{{ front_route('home.index') }}">
          <img src="{{ image_origin(system_setting('front_logo', 'images/logo.svg')) }}" class="img-fluid">
        </a>
      </div>

      {{-- Centre nav --}}
      <nav class="fn-menu d-none d-lg-flex">
        <a class="fn-link {{ (request()->route() && equal_route_name('home.index')) ? 'active' : '' }}"
           href="{{ front_route('home.index') }}">{{ __('front/common.home') }}</a>

        @hookupdate('layouts.header.menu.pc')
        @foreach ($headerMenus as $menu)
          @if ($menu['name'])
            @if ($menu['children'] ?? [])
              <div class="fn-link fn-dropdown-wrap">
                <a class="fn-link {{ (request()->route() && equal_url($menu['url'])) ? 'active' : '' }}"
                   href="{{ $menu['url'] }}">{{ $menu['name'] }}</a>
                <ul class="fn-dropdown">
                  @foreach ($menu['children'] as $child)
                    @if ($child['name'])
                      <li><a href="{{ $child['url'] }}">{{ $child['name'] }}</a></li>
                    @endif
                  @endforeach
                </ul>
              </div>
            @else
              <a class="fn-link {{ (request()->route() && equal_url($menu['url'])) ? 'active' : '' }}"
                 href="{{ $menu['url'] }}">{{ $menu['name'] }}</a>
            @endif
          @endif
        @endforeach
        @endhookupdate
      </nav>

      {{-- Right icons --}}
      <div class="fn-icons">
        {{-- Search --}}
        <button class="fn-icon-btn fn-search-toggle" type="button" aria-label="Search">
          <i class="bi bi-search"></i>
        </button>

        {{-- Account --}}
        <div class="fn-icon-btn fn-dropdown-wrap">
          <a href="{{ front_route('account.index') }}" aria-label="Account">
            <i class="bi bi-person"></i>
          </a>
          <ul class="fn-dropdown fn-dropdown--end">
            @if ($customer)
              <li><a href="{{ front_route('account.index') }}">{{ __('front/account.account') }}</a></li>
              <li><a href="{{ front_route('account.orders.index') }}">{{ __('front/account.orders') }}</a></li>
              <li><a href="{{ front_route('account.favorites.index') }}">{{ __('front/account.favorites') }}</a></li>
              <li><a href="{{ front_route('account.logout') }}">{{ __('front/account.logout') }}</a></li>
            @else
              <li><a href="{{ front_route('login.index') }}">{{ __('front/common.login') }}</a></li>
              <li><a href="{{ front_route('register.index') }}">{{ __('front/common.register') }}</a></li>
            @endif
          </ul>
        </div>

        {{-- Favourites --}}
        <a class="fn-icon-btn d-none d-lg-flex" href="{{ account_route('favorites.index') }}" aria-label="Favourites">
          <i class="bi bi-heart"></i>
          <span class="fn-badge">{{ $favTotal }}</span>
        </a>

        {{-- Cart --}}
        <button class="fn-icon-btn fn-cart-btn" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#miniCart" aria-label="Cart">
          <i class="bi bi-bag"></i>
          <span class="fn-badge header-cart-icon">0</span>
        </button>

        @hookinsert('layouts.header.cart.after')

        {{-- Mobile hamburger --}}
        <button class="fn-icon-btn d-lg-none fn-hamburger"
                data-bs-toggle="offcanvas" data-bs-target="#mobile-menu-offcanvas" aria-label="Menu">
          <i class="bi bi-list"></i>
        </button>
      </div>
    </div>

    {{-- Inline search bar --}}
    <div class="fn-search-bar" id="fnSearchBar">
      <div class="container">
        <form action="{{ front_route('products.index') }}" method="get" class="fn-search-form">
          <i class="bi bi-search"></i>
          <input type="text" name="keyword" placeholder="{{ __('common/base.search') }}"
                 value="{{ request('keyword') }}" autofocus>
          <button type="button" class="fn-search-close" id="fnSearchClose"><i class="bi bi-x-lg"></i></button>
        </form>
      </div>
    </div>
  </div>

  {{-- ── Mobile offcanvas menu ───────────────────────────────── --}}
  <div class="offcanvas offcanvas-start fn-mobile-offcanvas" tabindex="-1" id="mobile-menu-offcanvas">
    <div class="offcanvas-header fn-offcanvas-head">
      <span class="fn-offcanvas-brand">Menu</span>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body fn-offcanvas-body">
      <div class="accordion accordion-flush" id="menu-accordion">
        <div class="accordion-item">
          <div class="nav-item-text">
            <a class="nav-link" href="{{ front_route('home.index') }}">{{ __('front/common.home') }}</a>
          </div>
        </div>

        @hookupdate('layouts.header.menu.mobile')
        @foreach ($headerMenus as $key => $menu)
          @if ($menu['name'])
            <div class="accordion-item">
              <div class="nav-item-text">
                <a class="nav-link" href="{{ $menu['url'] }}">{{ $menu['name'] }}</a>
                @if (isset($menu['children']) && $menu['children'])
                  <span class="collapsed" data-bs-toggle="collapse"
                        data-bs-target="#flush-menu-{{ $key }}"><i class="bi bi-chevron-down"></i></span>
                @endif
              </div>
              @if (isset($menu['children']) && $menu['children'])
                <div class="accordion-collapse collapse" id="flush-menu-{{ $key }}"
                     data-bs-parent="#menu-accordion">
                  <div class="children-group">
                    <ul class="nav flex-column ul-children">
                      @foreach ($menu['children'] as $c_key => $child)
                        @if ($child['name'])
                          <li class="nav-item"><a class="nav-link" href="{{ $child['url'] }}">{{ $child['name'] }}</a></li>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endif
            </div>
          @endif
        @endforeach
        @endhookupdate
      </div>

      <div class="fn-offcanvas-footer">
        <form action="{{ front_route('products.index') }}" method="get" class="search-group">
          <input type="text" class="form-control" name="keyword"
                 placeholder="{{ __('common/base.search') }}" value="{{ request('keyword') }}">
          <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</header>

<script>
  (function () {
    var header = document.getElementById('appHeader');
    function onScroll() {
      header.classList.toggle('scrolled', window.scrollY > 60);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // Search toggle
    var toggle = document.querySelector('.fn-search-toggle');
    var bar    = document.getElementById('fnSearchBar');
    var close  = document.getElementById('fnSearchClose');
    if (toggle && bar && close) {
      toggle.addEventListener('click', function () {
        bar.classList.toggle('open');
        if (bar.classList.contains('open')) bar.querySelector('input').focus();
      });
      close.addEventListener('click', function () { bar.classList.remove('open'); });
    }
  })();
</script>

@hookinsert('layout.header.bottom')
