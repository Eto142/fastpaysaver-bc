@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Terms &amp; Conditions</h1>
    <p>Please read these terms carefully before using our services.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Terms</div>
  </div>
</section>

<!-- Terms Content -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-text-page sr">

      <h2>1. Acceptance of Terms</h2>
      <p>By accessing and using the services of Fast Pay Saver Banking Corporation ("the Bank"), you agree to be bound by these Terms and Conditions. If you do not agree with any part of these terms, you should not use our services.</p>

      <h2>2. Account Opening &amp; Eligibility</h2>
      <p>To open an account, you must be at least 18 years of age and provide valid identification as required by applicable law. The Bank reserves the right to decline any application at its discretion.</p>
      <p>You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete.</p>

      <h2>3. Account Security</h2>
      <p>You are responsible for maintaining the confidentiality of your account credentials, including your password and any security codes. You agree to notify the Bank immediately of any unauthorised use of your account.</p>
      <p>The Bank employs industry-standard security measures but cannot guarantee absolute security of your information transmitted through the internet.</p>

      <h2>4. Services</h2>
      <p>The Bank provides various financial services including but not limited to: savings accounts, checking accounts, loans, credit cards, online banking, and investment services. The availability and terms of specific services may vary and are subject to change.</p>

      <h2>5. Fees &amp; Charges</h2>
      <p>The Bank may charge fees for certain services. A complete schedule of fees is available on our website and at any branch location. The Bank reserves the right to modify fees with prior notice to account holders.</p>

      <h2>6. Electronic Communications</h2>
      <p>By using our services, you consent to receive electronic communications from us. These communications may include account statements, notices, disclosures, and other information required by law.</p>

      <h2>7. Privacy Policy</h2>
      <p>Your privacy is important to us. Our collection and use of personal information is governed by our Privacy Policy, which is incorporated into these Terms by reference.</p>

      <h2>8. Limitation of Liability</h2>
      <p>To the maximum extent permitted by law, the Bank shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use our services.</p>

      <h2>9. Dispute Resolution</h2>
      <p>Any disputes arising from these Terms shall be resolved through binding arbitration in accordance with the rules of the applicable arbitration association. You agree to waive any right to a jury trial.</p>

      <h2>10. Amendments</h2>
      <p>The Bank reserves the right to amend these Terms at any time. Changes will be effective upon posting to our website. Your continued use of our services constitutes acceptance of any modified terms.</p>

      <h2>11. Governing Law</h2>
      <p>These Terms shall be governed by and construed in accordance with the laws of the United Kingdom, without regard to conflict of law principles.</p>

      <h2>12. Contact</h2>
      <p>If you have any questions about these Terms, please contact us at <a href="{{ url('contact') }}" style="color:var(--blue)">our contact page</a> or email us at support@fastpaysaverbc.com.</p>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Have Questions?</h2>
        <p>Our team is happy to help clarify any of our terms or policies.</p>
        <div class="bk-cta-btns">
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--white">Contact Us <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('faq') }}" class="bk-btn bk-btn--glass">View FAQ <i class="ri-question-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
