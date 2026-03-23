@hookinsert('layout.footer.top')

@php
  $newsletterLocations = system_setting('newsletter_display_locations', ['footer']);
  $newsletterLocations = is_array($newsletterLocations) ? $newsletterLocations : ['footer'];
  $showFooterNewsletter = in_array('footer', $newsletterLocations);
@endphp

<footer id="appFooter">
  {{-- ── Newsletter ─────────────────────────────────────────── --}}
  @if($showFooterNewsletter)
    <div class="footer-newsletter-inner">
      <div class="container">
        <div class="fn-nl-wrap">
          <div class="fn-nl-text">
            <p class="fn-nl-eyebrow">Stay in the loop</p>
            <h3 class="fn-nl-title">{{ __('front/newsletter.newsletter') }}</h3>
            <p class="fn-nl-desc">{{ __('front/newsletter.newsletter_desc') }}</p>
          </div>
          <form class="newsletter-form fn-nl-form" action="{{ front_route('newsletter.subscribe') }}" method="POST">
            @csrf
            <input type="hidden" name="source" value="footer">
            <div class="fn-nl-input-group">
              <input type="email" name="email" class="fn-nl-input"
                     placeholder="{{ __('front/newsletter.email_placeholder') }}" required>
              <button type="submit" class="fn-nl-btn">{{ __('front/newsletter.subscribe') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="fn-nl-divider"></div>
  @endif

  {{-- ── Main footer links ──────────────────────────────────── --}}
  <div class="footer-box">
    <div class="container">
      <div class="footer-top-links">
        <div class="row">
          <div class="col-12 col-md-4 footer-item">
            <div class="about">
              <div class="footer-link-title">
                <span>{{ __('front/common.about_us') }}</span>
                <div class="footer-link-icon"><i class="bi bi-plus-lg"></i></div>
              </div>
              <div class="about-text footer-item-content">
                <p>
                  <b>{{ system_setting_locale('meta_description', '') }}</b>
                </p>
              </div>
              @hookinsert('layout.footer.about.after')
            </div>
          </div>
          <div class="col-12 col-md-8">
            <div class="row">
              <div class="col-12 col-md-3 footer-item">
                <div class="footer-links">
                  <div class="footer-link-title">
                    <span>{{ __('front/common.products') }}</span>
                    <div class="footer-link-icon"><i class="bi bi-plus-lg"></i></div>
                  </div>
                  <ul class="footer-item-content">
                    @foreach($footerMenus['categories'] as $item)
                      <li><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-12 col-md-3 footer-item">
                <div class="footer-links">
                  <div class="footer-link-title">
                    <span>{{ __('front/common.news') }}</span>
                    <div class="footer-link-icon"><i class="bi bi-plus-lg"></i></div>
                  </div>
                  <ul class="footer-item-content">
                    @foreach($footerMenus['catalogs'] as $item)
                      <li><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-12 col-md-3 footer-item">
                <div class="footer-links">
                  <div class="footer-link-title">
                    <span>{{ __('front/common.pages') }}</span>
                    <div class="footer-link-icon"><i class="bi bi-plus-lg"></i></div>
                  </div>
                  <ul class="footer-item-content">
                    @foreach($footerMenus['pages'] as $item)
                      <li><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-12 col-md-3 footer-item">
                <div class="footer-links">
                  <div class="footer-link-title">
                    <span>{{ __('front/common.specials') }}</span>
                    <div class="footer-link-icon"><i class="bi bi-plus-lg"></i></div>
                  </div>
                  <ul class="footer-item-content">
                    @foreach($footerMenus['specials'] as $item)
                      <li><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="bottom-box">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="left-links">
              <span class="copyright-text">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
                @if(system_setting('icp_number', ''))
                  <a href="https://beian.miit.gov.cn" class="ms-2" target="_blank">{{ system_setting('icp_number', '') }}</a>
                @endif
              </span>
            </div>
            <div class="powered-by-credit">
              Powered by <a href="https://kicowebdesign.com" target="_blank" rel="noopener">KicoWebDesign</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="payment-icon">
              <img src="{{ asset('images/demo/payment/1.png') }}" class="img-fluid">
              <img src="{{ asset('images/demo/payment/2.png') }}" class="img-fluid">
              <img src="{{ asset('images/demo/payment/3.png') }}" class="img-fluid">
              <img src="{{ asset('images/demo/payment/4.png') }}" class="img-fluid">
              <img src="{{ asset('images/demo/payment/5.png') }}" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

@hookinsert('layout.footer.bottom')

@push('footer')
<script>
  $(document).ready(function() {
    $('.newsletter-form').on('submit', function(e) {
      e.preventDefault();
      const form = $(this);
      const emailInput = form.find('input[name="email"]');
      const submitBtn = form.find('button[type="submit"]');
      const originalBtnText = submitBtn.html();

      if (!emailInput.val() || !emailInput[0].checkValidity()) {
        emailInput[0].reportValidity();
        return false;
      }

      submitBtn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i>');

      const formData = new URLSearchParams();
      formData.append('email', emailInput.val());
      formData.append('source', form.find('input[name="source"]').val() || 'footer');
      formData.append('_token', form.find('input[name="_token"]').val());

      axios.post(form.attr('action'), formData.toString())
        .then(function(res) {
          if (res.success) {
            inno.alert({ msg: res.message || '{{ __('front/newsletter.subscribe_success') }}', type: 'success' });
            emailInput.val('');
          } else {
            inno.alert({ msg: res.message || '{{ __('front/newsletter.subscribe_failed') }}', type: 'danger' });
          }
        })
        .catch(function(error) {
          inno.alert({ msg: error.response?.data?.message || '{{ __('front/newsletter.subscribe_failed') }}', type: 'danger' });
        })
        .finally(function() {
          submitBtn.prop('disabled', false).html(originalBtnText);
        });

      return false;
    });
  });
</script>
@endpush

@if (system_setting('js_code', ''))
  {!! system_setting('js_code', '') !!}
@endif
