{{-- ── Contact Us ────────────────────────────────────────────── --}}

{{-- Hero --}}
<section class="sp-hero">
  <div class="sp-hero-overlay"></div>
  <div class="container h-100">
    <div class="sp-hero-inner">
      <p class="sp-eyebrow">Reach Out</p>
      <h1 class="sp-hero-title">We'd Love to<br><em>Hear From You</em></h1>
      <p class="sp-hero-sub">Whether you have a question, a custom order in mind, or simply want to say hello — our team is here for you.</p>
    </div>
  </div>
</section>

{{-- Contact channels --}}
<section class="sp-section sp-section--cream">
  <div class="container">
    <div class="row g-4 justify-content-center">
      @foreach([
        ['icon' => 'bi-envelope',    'title' => 'Email Us',       'detail' => 'hello@glowvia.com',   'sub' => 'We respond within 24 hours'],
        ['icon' => 'bi-telephone',   'title' => 'Call or WhatsApp','detail' => '+256 700 000 000',   'sub' => 'Mon – Sat, 9 am – 6 pm EAT'],
        ['icon' => 'bi-geo-alt',     'title' => 'Visit Us',       'detail' => 'Kampala, Uganda',      'sub' => 'Showroom visits by appointment'],
        ['icon' => 'bi-instagram',   'title' => 'Follow Us',      'detail' => '@glowvia.official',   'sub' => 'Stay inspired on Instagram'],
      ] as $ch)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="sp-contact-card">
            <div class="sp-contact-card-icon"><i class="bi {{ $ch['icon'] }}"></i></div>
            <h3 class="sp-contact-card-title">{{ $ch['title'] }}</h3>
            <p class="sp-contact-card-detail">{{ $ch['detail'] }}</p>
            <p class="sp-contact-card-sub">{{ $ch['sub'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Contact form + info --}}
<section class="sp-section">
  <div class="container">
    <div class="row g-5 align-items-start">

      {{-- Form --}}
      <div class="col-12 col-lg-7">
        <p class="sp-label">Send a Message</p>
        <h2 class="sp-section-title">Get in Touch</h2>
        <form class="sp-contact-form" id="contactForm" novalidate>
          <div class="row g-3">
            <div class="col-12 col-sm-6">
              <label class="sp-form-label">Full Name</label>
              <input type="text" class="sp-form-input" name="name" placeholder="Your name" required>
            </div>
            <div class="col-12 col-sm-6">
              <label class="sp-form-label">Email Address</label>
              <input type="email" class="sp-form-input" name="email" placeholder="your@email.com" required>
            </div>
            <div class="col-12">
              <label class="sp-form-label">Subject</label>
              <select class="sp-form-input sp-form-select" name="subject">
                <option value="">Select a topic…</option>
                <option>General Enquiry</option>
                <option>Bespoke / Custom Order</option>
                <option>Personal Styling Consultation</option>
                <option>Alterations & Tailoring</option>
                <option>Corporate & Bulk Order</option>
                <option>Delivery & Shipping</option>
                <option>Other</option>
              </select>
            </div>
            <div class="col-12">
              <label class="sp-form-label">Message</label>
              <textarea class="sp-form-input sp-form-textarea" name="message" rows="6" placeholder="Tell us how we can help…" required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="sp-btn" id="contactSubmitBtn">Send Message</button>
              <p class="sp-form-note" id="contactFormMsg" style="display:none;"></p>
            </div>
          </div>
        </form>
      </div>

      {{-- Side info --}}
      <div class="col-12 col-lg-5">
        <div class="sp-contact-info-panel">
          <p class="sp-label">Our Showroom</p>
          <h3 class="sp-section-title" style="font-size:1.4rem;">Visit Glowvia</h3>
          <p class="sp-body" style="margin-bottom:2rem;">Our atelier and showroom are based in Kampala, Uganda. Walk-ins are welcome during opening hours; appointments are recommended for styling consultations and bespoke fittings.</p>

          <div class="sp-info-row">
            <i class="bi bi-clock"></i>
            <div>
              <strong>Opening Hours</strong><br>
              Monday – Saturday: 9:00 am – 6:00 pm<br>
              Sunday: Closed
            </div>
          </div>
          <div class="sp-info-row">
            <i class="bi bi-geo-alt"></i>
            <div>
              <strong>Location</strong><br>
              Kampala, Uganda
            </div>
          </div>
          <div class="sp-info-row">
            <i class="bi bi-envelope"></i>
            <div>
              <strong>Email</strong><br>
              hello@glowvia.com
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@push('footer')
<script>
  document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = document.getElementById('contactSubmitBtn');
    const msg = document.getElementById('contactFormMsg');
    btn.disabled = true;
    btn.textContent = 'Sending…';
    // Simulated submission — wire to a real endpoint as needed
    setTimeout(function() {
      btn.disabled = false;
      btn.textContent = 'Send Message';
      msg.style.display = 'block';
      msg.style.color = '#7a5c2e';
      msg.textContent = 'Thank you! Your message has been received. We\'ll be in touch shortly.';
      document.getElementById('contactForm').reset();
    }, 900);
  });
</script>
@endpush
