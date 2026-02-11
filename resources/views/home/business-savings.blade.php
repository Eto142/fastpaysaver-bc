@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Business Savings Account</h1>
    <p>Store unused assets where they can earn interest until you need them.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('business') }}">Business</a> <span>/</span> Business Savings</div>
  </div>
</section>

<!-- Product Detail -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">Business Account</span>
        <h2 class="bk-title" style="text-align:left">Grow Your Business Reserves</h2>
        <p style="margin-top:12px;line-height:1.8;color:#475569">Store your unused assets in a Business Savings account where they can earn interest until you need them. This account is great for holding cash that is already obligated — for example, money soon to be paid to a supplier — or to accumulate money until a major receipt comes in.</p>
        <div style="margin-top:20px">
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-percent-line"></i></div>
            <div><h4>Competitive Interest</h4><p>Earn competitive rates on your idle business funds.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-hand-coin-line"></i></div>
            <div><h4>Easy Access</h4><p>Access your funds when you need them without penalties.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-shield-check-line"></i></div>
            <div><h4>Secure &amp; Insured</h4><p>Your business deposits are fully insured up to $250,000.</p></div>
          </div>
        </div>
        <div style="margin-top:24px">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Open Business Savings <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
      <div class="sr">
        <img src="frontassets/images/banner/7.jpg" alt="Business Savings" style="border-radius:var(--r-lg);width:100%;height:380px;object-fit:cover">
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to Open a Business Savings Account?</h2>
        <p>Start earning interest on your business funds today.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Get Started <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Talk to a Banker <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
