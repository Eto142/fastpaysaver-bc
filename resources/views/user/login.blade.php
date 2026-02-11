<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.trader.digitalcryptocurrencytrade.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Oct 2022 19:22:45 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="eoH8gBoy6Ta98jODmhTHlIwvVtFwAxOSPlnvaVbT">
        <title>DigitalCryptoTrade | User Login</title>
        
        
        <link rel="icon" href="auth/storage/app/public/photos/UvJWMw59672-cryptocurrency-mining-blockchain-bitcoin-pool-free-transparent-image-hq.png1655237630" type="image/png"/>
                   
            <link href="auth/temp/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <!-- Icons -->
            <link href="auth/temp/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        
            <link rel="auth/stylesheet" href="temp/css/line.css">
            
            <!-- Main Css -->
            <link href="auth/temp/css/style.css" rel="stylesheet" type="text/css" />
            <link href="auth/temp/css/colors/default.css" rel="stylesheet">
        

    </head>
    <body class="h-100 bg-soft-primary">
<!-- Preloader -->
<div class="bk-loader" id="bkLoader">
  <div class="bk-loader-content">
    <div class="bk-loader-icon">
      <svg viewBox="0 0 48 48" fill="none"><path class="bk-shield" d="M24 4L6 12v12c0 11.1 7.7 21.5 18 24 10.3-2.5 18-12.9 18-24V12L24 4z" stroke="currentColor" stroke-width="2"/><path class="bk-check" d="M16 24l6 6 10-12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
    <div class="bk-loader-bar"><div class="bk-loader-bar-fill"></div></div>
    <p class="bk-loader-text">Securing your connection<span class="bk-loader-dots"></span></p>
  </div>
</div>
<style>
.bk-loader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    min-height: 100vh;
    min-height: 100dvh;
    background: #0c2340;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    transition: opacity .6s ease, visibility .6s ease;
    overflow: hidden;
}
.bk-loader.done { opacity: 0; visibility: hidden; pointer-events: none; }
.bk-loader-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    text-align: center;
    padding: 20px;
    width: 100%;
    max-width: 280px;
}
.bk-loader-icon { width: 56px; height: 56px; color: rgba(255,255,255,.85); animation: lPulse 1.6s ease-in-out infinite, lEntry .5s ease both; flex-shrink: 0; }
.bk-loader-icon svg { width: 100%; height: 100%; }
.bk-shield { stroke-dasharray: 140; stroke-dashoffset: 140; animation: lDraw 1.2s .2s ease forwards; }
.bk-check { stroke-dasharray: 40; stroke-dashoffset: 40; animation: lDraw .6s 1s ease forwards; }
.bk-loader-bar { width: 100%; max-width: 160px; height: 2px; background: rgba(255,255,255,.08); border-radius: 2px; overflow: hidden; animation: lEntry .5s .1s ease both; }
.bk-loader-bar-fill { width: 0; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,.15), rgba(255,255,255,.6)); border-radius: 2px; animation: lFill 2s .3s ease forwards; }
.bk-loader-text { color: rgba(255,255,255,.5); font-family: 'Inter', sans-serif; font-size: .65rem; font-weight: 500; letter-spacing: 1px; text-transform: uppercase; animation: lEntry .5s .25s ease both; white-space: nowrap; }
.bk-loader-dots::after { content: ''; animation: lDots 1.4s steps(4, end) infinite; }
@keyframes lEntry { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
@keyframes lPulse { 0%, 100% { opacity: .85; transform: scale(1); } 50% { opacity: 1; transform: scale(1.06); } }
@keyframes lDraw { to { stroke-dashoffset: 0; } }
@keyframes lFill { 0% { width: 0; } 50% { width: 65%; } 100% { width: 100%; } }
@keyframes lDots { 0% { content: ''; } 25% { content: '.'; } 50% { content: '..'; } 75% { content: '...'; } }
</style>
        <div class="container">
            <div class="pb-3 row justify-content-center">

                <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6">
                    <a href="index.html"><img src="storage/app/public/photos/UvJWMwDigital%20Crypto%20Trade.png1655237630" alt="" class="mb-3 img-fluid auth__logo"></a>
                    
                                                                    <div class="bg-white shadow card login-page roundedd border-1 ">
                        <div class="card-body">
                            <h4 class="text-center card-title">User Login</h4>
                            <form method="POST" action="{{ route('login') }}">
                                           @csrf                             
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Email <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="pl-5 form-control" name ="email" value="" id="email" placeholder="name@example.com" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="pl-5 form-control" name="password" id="password" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1" name="remember">
                                                    <label class="custom-control-label" for="customCheck1">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <p class="mb-0 forgot-pass"><a href="forgot-password.html"
                                                    class="text-dark font-weight-bold">Forgot password ?</a></p>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="mb-0 col-lg-12">
                                        <button class="btn btn-primary btn-block pad" type="submit">Sign in</button>
                                    </div>
                                    <!--end col-->

                                    <div class="mt-4 text-center col-lg-12">
                                                                                <h6>Or Login With</h6>
                                        <div class="row">

                                            <!--end col-->
                                            <div class="mt-3 col-12">
                                                <a href="https://accounts.google.com/o/oauth2/auth?client_id=your+client+ID&amp;redirect_uri=http%3A%2F%2Fyoursiteurl%2Fauth%2Fgoogle%2Fcallback&amp;scope=openid+profile+email&amp;response_type=code&amp;state=tcxfhkACXWQiiwO46pC7EG3rPTQGQeDWqBsYbsVL" class="btn btn-block btn-light"><i
                                                        class="mdi mdi-google text-danger"></i> Google</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                                                            </div>
                                    <!--end col-->
                                    <!--end col-->

                                    <div class="text-center col-12">
                                        <p class="mt-3 mb-0"><small class="mr-2 text-dark">Don't have an account
                                                ?</small> <a href="register.html"
                                                class="text-dark font-weight-bold">Sign Up</a></p>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="text-center col-12">
                                        <p class="mt-4 mb-0"><small class="mr-2 text-dark">&copy; Copyright  2022 &nbsp; DigitalCryptoTrade &nbsp; All Rights Reserved.</small>
                                        </p>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                    <!---->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->




                 <script src="auth/temp/js/jquery-3.5.1.min.js"></script>
            <script src="auth/temp/js/bootstrap.bundle.min.js"></script>
            
            <!-- SLIDER -->
            <script src="auth/temp/js/owl.carousel.min.js"></script>
            <script src="auth/temp/js/owl.init.js"></script>
            <!-- Icons -->
            <script src="auth/temp/js/feather.min.js"></script>
            <script src="auth/temp/js/bundle.html"></script>
            
            <script src="auth/temp/js/app.js"></script>
            <script src="auth/temp/js/widget.js"></script>
<script>window.addEventListener('load',function(){var l=document.getElementById('bkLoader');if(l)l.classList.add('done')})</script>
       

    </body>

<!-- Mirrored from www.trader.digitalcryptocurrencytrade.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Oct 2022 19:22:57 GMT -->
</html>
