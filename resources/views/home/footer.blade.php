<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="bk-footer">
  <div class="bk-wrap">
    <div class="bk-footer-grid">
      <!-- Brand -->
      <div class="bk-footer-about">
        <a href="/"><img src="logo02.png" alt="Fast Pay Saver" class="bk-footer-logo"></a>
        <p>Fast Pay Saver Banking Corporation is dedicated to innovating, simplifying, and humanizing digital banking for customers around the world.</p>
        <div class="bk-footer-socials">
          <a href="#" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
          <a href="#" aria-label="Twitter"><i class="ri-twitter-x-line"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
          <a href="#" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
        </div>
      </div>
      <!-- Quick Links -->
      <div class="bk-footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="{{ url('about') }}">About Us</a></li>
          <li><a href="{{ url('personal') }}">Personal Banking</a></li>
          <li><a href="{{ url('business') }}">Business Banking</a></li>
          <li><a href="{{ url('credit-card') }}">Credit Cards</a></li>
          <li><a href="{{ url('loans') }}">Loans</a></li>
        </ul>
      </div>
      <!-- Resources -->
      <div class="bk-footer-col">
        <h4>Resources</h4>
        <ul>
          <li><a href="{{ url('faq') }}">Help &amp; FAQ</a></li>
          <li><a href="{{ url('terms') }}">Terms &amp; Conditions</a></li>
          <li><a href="{{ url('contact') }}">Contact Us</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Security Center</a></li>
        </ul>
      </div>
      <!-- Contact -->
      <div class="bk-footer-col">
        <h4>Contact Us</h4>
        {{-- <div class="bk-footer-contact-item">
          <i class="ri-map-pin-2-line"></i>
          <div><small>Address</small><p>256 Cowbridge Road E, Cardiff CF11 9TN, United Kingdom</p></div>
        </div> --}}
        {{-- <div class="bk-footer-contact-item">
          <i class="ri-phone-line"></i>
          <div><small>Phone</small><p>+44 770 142 3168</p></div>
        </div> --}}
        <div class="bk-footer-contact-item">
          <i class="ri-mail-line"></i>
          <div><small>Email</small><p><a href="mailto:support@fastpaysaverbc.com">support@fastpaysaverbc.com</a></p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="bk-footer-bottom">
    <div class="bk-wrap">
      <div class="bk-footer-bottom-inner">
        <p>&copy; {{ date('Y') }} Fast Pay Saver Banking Corporation. All rights reserved.</p>
        <div class="bk-footer-bottom-links">
          <a href="{{ url('terms') }}">Terms</a>
          <a href="#">Privacy</a>
          <a href="#">Cookies</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Scroll to Top -->
<button class="bk-scroll-top" id="bkScrollTop"><i class="ri-arrow-up-line"></i></button>

<!-- ============================================================
     SCRIPTS
     ============================================================ -->
<script>
(function(){
  /* --- Loader --- */
  window.addEventListener('load', function(){
    var loader = document.getElementById('bkLoader');
    if(loader){ loader.classList.add('done'); }
  });

  /* --- Sticky Header --- */
  var header = document.getElementById('bkHeader');
  window.addEventListener('scroll', function(){
    if(window.scrollY > 50){ header.classList.add('stuck'); }
    else { header.classList.remove('stuck'); }
  });

  /* --- Mobile Drawer --- */
  var burger = document.getElementById('bkBurger');
  var drawer = document.getElementById('bkDrawer');
  var overlay = document.getElementById('bkOverlay');
  var closeBtn = document.getElementById('bkDrawerClose');
  function openDrawer(){ drawer.classList.add('open'); overlay.classList.add('open'); document.body.style.overflow='hidden'; }
  function closeDrawer(){ drawer.classList.remove('open'); overlay.classList.remove('open'); document.body.style.overflow=''; }
  if(burger) burger.addEventListener('click', openDrawer);
  if(closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if(overlay) overlay.addEventListener('click', closeDrawer);

  /* --- Hero Carousel --- */
  var cur = 0, total = 3, timer, INTERVAL = 6000;
  var track = document.getElementById('bkHeroTrack');
  var dots = document.querySelectorAll('#bkDots button');
  var progress = document.getElementById('bkProgress');

  function go(i){
    cur = ((i % total) + total) % total;
    if(track) track.style.transform = 'translateX(-' + (cur * 100) + '%)';
    dots.forEach(function(d,idx){ d.classList.toggle('active', idx===cur); });
    resetProgress();
  }
  function resetProgress(){
    if(!progress) return;
    progress.style.transition = 'none';
    progress.style.width = '0%';
    void progress.offsetWidth;
    progress.style.transition = 'width ' + INTERVAL + 'ms linear';
    progress.style.width = '100%';
  }
  function auto(){ timer = setInterval(function(){ go(cur+1); }, INTERVAL); }
  function stopAuto(){ clearInterval(timer); }
  window.bkSlide = function(d){ stopAuto(); go(cur+d); auto(); };
  window.bkGo = function(i){ stopAuto(); go(i); auto(); };
  resetProgress(); auto();

  /* --- Scroll Top Button --- */
  var stb = document.getElementById('bkScrollTop');
  window.addEventListener('scroll', function(){
    if(stb){ stb.classList.toggle('show', window.scrollY > 400); }
  });
  if(stb) stb.addEventListener('click', function(){ window.scrollTo({top:0,behavior:'smooth'}); });

  /* --- Scroll Reveal --- */
  var srEls = document.querySelectorAll('.sr');
  if('IntersectionObserver' in window){
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if(e.isIntersecting){ e.target.classList.add('in'); obs.unobserve(e.target); }
      });
    }, { threshold: 0.15 });
    srEls.forEach(function(el){ obs.observe(el); });
  } else {
    srEls.forEach(function(el){ el.classList.add('in'); });
  }
})();
</script>
</body>
</html>



