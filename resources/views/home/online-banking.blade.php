@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Online Banking</h1>
    <p>Bank at your convenience, anytime, anywhere — secure and always available.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Online Banking</div>
  </div>
</section>

<!-- Overview -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <div class="sr">
        <span class="bk-label">Digital Banking</span>
        <h2 class="bk-title" style="text-align:left">Banking Made Simple</h2>
        <p style="margin-top:12px;line-height:1.8;color:#475569">Bank at your convenience with online banking. With this free service, you can access your account information from any computer or mobile device, 24 hours a day. Check your balance, transfer funds, pay bills, and much more. It's always available and totally secure.</p>
        <div style="margin-top:20px">
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-eye-line"></i></div>
            <div><h4>View Balances &amp; Statements</h4><p>Check account balances and download statements anytime.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-exchange-line"></i></div>
            <div><h4>Transfer Funds</h4><p>Move money between accounts or send to other banks instantly.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-bill-line"></i></div>
            <div><h4>Pay Bills Online</h4><p>Schedule one-time or recurring payments to any payee.</p></div>
          </div>
          <div class="bk-feat-item">
            <div class="bk-fi-icon"><i class="ri-lock-line"></i></div>
            <div><h4>Totally Secure</h4><p>256-bit encryption and multi-factor authentication protect your data.</p></div>
          </div>
        </div>
        <div style="margin-top:24px">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Enroll Now <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
      <div class="sr">
        <img src="frontassets/images/banner/4.jpg" alt="Online Banking" style="border-radius:var(--r-lg);width:100%;height:400px;object-fit:cover">
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Get Started with Online Banking</h2>
        <p>Free enrollment. Access your accounts 24/7 from any device.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Sign Up Free <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Need Help? <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
