@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Lost or Stolen Cards</h1>
    <p>Report a lost or stolen card immediately and we'll protect your account.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Lost or Stolen Cards</div>
  </div>
</section>

<!-- Report Section -->
<section class="bk-page-section">
  <div class="bk-wrap" style="max-width:820px">
    <div class="bk-content-block sr">
      <div style="text-align:center;margin-bottom:28px">
        <div style="width:72px;height:72px;border-radius:50%;background:rgba(200,144,46,0.12);display:inline-flex;align-items:center;justify-content:center;margin-bottom:14px">
          <i class="ri-bank-card-line" style="font-size:32px;color:var(--bk-gold)"></i>
        </div>
        <h2 class="bk-title">Report a Lost or Stolen Card</h2>
      </div>
      <p style="line-height:1.8;color:#475569;text-align:center;max-width:600px;margin:0 auto 28px">If your Fast Pay Saver Banking Corporation card has been lost or stolen, notify us immediately. We will freeze your card, monitor for unauthorised activity, and issue a replacement.</p>
      
      <div class="bk-page-grid-2" style="margin-top:28px">
        <div class="bk-info-card sr" style="text-align:center">
          <i class="ri-phone-line"></i>
          <h4>Call Us 24/7</h4>
          <p><a href="tel:+18005550199" style="color:var(--bk-blue);font-weight:600;font-size:18px">1-800-555-0199</a></p>
          <p>Available 24 hours, 7 days a week</p>
        </div>
        <div class="bk-info-card sr" style="text-align:center">
          <i class="ri-mail-send-line"></i>
          <h4>Email Us</h4>
          <p><a href="mailto:{{ $basic->email ?? 'support@fastpaysaver.com' }}" style="color:var(--bk-blue);font-weight:600">{{ $basic->email ?? 'support@fastpaysaver.com' }}</a></p>
          <p>We'll respond within 1 business hour</p>
        </div>
      </div>
    </div>

    <!-- Steps -->
    <div class="bk-section-top" style="margin-top:48px">
      <span class="bk-label">What To Do</span>
      <h2 class="bk-title">Immediate Steps</h2>
    </div>
    <div class="bk-process-row">
      <div class="bk-process-step sr">
        <div class="bk-ps-num">1</div>
        <h4>Lock Your Card</h4>
        <p>Instantly lock your card through our mobile app or online banking portal.</p>
      </div>
      <div class="bk-process-step sr">
        <div class="bk-ps-num">2</div>
        <h4>Call Us</h4>
        <p>Report the loss to our 24/7 support line so we can flag your account.</p>
      </div>
      <div class="bk-process-step sr">
        <div class="bk-ps-num">3</div>
        <h4>Get a Replacement</h4>
        <p>We'll issue a new card and ship it to you within 3–5 business days.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Need Immediate Help?</h2>
        <p>Our team is available around the clock to assist you.</p>
        <div class="bk-cta-btns">
          <a href="tel:+18005550199" class="bk-btn bk-btn--white">Call Now <i class="ri-phone-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Form <i class="ri-mail-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
