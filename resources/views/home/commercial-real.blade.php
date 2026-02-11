@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Commercial Real Estate Loans</h1>
    <p>Financing solutions for office buildings, retail spaces, and multi-family properties.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('loans') }}">Loans</a> <span>/</span> Commercial Real Estate</div>
  </div>
</section>

<!-- Content with Sidebar -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-sidebar-layout">
      <div class="bk-main-content">
        <div class="bk-content-block sr">
          <img src="frontassets/images/banner/6.jpg" alt="Commercial Real Estate" style="border-radius:var(--r-md);width:100%;height:280px;object-fit:cover;margin-bottom:20px">
          <h2 style="font-size:22px;color:var(--bk-navy);margin-bottom:12px">Finance Your Commercial Property</h2>
          <p style="line-height:1.8;color:#475569">Whether you're purchasing, refinancing, or renovating commercial property, Fast Pay Saver offers competitive commercial real estate loans tailored to your business objectives. Our experienced lending team understands the local market and will work with you to structure the right financing.</p>
        </div>

        <div class="bk-content-block sr" style="margin-top:24px">
          <h3 style="font-size:18px;color:var(--bk-navy);margin-bottom:14px">What We Finance</h3>
          <ul style="list-style:none;padding:0;margin:0">
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Office buildings and professional spaces</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Retail and shopping centres</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Multi-family residential properties</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Industrial and warehouse properties</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Mixed-use developments</li>
            <li style="padding:8px 0"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Land acquisition and construction</li>
          </ul>
          <div style="margin-top:24px">
            <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Apply Now <i class="ri-arrow-right-line"></i></a>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="bk-sidebar">
        <div class="bk-sidebar-box sr">
          <h4>Loan Features</h4>
          <ul>
            <li>Competitive fixed &amp; variable rates</li>
            <li>Flexible terms up to 25 years</li>
            <li>Local decision-making</li>
            <li>Fast pre-approval process</li>
            <li>SBA lending available</li>
          </ul>
        </div>
        <div class="bk-sidebar-box sr">
          <h4>Related Products</h4>
          <ul>
            <li><a href="{{ url('investment-property') }}">Investment Property Loans</a></li>
            <li><a href="{{ url('loans') }}">All Loan Products</a></li>
            <li><a href="{{ url('business') }}">Business Banking</a></li>
          </ul>
        </div>
        <div class="bk-sidebar-box sr">
          <h4>Tags</h4>
          <div class="bk-tag-list">
            <span class="bk-tag">Commercial</span>
            <span class="bk-tag">Real Estate</span>
            <span class="bk-tag">Mortgage</span>
            <span class="bk-tag">Business</span>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to Finance Your Property?</h2>
        <p>Get pre-approved for a commercial real estate loan today.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Apply Now <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Talk to a Specialist <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
