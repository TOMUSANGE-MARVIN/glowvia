@extends('layouts.app')
@section('body-class', 'page-home')

@push('header')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
@endpush

@section('content')

  @hookinsert('home.content.top')

  <section class="module-content">
    @php
      $heroBg = '';
      if ($slideshow) {
        foreach ($slideshow as $slide) {
          if ($slide['image'][front_locale_code()] ?? false) {
            $heroBg = image_origin($slide['image'][front_locale_code()]);
            break;
          }
        }
      }
    @endphp

    <section class="hero-fashion">
      <video class="hero-video" autoplay muted loop playsinline>
        <source src="/static/media/hero3.mp4" type="video/mp4">
      </video>
      <div class="hero-video-overlay"></div>
      <div class="container">
        <div class="row align-items-center hero-inner">
          <div class="col-12 col-lg-6">
            <div class="hero-text">
              <p class="hero-eyebrow">New Collection {{ date('Y') }}</p>
              <h1 class="hero-headline">
                <span class="reveal-line"><span>Timeless</span></span>
                <span class="reveal-line italic-gold"><span>Elegance</span></span>
                <span class="reveal-line"><span>Redefined</span></span>
              </h1>
              <p class="hero-sub">Where modern luxury meets effortless style.</p>
              <a href="{{ front_route('products.index') }}" class="hero-cta">Explore Collection</a>
            </div>
          </div>
        </div>
      </div>

      {{-- Marquee strip --}}
      <div class="hero-marquee-wrap">
        <div class="hero-marquee-track">
          @php
            $marqueeItems = ['New Arrivals', 'Free Shipping', 'Luxury Fabrics', 'Exclusive Designs', 'Limited Edition', 'Handcrafted', 'Premium Quality', 'Sustainable Fashion'];
          @endphp
          @foreach (array_merge($marqueeItems, $marqueeItems) as $item)
            <span class="hero-marquee-item">{{ $item }}</span>
            <span class="hero-marquee-sep">&#10022;</span>
          @endforeach
        </div>
      </div>
    </section>

    @if (!empty($home_categories))
      <section class="module-line category-circles-section">
        <div class="container">
          <div class="category-circles-wrap">
            @foreach ($home_categories as $cat)
              <a href="{{ $cat['url'] }}" class="category-circle-item sa-fade-up" data-delay="{{ $loop->index * 60 }}">
                <div class="category-circle-img">
                  @if ($cat['image'])
                    <img src="{{ $cat['image'] }}" alt="{{ $cat['name'] }}">
                  @else
                    <div class="category-circle-placeholder">
                      <i class="bi bi-grid"></i>
                    </div>
                  @endif
                </div>
                <span class="category-circle-name">{{ $cat['name'] }}</span>
              </a>
            @endforeach
          </div>
        </div>
      </section>
    @endif

    @hookinsert('home.swiper.after')

    @if (0)
      <section class="module-line">
        <div class="module-banner-2">
          <div class="container">
            <div class="row">
              <div class="col-12 col-md-4 mb-2 mb-lg-0">
                <a href=""><img src="{{ asset('images/demo/banner/banner-3.jpg') }}" class="img-fluid"></a>
              </div>
              <div class="col-12 col-md-8">
                <a href=""><img src="{{ asset('images/demo/banner/banner-4.jpg') }}" class="img-fluid"></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif

    <section class="module-line fp-section sa-fade-up">
      <div class="container">
        <div class="fp-header">
          <div class="fp-heading">
            <p class="fp-eyebrow">Featured</p>
            <h2 class="fp-title">{{ __('front/home.feature_product') }}</h2>
            <p class="fp-subtitle">{{ __('front/home.feature_product_text') }}</p>
          </div>
          <ul class="nav fp-tabs">
            @foreach ($tab_products as $item)
              <li class="nav-item" role="presentation">
                <button class="fp-tab-btn {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                  data-bs-target="#module-product-tab-x-{{ $loop->iteration }}"
                  type="button">{{ $item['tab_title'] }}</button>
              </li>
            @endforeach
          </ul>
        </div>

        <div class="tab-content">
          @foreach ($tab_products as $item)
            <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
              id="module-product-tab-x-{{ $loop->iteration }}">
              <div class="row gx-3 gx-lg-4">
                @foreach ($item['products'] as $product)
                  <div class="col-6 col-md-4 col-lg-3">
                    @include('shared.product')
                  </div>
                @endforeach
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    @if (0)
      <section class="module-line">
        <div class="module-banner-1">
          <div class="container">
            <a href=""><img src="{{ asset('images/demo/banner/banner-5.jpg') }}" class="img-fluid"></a>
          </div>
        </div>
      </section>
    @endif

    <section class="module-line sa-fade-up">
      <div class="module-product-tab">
        <div class="container">
          <div class="module-title-wrap">
            <div class="module-title">{{ __('front/home.news_blog') }}</div>
            <div class="module-sub-title">{{ __('front/home.news_blog_text') }}</div>
          </div>

          <div class="row gx-3 gx-lg-4">
            @foreach ($news as $new)
              <div class="col-6 col-md-4 col-lg-3">
                @include('shared.blog', ['item' => $new])
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </section>

  @hookinsert('home.content.bottom')

@endsection

@push('footer')
<script>
(function () {
  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      const delay = parseInt(el.dataset.delay || '0', 10);
      setTimeout(function () { el.classList.add('in-view'); }, delay);
      observer.unobserve(el);
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.sa-fade-up').forEach(function (el) {
    observer.observe(el);
  });
})();
</script>
@endpush
