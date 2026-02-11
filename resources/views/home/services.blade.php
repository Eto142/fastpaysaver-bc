@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Our Services</h1>
    <p>Comprehensive financial solutions for individuals and businesses.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Services</div>
  </div>
</section>

<!-- Services Grid -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">What We Offer</span>
      <h2 class="bk-title">Banking Services &amp; Solutions</h2>
      <p class="bk-desc">From everyday banking to specialised financial products, we have everything you need.</p>
    </div>
    <div class="bk-cards-grid">
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-exchange-dollar-line"></i></div>
        <h3>Forex</h3>
        <p>Access competitive foreign exchange rates for international transactions, travel, and cross-border business operations.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-plant-line"></i></div>
        <h3>Agriculture</h3>
        <p>Specialised agricultural lending and financial services designed for farmers, ranchers, and agribusinesses.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-gas-station-line"></i></div>
        <h3>Oil &amp; Gas</h3>
        <p>Custom financing solutions and advisory services for the energy sector, from exploration to production.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-building-4-line"></i></div>
        <h3>Real Estate</h3>
        <p>Residential and commercial real estate financing with competitive rates and flexible terms.</p>
        <a href="{{ url('investment-property') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-shield-user-line"></i></div>
        <h3>Retirement &amp; Insurance</h3>
        <p>Plan for the future with our IRA accounts, pension services, and comprehensive insurance products.</p>
        <a href="{{ url('individual-retirement') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-vip-diamond-line"></i></div>
        <h3>Gold &amp; Precious Metals</h3>
        <p>Invest in gold and precious metals as a hedge against inflation and to diversify your portfolio.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Why Us</span>
      <h2 class="bk-title">Why Choose Fast Pay Saver?</h2>
    </div>
    <div class="bk-page-grid-4">
      <div class="bk-info-card sr">
        <i class="ri-global-line"></i>
        <h4>Global Reach</h4>
        <p>Banking services available worldwide with competitive exchange rates.</p>
      </div>
      <div class="bk-info-card sr">
        <i class="ri-user-star-line"></i>
        <h4>Expert Advisory</h4>
        <p>Dedicated specialists across every industry and financial product.</p>
      </div>
      <div class="bk-info-card sr">
        <i class="ri-lock-line"></i>
        <h4>Secure Platform</h4>
        <p>Bank-grade encryption and 24/7 fraud monitoring on all accounts.</p>
      </div>
      <div class="bk-info-card sr">
        <i class="ri-customer-service-2-line"></i>
        <h4>24/7 Support</h4>
        <p>Round-the-clock customer service via phone, email, and live chat.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to Get Started?</h2>
        <p>Explore our services and find the right solution for your financial needs.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open an Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Us <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
