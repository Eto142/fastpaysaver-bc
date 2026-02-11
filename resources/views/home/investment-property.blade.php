@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Investment Property Loans</h1>
    <p>Finance residential investment properties with competitive rates and expert guidance.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('loans') }}">Loans</a> <span>/</span> Investment Property</div>
  </div>
</section>

<!-- Content with Sidebar -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-sidebar-layout">
      <div class="bk-main-content">
        <div class="bk-content-block sr">
          <img src="frontassets/images/banner/6.jpg" alt="Investment Property" style="border-radius:var(--r-md);width:100%;height:280px;object-fit:cover;margin-bottom:20px">
          <h2 style="font-size:22px;color:var(--bk-navy);margin-bottom:12px">Diversify Your Business with Property</h2>
          <p style="line-height:1.8;color:#475569">Diversify your business by purchasing property that can serve as an income stream and a long-term investment at the same time. If you've found a good property, we can provide financing for that endeavor. Fast Pay Saver offers a variety of loan programs for residential investment property.</p>
        </div>

        <div class="bk-content-block sr" style="margin-top:24px">
          <h3 style="font-size:18px;color:var(--bk-navy);margin-bottom:14px">What We Offer</h3>
          <ul style="list-style:none;padding:0;margin:0">
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Competitive rates for purchase, refinance, or construction</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Repayment terms customised to fit your needs</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Amortisations without balloons available</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Lending professionals with local real estate knowledge</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Local decision-making and processing</li>
            <li style="padding:8px 0"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Attentive, friendly service from start to finish</li>
          </ul>
          <div style="margin-top:24px">
            <a href="{{ route('register') }}" class="bk-btn bk-btn--primary">Apply Now <i class="ri-arrow-right-line"></i></a>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="bk-sidebar">
        <div class="bk-sidebar-box sr">
          <h4>Our Values</h4>
          <ul>
            <li>Integrity and Honesty</li>
            <li>Loyalty</li>
            <li>Teamwork</li>
            <li>Community</li>
            <li>Accountability</li>
            <li>Excellence</li>
            <li>Confidentiality</li>
            <li>Relationships</li>
          </ul>
        </div>
        <div class="bk-sidebar-box sr">
          <h4>Related Products</h4>
          <ul>
            <li><a href="{{ url('loans') }}">All Loan Products</a></li>
            <li><a href="{{ url('personal-loan') }}">Personal Loans</a></li>
            <li><a href="{{ url('business') }}">Business Banking</a></li>
          </ul>
        </div>
        <div class="bk-sidebar-box sr">
          <h4>Tags</h4>
          <div class="bk-tag-list">
            <span class="bk-tag">Loans</span>
            <span class="bk-tag">Savings</span>
            <span class="bk-tag">Interest</span>
            <span class="bk-tag">Benefits</span>
            <span class="bk-tag">Travel</span>
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
        <h2>Ready to Invest in Property?</h2>
        <p>Get pre-approved for an investment property loan today.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Apply Now <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Talk to a Specialist <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
