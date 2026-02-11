@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Personal Loans</h1>
    <p>Flexible financing for life's big moments — from renovations to vacations.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> <a href="{{ url('loans') }}">Loans</a> <span>/</span> Personal Loans</div>
  </div>
</section>

<!-- Content with Sidebar -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-sidebar-layout">
      <div class="bk-main-content">
        <div class="bk-content-block sr">
          <img src="frontassets/images/banner/5.jpg" alt="Personal Loans" style="border-radius:var(--r-md);width:100%;height:280px;object-fit:cover;margin-bottom:20px">
          <h2 style="font-size:22px;color:var(--bk-navy);margin-bottom:12px">A Loan for Whatever You Need</h2>
          <p style="line-height:1.8;color:#475569">Whether it's a sudden expense or a vacation to get away from everything, Fast Pay Saver Banking Corporation can make it happen. Renovate your home, buy a new computer, or pay off your credit cards — anything's possible with a personal loan. Let one of our loan experts customise a loan just for you.</p>
        </div>

        <div class="bk-content-block sr" style="margin-top:24px">
          <h3 style="font-size:18px;color:var(--bk-navy);margin-bottom:14px">Competitive Rates for a Wide Variety of Needs</h3>
          <ul style="list-style:none;padding:0;margin:0">
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Vehicle repairs or upgrades</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Family vacations</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> New hobbies or personal projects</li>
            <li style="padding:8px 0;border-bottom:1px solid #f1f5f9"><i class="ri-check-double-line" style="color:var(--bk-green);margin-right:8px"></i> Repayment terms customised to fit your needs</li>
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
          <h4>Explore More Loans</h4>
          <ul>
            <li><a href="{{ url('loans') }}">All Loan Products</a></li>
            <li><a href="{{ url('investment-property') }}">Investment Property</a></li>
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
        <h2>Get the Funds You Need</h2>
        <p>Apply for a personal loan and get a decision in minutes.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Apply Now <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Us <i class="ri-phone-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
