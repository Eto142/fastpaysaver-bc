@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Loans</h1>
    <p>Competitive rates and flexible terms for every financial goal.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Loans</div>
  </div>
</section>

<!-- Loan Types -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Options</span>
      <h2 class="bk-title">Explore Our Loan Products</h2>
      <p class="bk-desc">Find the right loan to help you achieve your goals — from home ownership to education.</p>
    </div>
    <div class="bk-cards-grid">
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-user-heart-line"></i></div>
        <h3>Personal Loans</h3>
        <p>Unsecured loans for debt consolidation, home improvements, or life's big moments. Rates from 5.99% APR.</p>
        <a href="{{ url('personal-loan') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-car-line"></i></div>
        <h3>Auto Loans</h3>
        <p>New or used vehicle financing with quick approval and competitive rates from 3.49% APR.</p>
        <a href="{{ route('register') }}" class="bk-card-link">Get Started <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-home-4-line"></i></div>
        <h3>Home Mortgage</h3>
        <p>Fixed and adjustable rate mortgages to make your dream home a reality. Rates from 6.25% APR.</p>
        <a href="{{ route('register') }}" class="bk-card-link">Explore Rates <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-home-gear-line"></i></div>
        <h3>Home Equity</h3>
        <p>Tap into your home's value with a home equity line of credit. Rates from 7.49% APR.</p>
        <a href="{{ url('investment-property') }}" class="bk-card-link">Learn More <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-graduation-cap-line"></i></div>
        <h3>Student Loans</h3>
        <p>Invest in your future with flexible student loan options and deferred payment plans.</p>
        <a href="{{ route('register') }}" class="bk-card-link">Apply Now <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-building-line"></i></div>
        <h3>Business Loans</h3>
        <p>SBA loans, commercial mortgages, and lines of credit to grow your business.</p>
        <a href="{{ url('business') }}" class="bk-card-link">View Options <i class="ri-arrow-right-line"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- Loan Calculator -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Calculator</span>
      <h2 class="bk-title">Estimate Your Monthly Payment</h2>
    </div>
    <div class="bk-calc-box sr">
      <div class="bk-page-grid-2">
        <div>
          <div class="bk-form-group">
            <label>Loan Amount: <strong id="calcAmountLabel">$25,000</strong></label>
            <input type="range" id="calcAmount" class="bk-range" min="1000" max="500000" step="1000" value="25000">
          </div>
          <div class="bk-form-group">
            <label>Interest Rate: <strong id="calcRateLabel">5.99%</strong></label>
            <input type="range" id="calcRate" class="bk-range" min="1" max="20" step="0.25" value="5.99">
          </div>
          <div class="bk-form-group">
            <label>Loan Term: <strong id="calcTermLabel">60 months</strong></label>
            <input type="range" id="calcTerm" class="bk-range" min="12" max="360" step="12" value="60">
          </div>
        </div>
        <div style="display:flex;align-items:center;justify-content:center;flex-direction:column">
          <p style="font-size:14px;color:#64748b;margin-bottom:4px">Estimated Monthly Payment</p>
          <span id="calcResult" style="font-size:42px;font-weight:800;color:var(--bk-navy)">$483</span>
          <p style="font-size:13px;color:#94a3b8;margin-top:8px">*For illustration purposes only</p>
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary" style="margin-top:18px">Apply for This Loan</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Benefits -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <img src="frontassets/images/banner/5.jpg" alt="Loan Benefits" style="border-radius:var(--r-lg);width:100%;height:320px;object-fit:cover">
      </div>
      <div class="sr">
        <span class="bk-label">Advantages</span>
        <h2 class="bk-title" style="text-align:left">Why Borrow With Us?</h2>
        <div style="margin-top:16px">
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-percent-line"></i></div>
            <div><h4>Competitive Rates</h4><p>Some of the lowest rates in the industry with no hidden fees.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-time-line"></i></div>
            <div><h4>Fast Decisions</h4><p>Get pre-approved in minutes with our streamlined application.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-calendar-check-line"></i></div>
            <div><h4>Flexible Terms</h4><p>Choose the repayment schedule that fits your budget.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-customer-service-2-line"></i></div>
            <div><h4>Personal Support</h4><p>Loan specialists available to guide you through every step.</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Process Steps -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">How It Works</span>
      <h2 class="bk-title">Four Simple Steps</h2>
    </div>
    <div class="bk-process-row">
      <div class="bk-process-step sr">
        <div class="bk-ps-num">1</div>
        <h4>Check Your Rate</h4>
        <p>See your rate in minutes without affecting your credit score.</p>
      </div>
      <div class="bk-process-step sr">
        <div class="bk-ps-num">2</div>
        <h4>Choose Your Loan</h4>
        <p>Select the amount, term, and payment that works for you.</p>
      </div>
      <div class="bk-process-step sr">
        <div class="bk-ps-num">3</div>
        <h4>Submit Application</h4>
        <p>Complete the simple online application in under 10 minutes.</p>
      </div>
      <div class="bk-process-step sr">
        <div class="bk-ps-num">4</div>
        <h4>Get Funded</h4>
        <p>Receive funds in your account as soon as the next business day.</p>
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
        <p>Apply for a loan today and get a decision within minutes.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Apply Now <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Talk to a Specialist <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Loan Calculator Script -->
<script>
document.addEventListener('DOMContentLoaded',function(){
  var amt=document.getElementById('calcAmount'),
      rate=document.getElementById('calcRate'),
      term=document.getElementById('calcTerm'),
      res=document.getElementById('calcResult'),
      aL=document.getElementById('calcAmountLabel'),
      rL=document.getElementById('calcRateLabel'),
      tL=document.getElementById('calcTermLabel');
  function calc(){
    var p=parseFloat(amt.value),r=parseFloat(rate.value)/100/12,n=parseInt(term.value);
    aL.textContent='$'+p.toLocaleString();
    rL.textContent=parseFloat(rate.value).toFixed(2)+'%';
    tL.textContent=n+' months';
    if(r===0){res.textContent='$'+(p/n).toFixed(0);return;}
    var m=p*(r*Math.pow(1+r,n))/(Math.pow(1+r,n)-1);
    res.textContent='$'+Math.round(m).toLocaleString();
  }
  amt.addEventListener('input',calc);
  rate.addEventListener('input',calc);
  term.addEventListener('input',calc);
  calc();
});
</script>

@include('home.footer')
