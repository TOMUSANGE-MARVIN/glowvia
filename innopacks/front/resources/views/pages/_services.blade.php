{{-- ── Services ─────────────────────────────────────────────── --}}

{{-- Hero --}}
<section class="sp-hero">
  <div class="sp-hero-overlay"></div>
  <div class="container h-100">
    <div class="sp-hero-inner">
      <p class="sp-eyebrow">What We Offer</p>
      <h1 class="sp-hero-title">A Complete<br><em>Fashion Experience</em></h1>
      <p class="sp-hero-sub">From your first purchase to a fully bespoke commission, Glowvia offers a suite of services designed entirely around you.</p>
    </div>
  </div>
</section>

{{-- Services grid --}}
<section class="sp-section">
  <div class="container">
    <div class="row g-4">
      @foreach([
        [
          'icon'  => 'bi-person-bounding-box',
          'title' => 'Personal Styling',
          'body'  => 'One-on-one consultations with our in-house stylists, available in person at our Kampala showroom or virtually. We help you build a wardrobe that feels effortlessly right. Sessions by appointment.',
        ],
        [
          'icon'  => 'bi-pencil-square',
          'title' => 'Bespoke & Custom Orders',
          'body'  => 'Have a vision? We bring it to life. From wedding and event attire to one-of-a-kind wardrobe pieces. Consultation, fabric selection, pattern drafting, fittings, and delivery. Lead time: 4–8 weeks.',
        ],
        [
          'icon'  => 'bi-scissors',
          'title' => 'Alterations & Tailoring',
          'body'  => 'Professional alterations on all Glowvia garments — hems, seams, re-cuts, and more. We also accept alterations on select third-party garments. Contact us to discuss your needs.',
        ],
        [
          'icon'  => 'bi-building',
          'title' => 'Corporate & Bulk Orders',
          'body'  => 'Equip your team or event with beautifully designed attire. We work with businesses, NGOs, and event organisers on branded or custom-designed group outfits. Bulk pricing from 10 pieces.',
        ],
        [
          'icon'  => 'bi-gift',
          'title' => 'Gift Cards & Gifting',
          'body'  => 'Give the gift of Glowvia. Digital gift cards are available in any denomination and never expire. Curated gift packaging available on all orders upon request.',
        ],
        [
          'icon'  => 'bi-truck',
          'title' => 'Delivery & Shipping',
          'body'  => 'Same-day dispatch across Uganda for in-stock orders placed before 12 pm. International shipping to selected countries in Africa, Europe, and North America. All orders in our signature Glowvia boxes.',
        ],
      ] as $service)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="sp-service-card">
            <div class="sp-service-icon"><i class="bi {{ $service['icon'] }}"></i></div>
            <h3 class="sp-service-title">{{ $service['title'] }}</h3>
            <p class="sp-service-body">{{ $service['body'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Process --}}
<section class="sp-section sp-section--cream">
  <div class="container">
    <div class="sp-centered mb-5">
      <p class="sp-label">Bespoke Process</p>
      <h2 class="sp-section-title">How It Works</h2>
    </div>
    <div class="sp-process-track">
      @foreach([
        ['step' => '01', 'title' => 'Consultation', 'body' => 'We meet — in person or virtually — to understand your vision, occasion, and style.'],
        ['step' => '02', 'title' => 'Fabric & Design', 'body' => 'Together we select fabrics and finalize the design. Our team drafts the pattern.'],
        ['step' => '03', 'title' => 'Fitting', 'body' => 'Your first fitting. We refine the cut until it is exactly right for your body.'],
        ['step' => '04', 'title' => 'Delivery', 'body' => 'Your finished garment is delivered in our signature Glowvia packaging, ready to wear.'],
      ] as $step)
        <div class="sp-process-step">
          <div class="sp-process-num">{{ $step['step'] }}</div>
          <h4 class="sp-process-title">{{ $step['title'] }}</h4>
          <p class="sp-process-body">{{ $step['body'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Contact CTA --}}
<section class="sp-section sp-section--dark">
  <div class="container">
    <div class="sp-cta-block">
      <p class="sp-label sp-label--gold">Get in Touch</p>
      <h2 class="sp-section-title sp-section-title--light">Ready to Begin?</h2>
      <p class="sp-body sp-body--muted">Book a consultation, place a custom order, or simply say hello.</p>
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
