{{-- ── Creations ────────────────────────────────────────────── --}}

{{-- Hero --}}
<section class="sp-hero">
  <div class="sp-hero-overlay"></div>
  <div class="container h-100">
    <div class="sp-hero-inner">
      <p class="sp-eyebrow">Our Work</p>
      <h1 class="sp-hero-title">Where Vision<br><em>Becomes Garment</em></h1>
      <p class="sp-hero-sub">Every piece in the Glowvia collection is a deliberate act of artistry — conceived with intention, cut with precision, and finished by hand.</p>
    </div>
  </div>
</section>

{{-- Intro --}}
<section class="sp-section sp-section--cream">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-12 col-lg-6">
        <div class="sp-image-frame">
          <div class="sp-image-placeholder">
            <i class="bi bi-camera"></i>
            <span>Collection Image</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="sp-text-block">
          <p class="sp-label">The Glowvia Aesthetic</p>
          <h2 class="sp-section-title">Fashion as a First Language</h2>
          <p class="sp-body">At Glowvia, we believe clothing speaks before you do — announcing your presence with quiet confidence and understated luxury. Our design philosophy is rooted in the tension between structure and fluidity, the modern and the timeless.</p>
          <p class="sp-body">Every collection is born from months of research, material sourcing, and iterative design. We do not follow trends. We set the conditions for them.</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Handcrafted --}}
<section class="sp-section sp-section--dark">
  <div class="container">
    <div class="sp-centered">
      <p class="sp-label sp-label--gold">Made in Africa</p>
      <h2 class="sp-section-title sp-section-title--light">Handcrafted in Uganda, Worn Worldwide</h2>
      <p class="sp-body sp-body--muted" style="max-width:680px;margin:0 auto;">Our atelier is based in Kampala, where a dedicated team of skilled artisans brings each design to life. We invest in local craftsmanship, ensuring every person in our supply chain is treated with dignity and paid fairly.</p>
    </div>
  </div>
</section>

{{-- Collections --}}
<section class="sp-section">
  <div class="container">
    <div class="sp-centered mb-5">
      <p class="sp-label">What We Make</p>
      <h2 class="sp-section-title">Signature Collections</h2>
    </div>
    <div class="row g-4">
      @foreach([
        [
          'name'   => 'The Luminary Series',
          'tag'    => 'Eveningwear',
          'body'   => 'Our flagship line of eveningwear. Fluid, luminous, and designed for the woman who commands every room she enters.',
          'icon'   => 'bi-stars',
        ],
        [
          'name'   => 'The Meridian Edit',
          'tag'    => 'Everyday Luxury',
          'body'   => 'Elevated everyday wear. Clean lines, refined cuts, and fabrics that move with you from morning to midnight.',
          'icon'   => 'bi-sun',
        ],
        [
          'name'   => 'The Rift Collection',
          'tag'    => 'Statement Pieces',
          'body'   => 'Bold pieces inspired by the dramatic landscapes of East Africa. Rich textures, earthy tones, and unapologetic silhouettes.',
          'icon'   => 'bi-geo-alt',
        ],
      ] as $col)
        <div class="col-12 col-lg-4">
          <div class="sp-collection-card">
            <div class="sp-collection-icon"><i class="bi {{ $col['icon'] }}"></i></div>
            <p class="sp-collection-tag">{{ $col['tag'] }}</p>
            <h3 class="sp-collection-name">{{ $col['name'] }}</h3>
            <p class="sp-collection-body">{{ $col['body'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Bespoke --}}
<section class="sp-section sp-section--cream">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-12 col-lg-6">
        <div class="sp-text-block">
          <p class="sp-label">Exclusively Yours</p>
          <h2 class="sp-section-title">Bespoke & Made-to-Order</h2>
          <p class="sp-body">For clients who desire something entirely their own, we offer a fully bespoke service. Work directly with our head designer to create a piece conceived around your body, your story, and your vision.</p>
          <p class="sp-body">Every bespoke garment begins with a private consultation and ends with something you will wear for a lifetime.</p>
          <a href="{{ front_route('pages.slugShow', ['slug' => 'services']) }}" class="sp-btn sp-btn--outline">Learn About Our Process</a>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="sp-image-frame">
          <div class="sp-image-placeholder">
            <i class="bi bi-camera"></i>
            <span>Bespoke Image</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="sp-section sp-section--dark">
  <div class="container">
    <div class="sp-cta-block">
      <p class="sp-label sp-label--gold">Ready to Shop?</p>
      <h2 class="sp-section-title sp-section-title--light">Explore the Full Collection</h2>
      <a href="{{ front_route('products.index') }}" class="sp-btn">Shop Now</a>
    </div>
  </div>
</section>
