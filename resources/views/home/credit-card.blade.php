@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Credit Cards</h1>
    <p>Choose the card that fits your lifestyle with great rewards and low rates.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Credit Cards</div>
  </div>
</section>

<!-- Cards -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Our Cards</span>
      <h2 class="bk-title">Find the Right Card for You</h2>
      <p class="bk-desc">Whether you want cash back, travel rewards, or a low rate, we have a card for you.</p>
    </div>
    <div class="bk-page-grid-3">
      <div class="bk-product-card sr">
        <div class="bk-pc-head bk-pc-head--gold">
          <i class="ri-money-dollar-circle-line"></i>
          <h3>Cash Rewards Card</h3>
          <p>Up to 5% cash back on everyday purchases</p>
        </div>
        <div class="bk-pc-body">
          <ul>
            <li><i class="ri-check-line"></i> 5% back on rotating categories</li>
            <li><i class="ri-check-line"></i> 2% back at supermarkets &amp; gas stations</li>
            <li><i class="ri-check-line"></i> 1% unlimited on all other purchases</li>
            <li><i class="ri-check-line"></i> No annual fee</li>
            <li><i class="ri-check-line"></i> $200 sign-up bonus</li>
            <li><i class="ri-check-line"></i> 0% intro APR for 15 months</li>
          </ul>
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary" style="width:100%;text-align:center">Apply Now</a>
        </div>
      </div>
      <div class="bk-product-card sr">
        <div class="bk-pc-head bk-pc-head--blue">
          <i class="ri-flight-takeoff-line"></i>
          <h3>Travel Rewards Card</h3>
          <p>Earn miles on every purchase</p>
        </div>
        <div class="bk-pc-body">
          <ul>
            <li><i class="ri-check-line"></i> 3x miles on travel &amp; dining</li>
            <li><i class="ri-check-line"></i> 1.5x miles on all other purchases</li>
            <li><i class="ri-check-line"></i> 60,000 bonus miles after $3,000 spend</li>
            <li><i class="ri-check-line"></i> No foreign transaction fees</li>
            <li><i class="ri-check-line"></i> Airport lounge access</li>
            <li><i class="ri-check-line"></i> Travel insurance included</li>
          </ul>
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary" style="width:100%;text-align:center">Apply Now</a>
        </div>
      </div>
      <div class="bk-product-card sr">
        <div class="bk-pc-head bk-pc-head--green">
          <i class="ri-percent-line"></i>
          <h3>Low Interest Card</h3>
          <p>Great for balance transfers and large purchases</p>
        </div>
        <div class="bk-pc-body">
          <ul>
            <li><i class="ri-check-line"></i> 0% intro APR for 21 months</li>
            <li><i class="ri-check-line"></i> Low ongoing APR from 11.99%</li>
            <li><i class="ri-check-line"></i> No balance transfer fee</li>
            <li><i class="ri-check-line"></i> No annual fee</li>
            <li><i class="ri-check-line"></i> Free FICO score access</li>
            <li><i class="ri-check-line"></i> Payment flexibility options</li>
          </ul>
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary" style="width:100%;text-align:center">Apply Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Benefits -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Benefits</span>
      <h2 class="bk-title">Every Card Comes With</h2>
    </div>
    <div class="bk-page-grid-4">
      <div class="bk-info-card sr">
        <i class="ri-shield-check-line"></i>
        <h4>Zero Fraud Liability</h4>
        <p>You won't be held responsible for unauthorised charges on your account.</p>
      </div>
      <div class="bk-info-card sr">
        <i class="ri-lock-line"></i>
        <h4>Card Lock</h4>
        <p>Instantly lock or unlock your card from the mobile app if it's lost or stolen.</p>
      </div>
      <div class="bk-info-card sr">
        <i class="ri-notification-3-line"></i>
        <h4>Real-Time Alerts</h4>
        <p>Get instant notifications for every transaction, keeping you in control.</p>
      </div>
      <div class="bk-info-card sr">
        <i class="ri-smartphone-line"></i>
        <h4>Mobile Wallet</h4>
        <p>Add your card to Apple Pay, Google Pay, or Samsung Pay for easy tap-to-pay.</p>
      </div>
    </div>
  </div>
</section>

<!-- Comparison Table -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Compare</span>
      <h2 class="bk-title">Quick Card Comparison</h2>
    </div>
    <div style="overflow-x:auto" class="sr">
      <table class="bk-compare-table">
        <thead>
          <tr><th>Feature</th><th>Cash Rewards</th><th>Travel Rewards</th><th>Low Interest</th></tr>
        </thead>
        <tbody>
          <tr><td>Annual Fee</td><td>$0</td><td>$95</td><td>$0</td></tr>
          <tr><td>Intro APR</td><td>0% for 15 months</td><td>N/A</td><td>0% for 21 months</td></tr>
          <tr><td>Regular APR</td><td>16.99% – 24.99%</td><td>18.99% – 25.99%</td><td>11.99% – 21.99%</td></tr>
          <tr><td>Rewards Rate</td><td>1%–5% cash back</td><td>1.5x–3x miles</td><td>1% cash back</td></tr>
          <tr><td>Sign-Up Bonus</td><td>$200</td><td>60,000 miles</td><td>N/A</td></tr>
          <tr><td>Foreign Fees</td><td>3%</td><td>None</td><td>3%</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to Choose Your Card?</h2>
        <p>Apply online in minutes. Get a decision in seconds.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Apply Now <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Talk to an Advisor <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
