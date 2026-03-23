@extends('layouts.app')
@section('body-class', 'page-login page-auth')

@section('content')
  @hookinsert('account.login.top')

  <div class="auth-split">

    {{-- ── Left branding panel ─────────────────────────────── --}}
    <div class="auth-panel-left">
      <div class="auth-panel-inner">
        <a href="{{ front_route('home.index') }}" class="auth-brand">
          <span>{{ system_setting('base_site_name', 'InnoShop') }}</span>
        </a>
        <blockquote class="auth-quote">
          <p>"Style is a way to say who you are without having to speak."</p>
          <cite>— Rachel Zoe</cite>
        </blockquote>
      </div>
    </div>

    {{-- ── Right form panel ────────────────────────────────── --}}
    <div class="auth-panel-right">
      <div class="auth-form-wrap">

        <div class="auth-heading">
          <h1 class="auth-title">{{ __('front/login.login') }}</h1>
          <p class="auth-sub">{{ __('front/login.login_text') }}</p>
        </div>

        @if($authMethod === 'both')
          <div class="auth-method-switch mb-4">
            <div class="auth-tab-group" role="group">
              <button type="button" class="auth-tab active" data-method="email">
                {{ __('front/login.login_by_email') }}
              </button>
              <button type="button" class="auth-tab" data-method="phone">
                {{ __('front/login.login_by_phone') }}
              </button>
            </div>
          </div>
        @endif

        <form action="{{ front_route('login.store') }}" class="needs-validation form-wrap" novalidate>
          @csrf

          @if($authMethod === 'email_only' || $authMethod === 'both')
            <div class="auth-form auth-form-email" @if($authMethod === 'both') style="display: none;" @endif>
              <div class="auth-field mb-3">
                <label class="auth-label">{{ __('front/login.email') }}</label>
                <input id="email" type="email" class="auth-input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}"
                       @if($authMethod === 'email_only') required @elseif($authMethod === 'both') data-required-with="email" @endif
                       autocomplete="email" placeholder="you@example.com"/>
                <span class="invalid-feedback"><strong>{{ __('front/login.email_required') }}</strong></span>
              </div>

              <div class="auth-field mb-2">
                <label class="auth-label">{{ __('front/login.password') }}</label>
                <div class="auth-input-group">
                  <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror"
                         name="password"
                         @if($authMethod === 'email_only') required @elseif($authMethod === 'both') data-required-with="email" @endif
                         autocomplete="current-password" placeholder="••••••••"/>
                  <button type="button" class="auth-eye-btn" data-target="password" tabindex="-1">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
                <span class="invalid-feedback"><strong>{{ __('front/login.password_required') }}</strong></span>
              </div>

              @if (!request('iframe'))
                <div class="text-end mb-4">
                  <a href="{{ front_route('forgotten.index') }}" class="auth-link-small">{{ __('front/login.forget_password') }}</a>
                </div>
              @endif
            </div>
          @endif

          @if($authMethod === 'phone_only' || $authMethod === 'both')
            <div class="auth-form auth-form-phone" @if($authMethod === 'both') style="display: none;" @endif>
              <div class="auth-field mb-3">
                <label class="auth-label">{{ __('front/login.telephone') }}</label>
                <div class="row g-2">
                  <div class="col-4">
                    <input type="text" class="auth-input" name="calling_code"
                           @if($authMethod === 'phone_only') required @elseif($authMethod === 'both') data-required-with="phone" @endif
                           placeholder="+256" value="{{ old('calling_code', '+256') }}" />
                  </div>
                  <div class="col-8">
                    <input type="tel" class="auth-input" name="telephone"
                           @if($authMethod === 'phone_only') required @elseif($authMethod === 'both') data-required-with="phone" @endif
                           placeholder="{{ __('front/login.telephone') }}" value="{{ old('telephone') }}" />
                  </div>
                </div>
              </div>
              <div class="auth-field mb-4">
                <label class="auth-label">{{ __('front/login.sms_code') }}</label>
                <div class="auth-input-group">
                  <input type="text" class="auth-input" name="code"
                         @if($authMethod === 'phone_only') required @elseif($authMethod === 'both') data-required-with="phone" @endif
                         placeholder="{{ __('front/login.sms_code') }}" maxlength="6" />
                  <button type="button" class="auth-send-code-btn" id="send-sms-code"
                          @if($authMethod === 'both') data-required-with="phone" @endif>
                    {{ __('front/login.send_code') }}
                  </button>
                </div>
              </div>
            </div>
          @endif

          <button type="button" class="auth-submit-btn form-submit">{{ __('front/login.login_submit') }}</button>

          <p class="auth-switch-link">
            {{ __('front/login.no_account') }}
            <a href="{{ front_route('register.index') }}{{ request('iframe') ? '?iframe=true' : '' }}">{{ __('front/account.register') }}</a>
          </p>
        </form>

        {{-- Social login --}}
        @if(collect(system_setting('social'))->where('active', true)->count())
          <div class="auth-divider"><span>or continue with</span></div>
          <div class="auth-socials">
            @foreach(system_setting('social') as $provider)
              @if($provider['active'])
                <button type="button" class="auth-social-btn auth-social-{{ $provider['provider'] }}"
                        onclick="openSocialLogin('{{ front_root_route('social.redirect', ['provider' => $provider['provider']]) }}')">
                  <i class="bi bi-{{ $provider['provider'] }}"></i>
                  <span>{{ ucfirst($provider['provider']) }}</span>
                </button>
              @endif
            @endforeach
          </div>
        @else
          <div class="auth-divider"><span>or continue with</span></div>
          <div class="auth-socials">
            <button type="button" class="auth-social-btn auth-social-google"
                    onclick="openSocialLogin('#')">
              <svg width="18" height="18" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.35-8.16 2.35-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
              <span>Google</span>
            </button>
            <button type="button" class="auth-social-btn auth-social-facebook"
                    onclick="openSocialLogin('#')">
              <i class="bi bi-facebook"></i>
              <span>Facebook</span>
            </button>
          </div>
        @endif

      </div>
    </div>
  </div>

  @hookinsert('account.login.bottom')
