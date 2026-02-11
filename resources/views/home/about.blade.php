@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>About Us</h1>
    <p>Learn about our mission, values, and the team behind Fast Pay Saver Banking Corporation.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> About Us</div>
  </div>
</section>

<!-- Mission Section -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="bk-content-block sr">
        <span class="bk-label">Our Story</span>
        <h2>Banking With a Purpose</h2>
        <p>Fast Pay Saver Banking Corporation was founded with a clear mission: to make banking simple, accessible, and human. Since launching over a decade ago, we've grown into one of the most trusted digital banking providers in the industry.</p>
        <p>We combine cutting-edge technology with personalised service to deliver an experience that empowers individuals and businesses to take control of their financial future.</p>
        <div class="bk-check-list" style="margin-top:16px">
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div><strong>Innovation First</strong><p>We continuously invest in technology to bring you the best banking experience.</p></div>
          </div>
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div><strong>Customer-Centric</strong><p>Every decision we make starts with our customers' needs.</p></div>
          </div>
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div><strong>Trust &amp; Transparency</strong><p>No hidden fees, no surprises — honest banking you can rely on.</p></div>
          </div>
        </div>
      </div>
      <div class="bk-img-stack sr">
        <img src="frontassets/images/banner/5.jpg" alt="About Us" class="bk-img-main">
        <div class="bk-img-badge">
          <span class="bk-img-badge-num">15+</span>
          <span class="bk-img-badge-txt">Years of<br>Excellence</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Values Section -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Our Values</span>
      <h2 class="bk-title">What Drives Us Forward</h2>
      <p class="bk-desc">The core principles that guide everything we do at Fast Pay Saver.</p>
    </div>
    <div class="bk-page-grid-3">
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-shield-check-line"></i></div>
        <h3>Security</h3>
        <p>Your financial safety is our top priority. We use 256-bit encryption and multi-factor authentication to protect every transaction.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-heart-3-line"></i></div>
        <h3>Integrity</h3>
        <p>We operate with honesty and transparency in every interaction. Our fee structure is straightforward with no hidden charges.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-lightbulb-line"></i></div>
        <h3>Innovation</h3>
        <p>We embrace new technologies to continuously improve our services and deliver smarter banking solutions.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-global-line"></i></div>
        <h3>Global Reach</h3>
        <p>Operating across 180+ countries, we connect people and businesses around the world seamlessly.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-team-line"></i></div>
        <h3>Community</h3>
        <p>We believe in giving back. Our community programmes support education, financial literacy, and local development.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-customer-service-2-line"></i></div>
        <h3>Reliability</h3>
        <p>24/7 customer support, 99.99% uptime, and dedicated relationship managers for every client.</p>
      </div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Why Us</span>
      <h2 class="bk-title">What Sets Us Apart</h2>
    </div>
    <div class="bk-page-grid-4">
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-bank-card-line"></i></div>
        <h3>Multiple Payment Options</h3>
        <p>Credit cards, wire transfers, mobile payments — we support them all.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-exchange-dollar-line"></i></div>
        <h3>Competitive Rates</h3>
        <p>Industry-leading exchange rates and savings interest rates.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-lock-2-line"></i></div>
        <h3>Bank-Grade Security</h3>
        <p>PCI-DSS compliant with advanced fraud detection systems.</p>
      </div>
      <div class="bk-info-card sr">
        <div class="bk-ic-icon"><i class="ri-24-hours-line"></i></div>
        <h3>24/7 Support</h3>
        <p>Round-the-clock assistance via phone, email, and live chat.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Join the Fast Pay Saver Family</h2>
        <p>Open your free account today and experience banking the way it should be.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Us <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
