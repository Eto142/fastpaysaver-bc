@include('home.header')

<!-- ============================================================
     HERO CAROUSEL
     ============================================================ -->
<section class="bk-hero">
  <div class="bk-hero-slides" id="bkHeroTrack">
    <!-- Slide 1 -->
    <div class="bk-hero-slide">
      <div class="bk-hero-bg" style="background-image:url('frontassets/images/banner/1.jpg')"></div>
      <div class="bk-wrap">
        <div class="bk-hero-body">
          <span class="bk-hero-label">Welcome to Fast Pay Saver</span>
          <h1>Banking Made<br>Simple &amp; Secure</h1>
          <p>Experience seamless digital banking with industry-leading security. Send, save, and grow your finances with confidence.</p>
          <div class="bk-hero-actions">
            <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Get Started <i class="ri-arrow-right-line"></i></a>
            <a href="{{ url('about') }}" class="bk-btn bk-btn--glass">Learn More <i class="ri-play-circle-line"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="bk-hero-slide">
      <div class="bk-hero-bg" style="background-image:url('frontassets/images/banner/2.jpg')"></div>
      <div class="bk-wrap">
        <div class="bk-hero-body">
          <span class="bk-hero-label">Personal &amp; Business Solutions</span>
          <h1>Your Money,<br>Your Control</h1>
          <p>From personal savings to business accounts  manage it all from one powerful, intuitive platform.</p>
          <div class="bk-hero-actions">
            <a href="{{ url('personal') }}" class="bk-btn bk-btn--white">Personal Banking <i class="ri-arrow-right-line"></i></a>
            <a href="{{ url('business') }}" class="bk-btn bk-btn--glass">Business Banking <i class="ri-arrow-right-line"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="bk-hero-slide">
      <div class="bk-hero-bg" style="background-image:url('frontassets/images/banner/4.jpg')"></div>
      <div class="bk-wrap">
        <div class="bk-hero-body">
          <span class="bk-hero-label">Global Transfers</span>
          <h1>Send Money<br>Anywhere, Anytime</h1>
          <p>Fast international transfers with competitive exchange rates. Trusted by thousands of customers worldwide.</p>
          <div class="bk-hero-actions">
            <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open Account <i class="ri-arrow-right-line"></i></a>
            <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Talk to Us <i class="ri-customer-service-2-line"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <button class="bk-hero-arr bk-hero-arr--prev" onclick="bkSlide(-1)"><i class="ri-arrow-left-s-line"></i></button>
  <button class="bk-hero-arr bk-hero-arr--next" onclick="bkSlide(1)"><i class="ri-arrow-right-s-line"></i></button>
  <div class="bk-hero-dots" id="bkDots">
    <button class="active" onclick="bkGo(0)"></button>
    <button onclick="bkGo(1)"></button>
    <button onclick="bkGo(2)"></button>
  </div>
  <div class="bk-hero-progress"><div class="bk-hero-progress-bar" id="bkProgress"></div></div>
</section>

<!-- ============================================================
     TRUST STRIP
     ============================================================ -->
<section class="bk-trust">
  <div class="bk-wrap">
    <div class="bk-trust-grid">
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-shield-check-line"></i></div>
        <div><strong>FDIC Insured</strong><span>Deposits insured up to $250,000</span></div>
      </div>
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-lock-2-line"></i></div>
        <div><strong>256-bit Encryption</strong><span>Bank-grade security protocols</span></div>
      </div>
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-global-line"></i></div>
        <div><strong>180+ Countries</strong><span>Global transfer network</span></div>
      </div>
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-customer-service-2-line"></i></div>
        <div><strong>24/7 Support</strong><span>Always here to help you</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SERVICES / FEATURES
     ============================================================ -->
