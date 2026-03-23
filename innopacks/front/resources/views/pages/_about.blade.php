{{-- ── About Us ─────────────────────────────────────────────── --}}

{{-- Hero --}}
<section class="sp-hero">
  <div class="sp-hero-overlay"></div>
  <div class="container h-100">
    <div class="sp-hero-inner">
      <p class="sp-eyebrow">Our Story</p>
      <h1 class="sp-hero-title">Dressing the World<br><em>in African Luxury</em></h1>
      <p class="sp-hero-sub">Glowvia is a Ugandan luxury fashion house built on the belief that African style deserves a global stage.</p>
    </div>
  </div>
</section>

{{-- Brand statement --}}
<section class="sp-section sp-section--cream">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-12 col-lg-6">
        <div class="sp-text-block">
          <p class="sp-label">Who We Are</p>
          <h2 class="sp-section-title">More Than a Brand — A Movement</h2>
          <p class="sp-body">Founded in Kampala, Glowvia creates clothing for the modern African woman and man: confident, global, rooted in culture, and unafraid to stand out. Every piece is a statement of identity, crafted with the skill of our artisans and the vision of our designers.</p>
          <p class="sp-body">We draw inspiration from the richness of East African heritage — its textiles, its colours, its stories — and translate that inspiration into contemporary silhouettes that feel at home in Kampala, London, Lagos, or New York.</p>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="sp-image-frame">
          <div class="sp-image-placeholder">
            <i class="bi bi-camera"></i>
            <span>Brand Image</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Mission --}}
<section class="sp-section sp-section--dark">
  <div class="container">
    <div class="sp-centered">
      <p class="sp-label sp-label--gold">Our Mission</p>
      <blockquote class="sp-mission-quote">
        "To make luxury fashion that is honest, inclusive, and deeply rooted in African craftsmanship — clothing that lasts in quality, in style, and in meaning."
      </blockquote>
    </div>
  </div>
</section>

{{-- Values --}}
<section class="sp-section">
  <div class="container">
    <div class="sp-centered mb-5">
      <p class="sp-label">What We Stand For</p>
      <h2 class="sp-section-title">Our Values</h2>
    </div>
    <div class="row g-4">
      @foreach([
        ['icon' => 'bi-scissors', 'title' => 'Craftsmanship', 'body' => 'Every Glowvia garment is handled by skilled hands and inspected before it leaves our atelier. We believe in making things properly.'],
        ['icon' => 'bi-person-check', 'title' => 'Authenticity', 'body' => 'We do not imitate. Our designs are original, our voice is distinct, and our identity is entirely our own.'],
        ['icon' => 'bi-people', 'title' => 'Community', 'body' => 'We employ local artisans, source from local suppliers where possible, and invest in the communities that make our work possible.'],
        ['icon' => 'bi-leaf', 'title' => 'Sustainability', 'body' => 'We produce in limited quantities, use quality materials that endure, and are working toward a fully transparent supply chain.'],
      ] as $value)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="sp-value-card">
            <div class="sp-value-icon"><i class="bi {{ $value['icon'] }}"></i></div>
            <h3 class="sp-value-title">{{ $value['title'] }}</h3>
            <p class="sp-value-body">{{ $value['body'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Stats --}}
<section class="sp-section sp-section--cream">
  <div class="container">
    <div class="row g-4 text-center">
      @foreach([
        ['number' => '5+', 'label' => 'Years in Fashion'],
        ['number' => '40+', 'label' => 'Artisans Employed'],
        ['number' => '1,200+', 'label' => 'Garments Created'],
        ['number' => '12+', 'label' => 'Countries Reached'],
      ] as $stat)
        <div class="col-6 col-lg-3">
          <div class="sp-stat">
            <div class="sp-stat-number">{{ $stat['number'] }}</div>
            <div class="sp-stat-label">{{ $stat['label'] }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Contact CTA --}}
<section class="sp-section sp-section--dark">
  <div class="container">
    <div class="sp-cta-block">
      <p class="sp-label sp-label--gold">Find Us</p>
      <h2 class="sp-section-title sp-section-title--light">Visit Our Showroom</h2>
      <p class="sp-body sp-body--muted">Our atelier is located in Kampala, Uganda. Appointments welcome.</p>
      <div class="sp-contact-row">
        <div class="sp-contact-item">
          <i class="bi bi-envelope"></i>
          <span>hello@glowvia.com</span>
        </div>
        <div class="sp-contact-item">
          <i class="bi bi-geo-alt"></i>
          <span>Kampala, Uganda</span>
        </div>
      </div>
      <a href="{{ front_route('products.index') }}" class="sp-btn">Shop the Collection</a>
    </div>
  </div>
</section>
