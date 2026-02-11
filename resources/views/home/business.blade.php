@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Business Banking</h1>
    <p>Financial tools and expertise to help your business thrive.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Business Banking</div>
  </div>
</section>

<!-- Business Solutions -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Solutions</span>
      <h2 class="bk-title">Tailored Business Banking Services</h2>
      <p class="bk-desc">From startups to established enterprises, we provide the tools to fuel your growth.</p>
    </div>
    <div class="bk-cards-grid">
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-building-2-line"></i></div>
        <h3>Business Checking</h3>
        <p>Flexible checking accounts with low fees and high limits designed for your business cash flow needs.</p>
        <a href="{{ route('register') }}" class="bk-card-link">Open Account <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-safe-2-line"></i></div>
        <h3>Business Savings</h3>
        <p>Grow your reserves with competitive interest rates and easy access to funds when you need them.</p>
        <a href="{{ route('register') }}" class="bk-card-link">Start Saving <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-hand-coin-line"></i></div>
        <h3>Business Loans</h3>
        <p>Equipment financing, commercial real estate, and working capital loans to fuel your growth.</p>
        <a href="{{ url('loans') }}" class="bk-card-link">Explore Loans <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-store-2-line"></i></div>
        <h3>Merchant Services</h3>
        <p>Accept payments anywhere with our secure, reliable payment processing solutions.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-money-dollar-circle-line"></i></div>
        <h3>Payroll Services</h3>
        <p>Simplify payroll with automated processing, tax filing, and employee self-service portals.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-line-chart-line"></i></div>
        <h3>Cash Management</h3>
        <p>Optimise your working capital with our comprehensive treasury management solutions.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- Business Features -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">Why Choose Us</span>
        <h2 class="bk-title" style="text-align:left">Business Banking Designed for You</h2>
        <div style="margin-top:16px">
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-user-star-line"></i></div>
            <div><h4>Dedicated Relationship Managers</h4><p>Your own banking expert who understands your business goals.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-smartphone-line"></i></div>
            <div><h4>24/7 Online &amp; Mobile</h4><p>Manage your business finances anytime, anywhere with full digital access.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-percent-line"></i></div>
            <div><h4>Competitive Rates &amp; Low Fees</h4><p>More value for your business with transparent, competitive pricing.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-shield-check-line"></i></div>
            <div><h4>Fraud Protection</h4><p>Advanced security monitoring and real-time alerts to protect your business.</p></div>
          </div>
        </div>
      </div>
      <div class="sr">
        <img src="frontassets/images/banner/7.jpg" alt="Business Banking" style="border-radius:var(--r-lg);width:100%;height:340px;object-fit:cover">
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Success Stories</span>
      <h2 class="bk-title">Trusted by Businesses Everywhere</h2>
    </div>
    <div class="bk-page-grid-3">
      <div class="bk-testi-mini sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>"Fast Pay Saver's business account has streamlined our operations. The merchant services integration was seamless."</p>
        <div class="bk-testi-mini-author"><div><strong>Sarah Johnson</strong><span>CEO, TechStart Inc.</span></div></div>
      </div>
      <div class="bk-testi-mini sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>"The dedicated relationship manager truly understands the restaurant industry. Best banking decision we've made."</p>
        <div class="bk-testi-mini-author"><div><strong>Michael Chen</strong><span>Owner, Chen Restaurants</span></div></div>
      </div>
      <div class="bk-testi-mini sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i></div>
        <p>"Their business loans helped us expand to three new locations. The application process was quick and painless."</p>
        <div class="bk-testi-mini-author"><div><strong>David Rodriguez</strong><span>Rodriguez Construction</span></div></div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to Grow Your Business?</h2>
        <p>Open a business account today or speak to our expert team.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open Business Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Our Team <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