<section class="bk-section" id="services">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Our Services</span>
      <h2 class="bk-title">Comprehensive Banking Solutions</h2>
      <p class="bk-desc">Everything you need to manage, grow, and protect your finances  all in one place.</p>
    </div>
    <div class="bk-cards-grid">
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-bank-line"></i></div>
        <h3>Personal Banking</h3>
        <p>Checking and savings accounts designed for everyday life. Earn competitive rates with zero hidden fees.</p>
        <a href="{{ url('personal') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-briefcase-4-line"></i></div>
        <h3>Business Banking</h3>
        <p>Powerful tools to help your business thrive  merchant services, payroll, and treasury management.</p>
        <a href="{{ url('business') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-bank-card-line"></i></div>
        <h3>Credit Cards</h3>
        <p>Rewards cards, cashback programs, and low-APR options. Find the right card for your spending habits.</p>
        <a href="{{ url('credit-card') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-hand-coin-line"></i></div>
        <h3>Loans &amp; Mortgages</h3>
        <p>Personal loans, home mortgages, and auto financing with flexible terms and competitive interest rates.</p>
        <a href="{{ url('loans') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-exchange-dollar-line"></i></div>
        <h3>International Transfers</h3>
        <p>Send money globally with real-time exchange rates. Fast, secure, and with low transfer fees.</p>
        <a href="{{ route('register') }}" class="bk-card-link">Get Started <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-pie-chart-2-line"></i></div>
        <h3>Wealth Management</h3>
        <p>Expert financial planning and investment advisory to grow your portfolio and secure your future.</p>
        <a href="{{ url('about') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     ABOUT / WHY CHOOSE US
     ============================================================ -->
<section class="bk-section bk-section--gray" id="about">
  <div class="bk-wrap">
    <div class="bk-split">
      <div class="bk-split-media sr">
        <div class="bk-img-stack">
          <img src="frontassets/images/banner/5.jpg" alt="Banking" class="bk-img-main">
          <div class="bk-img-badge">
            <span class="bk-img-badge-num">15+</span>
            <span class="bk-img-badge-txt">Years of<br>Excellence</span>
          </div>
        </div>
      </div>
      <div class="bk-split-text sr">
        <span class="bk-label">Why Choose Us</span>
        <h2 class="bk-title">A Bank You Can Truly Trust</h2>
        <p class="bk-desc" style="margin:0 0 20px">Fast Pay Saver Banking Corporation has been transforming digital banking for over a decade. We combine cutting-edge technology with personalised service to deliver an experience that puts you first.</p>
        <div class="bk-check-list">
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div>
              <strong>Transparent Banking</strong>
              <p>No hidden fees, no surprises. What you see is what you get.</p>
            </div>
          </div>
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div>
              <strong>Advanced Security</strong>
              <p>Multi-factor authentication, biometric login, and real-time fraud monitoring.</p>
            </div>
          </div>
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div>
              <strong>Dedicated Support</strong>
              <p>Our team of experts is available around the clock to assist you.</p>
            </div>
          </div>
        </div>
        <a href="{{ url('about') }}" class="bk-btn bk-btn--fill" style="margin-top:20px">More About Us <i class="ri-arrow-right-line"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     EXCHANGE RATES
     ============================================================ -->
