@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Business Essentials Account</h1>
    <p>A streamlined business checking account designed for small businesses and startups.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('business') }}">Business</a> <span>/</span> Business Essentials</div>
  </div>
</section>

<!-- Product Detail -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">Starter Account</span>
        <h2 class="bk-title" style="text-align:left">Everything Your Business Needs to Get Started</h2>
        <p style="margin-top:12px;line-height:1.8;color:#475569">Our Business Essentials Account gives you the foundational banking tools to manage your business finances effectively. With low fees, free digital banking, and dedicated support, it's the perfect account for small businesses and startups.</p>
        <div style="margin-top:20px">
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-money-dollar-circle-line"></i></div>
            <div><h4>Low Monthly Fee</h4><p>Just $10/month, waived with $2,500 minimum daily balance.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-smartphone-line"></i></div>
            <div><h4>Free Digital Banking</h4><p>Online and mobile banking with mobile deposit included.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-file-list-3-line"></i></div>
            <div><h4>200 Free Transactions</h4><p>Monthly transactions included with affordable fees for additional items.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-customer-service-2-line"></i></div>
            <div><h4>Dedicated Support</h4><p>Access to business banking specialists during business hours.</p></div>
          </div>
        </div>
        <div style="margin-top:24px">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Open Account <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
      <div class="sr">
        <img src="frontassets/images/banner/7.jpg" alt="Business Essentials" style="border-radius:var(--r-lg);width:100%;height:400px;object-fit:cover">
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Get Started with Business Essentials</h2>
        <p>Open your business account today — it only takes a few minutes.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Us <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
