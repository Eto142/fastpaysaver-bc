@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Ultimate Checking</h1>
    <p>Premium checking that rewards larger balances with higher interest rates.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('personal') }}">Personal</a> <span>/</span> Ultimate Checking</div>
  </div>
</section>

<!-- Product Detail -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">Premium Account</span>
        <h2 class="bk-title" style="text-align:left">Why Settle for Just Any Checking?</h2>
        <p style="margin-top:12px;line-height:1.8;color:#475569">Our Ultimate Checking comes with interest rates that soar higher as your balance goes up, plus free online banking and unlimited check writing. Earn interest on your balance without sacrificing access with this super account.</p>
        <div style="margin-top:24px">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Open Account <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
      <div class="sr">
        <div class="bk-product-card">
          <div class="bk-pc-head bk-pc-head--gold">
            <i class="ri-vip-crown-line"></i>
            <h3>Ultimate Checking</h3>
            <p>Tiered interest that rewards you</p>
          </div>
          <div class="bk-pc-body">
            <ul>
              <li><i class="ri-check-line"></i> Tiered interest — larger balances earn higher rates</li>
              <li><i class="ri-check-line"></i> Interest compounded and credited monthly</li>
              <li><i class="ri-check-line"></i> $25 monthly fee waived with $10,000 minimum daily balance</li>
              <li><i class="ri-check-line"></i> Free online &amp; mobile banking</li>
              <li><i class="ri-check-line"></i> Free online statements</li>
              <li><i class="ri-check-line"></i> Free debit card</li>
              <li><i class="ri-check-line"></i> Free online check image access</li>
              <li><i class="ri-check-line"></i> Unlimited check writing</li>
              <li><i class="ri-check-line"></i> $50 minimum deposit to open</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Upgrade to Ultimate Checking Today</h2>
        <p>Open your account online in minutes and start earning more.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Get Started <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Us <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
