@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Personal Banking</h1>
    <p>Accounts and services designed for your everyday financial needs.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Personal Banking</div>
  </div>
</section>

<!-- Account Options -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Account Options</span>
      <h2 class="bk-title">Find the Right Account for You</h2>
      <p class="bk-desc">Whether you need everyday access or want to grow your savings, we have the perfect account.</p>
    </div>
    <div class="bk-page-grid-3">
      <div class="bk-product-card sr">
        <div class="bk-product-card-head">
          <h3>Everyday Checking</h3>
          <p>For daily transactions</p>
        </div>
        <div class="bk-product-card-body">
          <ul>
            <li><i class="ri-check-line"></i> No monthly fee with direct deposit</li>
            <li><i class="ri-check-line"></i> Free online &amp; mobile banking</li>
            <li><i class="ri-check-line"></i> Free debit card</li>
            <li><i class="ri-check-line"></i> Access to 30,000+ ATMs</li>
            <li><i class="ri-check-line"></i> Overdraft protection available</li>
          </ul>
        </div>
        <div class="bk-product-card-foot">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--fill" style="font-size:.78rem;padding:7px 18px">Open Account <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>

      <div class="bk-product-card sr">
        <div class="bk-product-card-head bk-product-card-head--gold">
          <h3>High-Yield Savings</h3>
          <p>Grow your money faster</p>
        </div>
        <div class="bk-product-card-body">
          <ul>
            <li><i class="ri-check-line"></i> Earn up to 4.25% APY</li>
            <li><i class="ri-check-line"></i> No minimum balance required</li>
            <li><i class="ri-check-line"></i> FDIC insured up to $250,000</li>
            <li><i class="ri-check-line"></i> Automatic savings tools</li>
            <li><i class="ri-check-line"></i> Easy transfers to checking</li>
          </ul>
        </div>
        <div class="bk-product-card-foot">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--fill" style="font-size:.78rem;padding:7px 18px">Start Saving <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>

      <div class="bk-product-card sr">
        <div class="bk-product-card-head bk-product-card-head--blue">
          <h3>Premium Benefits</h3>
          <p>The ultimate banking experience</p>
        </div>
        <div class="bk-product-card-body">
          <ul>
            <li><i class="ri-check-line"></i> Priority customer support</li>
            <li><i class="ri-check-line"></i> Higher transfer limits</li>
            <li><i class="ri-check-line"></i> Exclusive rewards programme</li>
            <li><i class="ri-check-line"></i> Free international transfers</li>
            <li><i class="ri-check-line"></i> Complimentary financial planning</li>
          </ul>
        </div>
        <div class="bk-product-card-foot">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--fill" style="font-size:.78rem;padding:7px 18px">Go Premium <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Features -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <img src="frontassets/images/banner/6.jpg" alt="Personal Banking Features" style="border-radius:var(--r-lg);width:100%;height:320px;object-fit:cover">
      </div>
      <div class="sr">
        <span class="bk-label">Features</span>
        <h2 class="bk-title" style="text-align:left">Banking That Fits Your Life</h2>
        <div style="margin-top:16px">
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-smartphone-line"></i></div>
            <div><h4>Mobile Banking</h4><p>Manage your accounts on the go with our award-winning app.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-shield-check-line"></i></div>
            <div><h4>Advanced Security</h4><p>Biometric login, real-time alerts, and instant card lock.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-customer-service-2-line"></i></div>
            <div><h4>24/7 Support</h4><p>Our team is always available when you need assistance.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-money-dollar-circle-line"></i></div>
            <div><h4>Fee-Free ATMs</h4><p>Access your money at over 30,000 ATMs nationwide for free.</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Testimonials</span>
      <h2 class="bk-title">What Our Customers Say</h2>
    </div>
    <div class="bk-page-grid-3">
      <div class="bk-testi-mini sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>"Switching to Fast Pay Saver was the best financial decision I've made. The savings rates are excellent and the app is incredibly easy to use."</p>
        <div class="bk-testi-mini-author"><div><strong>Michael Johnson</strong><span>Personal Account Holder</span></div></div>
      </div>
      <div class="bk-testi-mini sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>"The customer service is outstanding. They helped me set up my account and walked me through every feature. Truly personal banking."</p>
        <div class="bk-testi-mini-author"><div><strong>Sarah Williams</strong><span>Premium Member</span></div></div>
      </div>
      <div class="bk-testi-mini sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i></div>
        <p>"I love the fee-free ATM network and the budgeting tools in the app. It's helped me save more than I thought possible."</p>
        <div class="bk-testi-mini-author"><div><strong>David Rodriguez</strong><span>Savings Account Holder</span></div></div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to Open Your Account?</h2>
        <p>It takes less than 5 minutes. No paperwork, no hassle.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Get Started Today <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
