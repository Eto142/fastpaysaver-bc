@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Overdraft Protection &amp; Sweeps</h1>
    <p>Protect your accounts and automate fund transfers with ease.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('personal') }}">Personal</a> <span>/</span> Overdraft Protection</div>
  </div>
</section>

<!-- Overview -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">Fund Protection</span>
        <h2 class="bk-title" style="text-align:left">Line of Credit Sweeps</h2>
        <p style="margin-top:12px;line-height:1.8;color:#475569">It's always a good plan to protect your funds. With Fast Pay Saver's sweep account options, you can ensure your funds are available when it's time to pay the bills. Automate your fund transfers with a sweep account today.</p>
        <div style="margin-top:24px">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Set Up Protection <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
      <div class="sr">
        <img src="frontassets/images/banner/3.jpg" alt="Overdraft Protection" style="border-radius:var(--r-lg);width:100%;height:320px;object-fit:cover">
      </div>
    </div>
  </div>
</section>

<!-- Features Accordion -->
<section class="bk-page-section--alt">
  <div class="bk-wrap" style="max-width:820px">
    <div class="bk-section-top">
      <span class="bk-label">Options</span>
      <h2 class="bk-title">Sweep Account Options</h2>
    </div>
    <div class="bk-accordion">
      <div class="bk-acc-item open sr">
        <button class="bk-acc-btn">Line of Credit Sweep <i class="ri-add-line"></i></button>
        <div class="bk-acc-body">
          <ul style="list-style:none;padding:0;margin:0">
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Move funds between your checking and line of credit accounts</li>
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Rest easy knowing funds will be available to ensure checks clear</li>
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Reduce interest by automatic sweeps to pay down the loan balance</li>
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Target your own balance — ask your banker how</li>
          </ul>
        </div>
      </div>
      <div class="bk-acc-item sr">
        <button class="bk-acc-btn">Zero Balance / Target Balance / Overdraft Protection <i class="ri-add-line"></i></button>
        <div class="bk-acc-body">
          <ul style="list-style:none;padding:0;margin:0">
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Automate transfers between accounts</li>
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Reduce or eliminate the need for credit — save on interest</li>
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Minimise overdrafts</li>
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Centralise cash for better control and efficiency</li>
            <li style="padding:6px 0"><i class="ri-check-line" style="color:var(--bk-green);margin-right:8px"></i> Consolidate balances for funding needs while separating transaction flow</li>
          </ul>
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
        <h2>Protect Your Accounts Today</h2>
        <p>Set up overdraft protection and never worry about missed payments again.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Get Started <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Us <i class="ri-phone-line"></i></a>
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