@endsection

@push('footer')
<script>
  const iframe = @json(request('iframe', false));
  const authMethod = @json($authMethod);

  // Password visibility toggle
  document.querySelectorAll('.auth-eye-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      const input = document.getElementById(this.dataset.target);
      const icon = this.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      }
    });
  });

  @if($authMethod === 'both')
    $('.auth-method-switch .auth-tab').on('click', function() {
      const method = $(this).data('method');
      $('.auth-tab').removeClass('active');
      $(this).addClass('active');
      $('.auth-form').hide();
      $('.auth-form-' + method).show();
      $('.auth-form-' + method + ' [data-required-with]').attr('required', true);
      $('.auth-form').not('.auth-form-' + method).find('[data-required-with]').removeAttr('required');
    });
    $('.auth-form-email').show();
    $('.auth-form-email [data-required-with="email"]').attr('required', true);
  @endif

  $('#send-sms-code').on('click', function() {
    const callingCode = $('input[name="calling_code"]').val();
    const telephone = $('input[name="telephone"]').val();
    if (!callingCode || !telephone) { layer.msg('{{ __('front/login.please_enter_phone') }}', {icon: 2}); return; }
    const btn = $(this);
    btn.prop('disabled', true).text('{{ __('front/login.sending') }}...');
    axios.post('{{ front_route('login.sms-code') }}', { calling_code: callingCode, telephone: telephone })
      .then(function(res) {
        if (res.success) {
          layer.msg(res.message, {icon: 1});
          let countdown = 60;
          const timer = setInterval(function() {
            btn.text(countdown + 's');
            countdown--;
            if (countdown < 0) { clearInterval(timer); btn.prop('disabled', false).text('{{ __('front/login.send_code') }}'); }
          }, 1000);
        } else { layer.msg(res.message, {icon: 2}); btn.prop('disabled', false).text('{{ __('front/login.send_code') }}'); }
      }).catch(function() { btn.prop('disabled', false).text('{{ __('front/login.send_code') }}'); });
  });

  inno.validateAndSubmitForm('.form-wrap', function(data) {
    layer.load(2, {shade: [0.3, '#fff']});
    if (authMethod === 'both') {
      const activeMethod = $('.auth-tab.active').data('method');
      if (activeMethod === 'email') { delete data.calling_code; delete data.telephone; delete data.code; }
      else { delete data.email; delete data.password; }
    }
    axios.post($('.form-wrap').attr('action'), data).then(function(res) {
      if (res.success) {
        if (iframe) { setTimeout(() => { parent.layer.closeAll(); parent.window.location.reload(); }, 400); }
        else { layer.msg(res.message, {icon: 1}); location.href = res.data.redirect_uri || '{{ front_route('account.index') }}'; }
      } else { layer.msg(res.message, {icon: 2}); }
    }).finally(function() { layer.closeAll('loading'); });
  });

  function openSocialLogin(url) {
    if (url === '#') return;
    const w = 600, h = 600;
    window.open(url, 'socialLogin', `width=${w},height=${h},top=${(window.innerHeight-h)/2},left=${(window.innerWidth-w)/2}`);
  }
</script>
@endpush
