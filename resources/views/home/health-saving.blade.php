@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Health Savings Account</h1>
    <p>Save tax-free for medical expenses with competitive interest rates.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('personal') }}">Personal</a> <span>/</span> Health Savings</div>
  </div>
</section>

<!-- Product Detail -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">HSA Account</span>
        <h2 class="bk-title" style="text-align:left">A Smart Way to Save for Healthcare</h2>
        <p style="margin-top:12px;line-height:1.8;color:#475569">An HSA helps employees save in advance for future medical expenses. Both you and your employees can contribute to the account tax-free, and balances over $100 earn competitive, tiered interest. Employees can pay for qualified medical expenses at any time — without paying a penalty for withdrawal.</p>
      </div>
      <div class="sr">
        <img src="frontassets/images/banner/5.jpg" alt="Health Savings" style="border-radius:var(--r-lg);width:100%;height:320px;object-fit:cover">
      </div>
    </div>
  </div>
</section>

<!-- Two Column Features -->
<section class="bk-page-section--alt">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <h2 class="bk-title" style="text-align:left;font-size:22px">Employment Benefits</h2>
        <div style="margin-top:16px">
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-heart-pulse-line"></i></div>
            <div><h4>Great Employee Benefit</h4><p>Provide valuable health savings to your workforce.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-team-line"></i></div>
            <div><h4>Retain &amp; Attract Talent</h4><p>A competitive benefits package helps recruit top employees.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-money-dollar-circle-line"></i></div>
            <div><h4>Tax-Deductible Contributions</h4><p>Employer contributions are fully tax-deductible.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-shield-star-line"></i></div>
            <div><h4>Reduced Insurance Premiums</h4><p>Pair with a high-deductible plan for lower costs.</p></div>
          </div>
        </div>
      </div>
      <div class="sr">
        <h2 class="bk-title" style="text-align:left;font-size:22px">Account Features</h2>
        <div class="bk-product-card" style="margin-top:16px">
          <div class="bk-pc-head bk-pc-head--green">
            <i class="ri-heart-add-line"></i>
            <h3>HSA Benefits</h3>
            <p>Tax-advantaged health savings</p>
          </div>
          <div class="bk-pc-body">
            <ul>
              <li><i class="ri-check-line"></i> Interest-bearing account</li>
              <li><i class="ri-check-line"></i> Use funds on any qualified medical expense</li>
              <li><i class="ri-check-line"></i> Contributions are tax-deductible</li>
              <li><i class="ri-check-line"></i> Earnings are tax-deferred</li>
              <li><i class="ri-check-line"></i> Reduce HDHP costs</li>
              <li><i class="ri-check-line"></i> Unused funds roll over toward retirement</li>
              <li><i class="ri-check-line"></i> Free debit card included</li>
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
        <h2>Start Saving on Healthcare Costs</h2>
        <p>Open an HSA today and enjoy tax-free savings for medical expenses.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open HSA Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Learn More <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
