@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Individual Retirement Account</h1>
    <p>Prepare for a secure retirement with tax advantages and competitive returns.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('personal') }}">Personal</a> <span>/</span> IRA</div>
  </div>
</section>

<!-- IRA Overview -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">Retirement Planning</span>
        <h2 class="bk-title" style="text-align:left">Invest in Your Future</h2>
        <p style="margin-top:12px;line-height:1.8;color:#475569">An IRA can prepare you for a secure retirement, offering greater returns than standard savings and a variety of tax advantages and terms to fit your needs. Whether you plan to travel, start a new hobby, or just spend time with family, we can help you achieve financial security.</p>
        <div style="margin-top:24px">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Open an IRA <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
      <div class="sr">
        <div class="bk-product-card">
          <div class="bk-pc-head bk-pc-head--blue">
            <i class="ri-funds-line"></i>
            <h3>IRA Features</h3>
            <p>Tax-advantaged retirement savings</p>
          </div>
          <div class="bk-pc-body">
            <ul>
              <li><i class="ri-check-line"></i> Save for retirement with tax advantages</li>
              <li><i class="ri-check-line"></i> Competitive interest higher than regular savings</li>
              <li><i class="ri-check-line"></i> Available in Traditional and Roth</li>
              <li><i class="ri-check-line"></i> Annual contribution limits apply</li>
              <li><i class="ri-check-line"></i> $1,000 annual catch-up for ages 50+</li>
              <li><i class="ri-check-line"></i> No annual or set-up fees</li>
              <li><i class="ri-check-line"></i> Federally insured</li>
              <li><i class="ri-check-line"></i> $2,500 minimum deposit to open</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Traditional vs Roth -->
<section class="bk-page-section--alt">
  <div class="bk-wrap" style="max-width:820px">
    <div class="bk-section-top">
      <span class="bk-label">Compare</span>
      <h2 class="bk-title">Traditional vs. Roth IRA</h2>
    </div>
    <div class="bk-accordion">
      <div class="bk-acc-item open sr">
        <button class="bk-acc-btn">Traditional IRA <i class="ri-add-line"></i></button>
        <div class="bk-acc-body">
          <p>A Traditional IRA provides potential tax relief today. Contributions may be tax-deductible, and your investments grow tax-deferred until you make withdrawals in retirement. This is ideal if you expect to be in a lower tax bracket when you retire.</p>
        </div>
      </div>
      <div class="bk-acc-item sr">
        <button class="bk-acc-btn">Roth IRA <i class="ri-add-line"></i></button>
        <div class="bk-acc-body">
          <p>A Roth IRA has the potential for the most tax benefit at the time of retirement. Contributions are made with after-tax dollars, but qualified withdrawals in retirement are completely tax-free. This is ideal if you expect to be in a higher tax bracket when you retire.</p>
        </div>
      </div>
      <div class="bk-acc-item sr">
        <button class="bk-acc-btn">Coverdell Education Savings Account (ESA) <i class="ri-add-line"></i></button>
        <div class="bk-acc-body">
          <p>Create an easier transition into college by setting up a savings account early. A Coverdell ESA provides a tax-free safe place to grow competitive dividends and also financial confidence for a new stage in life. Contributions can be used for qualified education expenses from kindergarten through college.</p>
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
        <h2>Start Planning Your Retirement Today</h2>
        <p>Open an IRA account and let your money work harder for your future.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open IRA Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Speak to an Advisor <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Accordion Script -->
<script>
document.addEventListener('DOMContentLoaded',function(){
  document.querySelectorAll('.bk-acc-btn').forEach(function(btn){
    btn.addEventListener('click',function(){
      var item=this.parentElement;
      var open=item.classList.contains('open');
      item.closest('.bk-accordion').querySelectorAll('.bk-acc-item').forEach(function(i){i.classList.remove('open')});
      if(!open) item.classList.add('open');
    });
  });
});
</script>

@include('home.footer')
