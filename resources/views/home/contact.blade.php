@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Contact Us</h1>
    <p>Have a question or need support? We're here to help.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Contact</div>
  </div>
</section>

<!-- Map -->
<section class="bk-page-section" style="padding-bottom:0">
  <div class="bk-wrap">
    <iframe class="bk-map sr" src="https://www.google.com/maps?q=Bargate+Dr,+Wolverhampton,+West+Midlands+WV6+0QW,+United+Kingdom&output=embed" allowfullscreen loading="lazy"></iframe>
  </div>
</section>

<!-- Contact Content -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-page-grid-2">
      <!-- Contact Info -->
      <div class="sr">
        <span class="bk-label">Get In Touch</span>
        <h2 class="bk-title" style="text-align:left;margin-bottom:16px">We'd Love to Hear From You</h2>
        <p style="font-size:.86rem;color:var(--txt-m);line-height:1.65;margin-bottom:24px">Whether you have a question about our services, need technical support, or want to open a new account  our team is ready to assist you.</p>

        <div class="bk-feat-item">
          <div class="bk-fi-icon"><i class="ri-map-pin-2-line"></i></div>
          <div>
            <h4>Our Address</h4>
            <p>Bargate Dr. Wolverhampton West Midlands Wv6 0QW, United Kingdom</p>
          </div>
        </div>
        <div class="bk-feat-item">
          <div class="bk-fi-icon"><i class="ri-mail-line"></i></div>
          <div>
            <h4>Email Us</h4>
            <p><a href="mailto:support@fastpaysaverbc.com" style="color:var(--blue)">support@fastpaysaverbc.com</a></p>
          </div>
        </div>
        {{-- <div class="bk-feat-item">
          <div class="bk-fi-icon"><i class="ri-phone-line"></i></div>
          <div>
            <h4>Call Us</h4>
            <p>+44 770 142 3168</p>
          </div>
        </div> --}}
        <div class="bk-feat-item">
          <div class="bk-fi-icon"><i class="ri-time-line"></i></div>
          <div>
            <h4>Working Hours</h4>
            <p>Monday – Friday: 8:00 AM – 6:00 PM GMT<br>Saturday: 9:00 AM – 1:00 PM GMT</p>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="sr">
        <div class="bk-info-card" style="padding:28px 24px">
          <h3 style="font-size:1rem;font-weight:700;margin-bottom:16px">Send Us a Message</h3>

          @if(session('status'))
            <div class="bk-alert bk-alert--success">{{ session('status') }}</div>
          @endif
          @if(session('error'))
            <div class="bk-alert bk-alert--error">{{ session('error') }}</div>
          @endif

          <form method="POST" action="{{ url('contact') }}">
            @csrf
            <div class="bk-form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" id="email" class="bk-input" placeholder="you@example.com" required>
            </div>
            <div class="bk-form-group">
              <label for="subject">Subject</label>
              <input type="text" name="subject" id="subject" class="bk-input" placeholder="How can we help?" required>
            </div>
            <div class="bk-form-group">
              <label for="message">Message</label>
              <textarea name="message" id="message" class="bk-input" placeholder="Tell us more about your enquiry..." required></textarea>
            </div>
            <button type="submit" class="bk-btn bk-btn--fill" style="width:100%;justify-content:center;padding:10px 20px;font-size:.82rem">Send Message <i class="ri-send-plane-line"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