<section class="bk-section" id="rates">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Live Rates</span>
      <h2 class="bk-title">Today's Exchange Rates</h2>
      <p class="bk-desc">Competitive rates updated in real time. Send money internationally at the best prices.</p>
    </div>
    <div class="bk-rates-wrap sr">
      <table class="bk-rates-table">
        <thead>
          <tr>
            <th>Currency</th>
            <th>Buy Rate (USD)</th>
            <th>Sell Rate (USD)</th>
            <th>Change</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/gb.png" alt="GBP"><div><b>GBP</b><small>British Pound</small></div></div></td>
            <td class="bk-mono">1.2645</td>
            <td class="bk-mono">1.2590</td>
            <td><span class="bk-badge bk-badge--up">+0.12%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/eu.png" alt="EUR"><div><b>EUR</b><small>Euro</small></div></div></td>
            <td class="bk-mono">1.0842</td>
            <td class="bk-mono">1.0790</td>
            <td><span class="bk-badge bk-badge--up">+0.08%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/jp.png" alt="JPY"><div><b>JPY</b><small>Japanese Yen</small></div></div></td>
            <td class="bk-mono">0.00671</td>
            <td class="bk-mono">0.00665</td>
            <td><span class="bk-badge bk-badge--down">-0.15%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/ca.png" alt="CAD"><div><b>CAD</b><small>Canadian Dollar</small></div></div></td>
            <td class="bk-mono">0.7410</td>
            <td class="bk-mono">0.7365</td>
            <td><span class="bk-badge bk-badge--up">+0.05%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/ch.png" alt="CHF"><div><b>CHF</b><small>Swiss Franc</small></div></div></td>
            <td class="bk-mono">1.1290</td>
            <td class="bk-mono">1.1235</td>
            <td><span class="bk-badge bk-badge--down">-0.03%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ============================================================
     HOW IT WORKS
     ============================================================ -->
<section class="bk-section bk-section--gray">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">How It Works</span>
      <h2 class="bk-title">Open Your Account in Minutes</h2>
      <p class="bk-desc">Getting started with Fast Pay Saver is quick and easy. Follow these simple steps.</p>
    </div>
    <div class="bk-steps">
      <div class="bk-step sr">
        <div class="bk-step-num">01</div>
        <h3>Create Account</h3>
        <p>Sign up online in minutes with just your ID and basic information.</p>
      </div>
      <div class="bk-step-line"></div>
      <div class="bk-step sr">
        <div class="bk-step-num">02</div>
        <h3>Verify Identity</h3>
        <p>Quick and secure verification to protect your account from day one.</p>
      </div>
      <div class="bk-step-line"></div>
      <div class="bk-step sr">
        <div class="bk-step-num">03</div>
        <h3>Fund &amp; Transact</h3>
        <p>Deposit funds, make transfers, and manage your money seamlessly.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     TESTIMONIALS
     ============================================================ -->
<section class="bk-section" id="testimonials">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Testimonials</span>
      <h2 class="bk-title">What Our Customers Say</h2>
      <p class="bk-desc">Hear from people who trust us with their finances every day.</p>
    </div>
    <div class="bk-testimonials-scroll">
      <div class="bk-testimonial sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>"Fast Pay Saver transformed how I manage money. The app is clean, transfers are instant, and the support team is always helpful."</p>
        <div class="bk-testimonial-author">
          <img src="front/images/clients/1.png" alt="Client">
          <div><strong>James Whitfield</strong><span>Business Owner</span></div>
        </div>
      </div>
      <div class="bk-testimonial sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>"I've been with multiple banks and this is by far the best digital banking experience. Low fees, great interface, and real humans when you need help."</p>
        <div class="bk-testimonial-author">
          <img src="front/images/clients/2.png" alt="Client">
          <div><strong>Sarah Mitchell</strong><span>Freelance Designer</span></div>
        </div>
      </div>
      <div class="bk-testimonial sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i></div>
        <p>"The international transfer rates are genuinely competitive. I save hundreds each month compared to my previous bank."</p>
        <div class="bk-testimonial-author">
          <img src="front/images/clients/4.png" alt="Client">
          <div><strong>David George</strong><span>Import/Export</span></div>
        </div>
      </div>
      <div class="bk-testimonial sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>"Opening my business account was so simple. The team walked me through every step. Highly recommended for any entrepreneur."</p>
        <div class="bk-testimonial-author">
          <img src="front/images/clients/5.png" alt="Client">
          <div><strong>Maria Fernandez</strong><span>Startup Founder</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     CTA BANNER
     ============================================================ -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to Start Banking Smarter?</h2>
        <p>Join thousands of satisfied customers. Open your free account in under 5 minutes  no paperwork, no hassle.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open Free Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Us <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
