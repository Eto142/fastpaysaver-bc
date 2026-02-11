<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Create Account - Fast Pay Saver Banking Corporation</title>
<meta name="description" content="Open a new account with Fast Pay Saver Banking Corporation. Quick, secure registration.">
<link rel="icon" type="image/png" href="{{ asset('storage/app/public/photos/SogsHXqU6Y0ICRb6DyZgVRWFyDOm44mgql9lWKwW.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/modern-homepage.css') }}">
</head>
<body class="bk-body" style="background:var(--off)">

<!-- Auth Layout -->
<div class="bk-auth">

  <!-- Left Branding Panel -->
  <div class="bk-auth-brand">
    <div class="bk-auth-shape bk-auth-shape--1"></div>
    <div class="bk-auth-shape bk-auth-shape--2"></div>
    <div class="bk-auth-shape bk-auth-shape--3"></div>
    <div class="bk-auth-brand-inner">
      <a href="/"><img src="{{ asset('logo02.png') }}" alt="Fast Pay Saver Banking Corporation" class="bk-auth-brand-logo"></a>
      <h1>Start Banking Today</h1>
      <p>Open your account in minutes. Enjoy secure transfers, competitive rates, and 24/7 access to your finances.</p>
      <div class="bk-auth-features">
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-shield-check-line"></i></div>
          <span>Bank-Level Security</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-time-line"></i></div>
          <span>Quick Setup</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-money-dollar-circle-line"></i></div>
          <span>No Hidden Fees</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-customer-service-2-line"></i></div>
          <span>24/7 Support</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel — Register Form -->
  <div class="bk-auth-main" style="overflow-y:auto">
    <div class="bk-auth-card" style="max-width:520px">

      <!-- Card Header -->
      <div class="bk-auth-card-head">
        <img src="{{ asset('logo1.png') }}" alt="Fast Pay Saver Banking Corporation" class="bk-auth-card-logo">
        <h2>Create Your Account</h2>
        <p>Fill in your details to open a new banking account.</p>


      </div>

      <!-- Card Body -->
      <div class="bk-auth-card-body">

        @if (session('error'))
        <div class="bk-alert bk-alert--error"><i class="ri-error-warning-line"></i> {{ session('error') }}</div>
        @endif
        @if (session('status'))
        <div class="bk-alert bk-alert--success"><i class="ri-checkbox-circle-line"></i> {{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}" id="registerForm" novalidate>
          @csrf

          <!-- Personal Info -->

            <div class="bk-auth-row">
              <!-- First Name -->
              <div class="bk-auth-group">
                <label for="name">First Name *</label>
                <div class="bk-auth-input-wrap">
                  <i class="ri-user-line bk-auth-input-icon"></i>
                  <input type="text" id="name" name="name" class="bk-auth-input" placeholder="First name" required value="{{ old('name') }}">
                </div>
                @if ($errors->has('name'))
                <span class="bk-auth-error">{{ $errors->first('name') }}</span>
                @endif
              </div>

              <!-- Last Name -->
              <div class="bk-auth-group">
                <label for="last_name">Last Name</label>
                <div class="bk-auth-input-wrap">
                  <i class="ri-user-line bk-auth-input-icon"></i>
                  <input type="text" id="last_name" name="last_name" class="bk-auth-input" placeholder="Last name" value="{{ old('last_name') }}">
                </div>
                @if ($errors->has('last_name'))
                <span class="bk-auth-error">{{ $errors->first('last_name') }}</span>
                @endif
              </div>
            </div>

            <!-- Email -->
            <div class="bk-auth-group">
              <label for="email">Email Address *</label>
              <div class="bk-auth-input-wrap">
                <i class="ri-mail-line bk-auth-input-icon"></i>
                <input type="email" id="email" name="email" class="bk-auth-input" placeholder="name@email.com" required value="{{ old('email') }}">
              </div>
              @if ($errors->has('email'))
              <span class="bk-auth-error">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <!-- Address -->
            <div class="bk-auth-group">
              <label for="address">Address *</label>
              <div class="bk-auth-input-wrap">
                <i class="ri-map-pin-line bk-auth-input-icon"></i>
                <input type="text" id="address" name="address" class="bk-auth-input" placeholder="Enter your address" required value="{{ old('address') }}">
              </div>
            </div>

            <div class="bk-auth-row">
              <!-- Phone -->
              <div class="bk-auth-group">
                <label for="phone">Phone Number *</label>
                <div class="bk-auth-input-wrap">
                  <i class="ri-phone-line bk-auth-input-icon"></i>
                  <input type="tel" id="phone" name="phone" class="bk-auth-input" placeholder="+1 (234) 567-8901" required value="{{ old('phone') }}">
                </div>
              </div>

              <!-- Country -->
              <div class="bk-auth-group">
                <label for="country">Country *</label>
                <div class="bk-auth-input-wrap">
                  <i class="ri-global-line bk-auth-input-icon"></i>
                  <select id="country" name="country" class="bk-auth-input" required>
                    <option value="" disabled selected>Select country</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                  <span class="bk-auth-select-arrow"><i class="ri-arrow-down-s-line"></i></span>
                </div>
              </div>
            </div>

            <div class="bk-auth-row">
              <!-- Account Type -->
              <div class="bk-auth-group">
                <label for="account_type">Account Type *</label>
                <div class="bk-auth-input-wrap">
                  <i class="ri-bank-card-line bk-auth-input-icon"></i>
                  <select id="account_type" name="account_type" class="bk-auth-input" required>
                    <option value="" disabled selected>Select type</option>
                    <option value="Savings">Savings</option>
                    <option value="Checking">Checking</option>
                  </select>
                  <span class="bk-auth-select-arrow"><i class="ri-arrow-down-s-line"></i></span>
                </div>
              </div>

              <!-- Currency -->
              <div class="bk-auth-group">
                <label for="currency">Currency *</label>
                <div class="bk-auth-input-wrap">
                  <i class="ri-money-dollar-circle-line bk-auth-input-icon"></i>
                  <select id="currency" name="currency" class="bk-auth-input" required>
                    <option value="" disabled selected>Select currency</option>
                    <option value="؋">Afghanistan (؋)</option>
                    <option value="Lek">Albania (Lek)</option>
                    <option value="د.ج">Algeria (د.ج)</option>
                    <option value="$">American Samoa ($)</option>
                    <option value="€">Andorra (€)</option>
                    <option value="Kz">Angola (Kz)</option>
                    <option value="$">Anguilla ($)</option>
                    <option value="$">Antarctica ($)</option>
                    <option value="$">Antigua and Barbuda ($)</option>
                    <option value="$">Argentina ($)</option>
                    <option value="֏">Armenia (֏)</option>
                    <option value="ƒ">Aruba (ƒ)</option>
                    <option value="A$">Australia (A$)</option>
                    <option value="€">Austria (€)</option>
                    <option value="₼">Azerbaijan (₼)</option>
                    <option value="B$">Bahamas (B$)</option>
                    <option value="د.ب">Bahrain (د.ب)</option>
                    <option value="৳">Bangladesh (৳)</option>
                    <option value="Bds$">Barbados (Bds$)</option>
                    <option value="Br">Belarus (Br)</option>
                    <option value="€">Belgium (€)</option>
                    <option value="BZ$">Belize (BZ$)</option>
                    <option value="CFA">Benin (CFA)</option>
                    <option value="$">Bermuda ($)</option>
                    <option value="Nu">Bhutan (Nu)</option>
                    <option value="Bs">Bolivia (Bs)</option>
                    <option value="KM">Bosnia and Herzegovina (KM)</option>
                    <option value="P">Botswana (P)</option>
                    <option value="R$">Brazil (R$)</option>
                    <option value="B$">Brunei Darussalam (B$)</option>
                    <option value="лв.">Bulgaria (лв.)</option>
                    <option value="CFA">Burkina Faso (CFA)</option>
                    <option value="FBu">Burundi (FBu)</option>
                    <option value="៛">Cambodia (៛)</option>
                    <option value="FCFA">Cameroon (FCFA)</option>
                    <option value="C$">Canada (C$)</option>
                    <option value="$">Cape Verde ($)</option>
                    <option value="CI$">Cayman Islands (CI$)</option>
                    <option value="FCFA">Central African Republic (FCFA)</option>
                    <option value="FCFA">Chad (FCFA)</option>
                    <option value="CL$">Chile (CL$)</option>
                    <option value="¥">China (¥)</option>
                    <option value="COL$">Colombia (COL$)</option>
                    <option value="FC">Congo (FC)</option>
                    <option value="₡">Costa Rica (₡)</option>
                    <option value="CFA">Cote D'Ivoire (CFA)</option>
                    <option value="kn">Croatia (kn)</option>
                    <option value="$">Cuba ($)</option>
                    <option value="€">Cyprus (€)</option>
                    <option value="Kč">Czech Republic (Kč)</option>
                    <option value="kr">Denmark (kr)</option>
                    <option value="EC$">Dominica (EC$)</option>
                    <option value="RD$">Dominican Republic (RD$)</option>
                    <option value="$">Ecuador ($)</option>
                    <option value="E£">Egypt (E£)</option>
                    <option value="$">El Salvador ($)</option>
                    <option value="€">Estonia (€)</option>
                    <option value="Br">Ethiopia (Br)</option>
                    <option value="FJ$">Fiji (FJ$)</option>
                    <option value="€">Finland (€)</option>
                    <option value="€">France (€)</option>
                    <option value="€">Germany (€)</option>
                    <option value="GH₵">Ghana (GH₵)</option>
                    <option value="€">Greece (€)</option>
                    <option value="Q">Guatemala (Q)</option>
                    <option value="FG">Guinea (FG)</option>
                    <option value="G$">Guyana (G$)</option>
                    <option value="G">Haiti (G)</option>
                    <option value="L">Honduras (L)</option>
                    <option value="HK$">Hong Kong (HK$)</option>
                    <option value="Ft">Hungary (Ft)</option>
                    <option value="kr">Iceland (kr)</option>
                    <option value="₹">India (₹)</option>
                    <option value="Rp">Indonesia (Rp)</option>
                    <option value="د.ع">Iraq (د.ع)</option>
                    <option value="€">Ireland (€)</option>
                    <option value="₪">Israel (₪)</option>
                    <option value="€">Italy (€)</option>
                    <option value="J$">Jamaica (J$)</option>
                    <option value="¥">Japan (¥)</option>
                    <option value="د.ا">Jordan (د.ا)</option>
                    <option value="₸">Kazakhstan (₸)</option>
                    <option value="KSh">Kenya (KSh)</option>
                    <option value="د.ك">Kuwait (د.ك)</option>
                    <option value="€">Latvia (€)</option>
                    <option value="ل.ل">Lebanon (ل.ل)</option>
                    <option value="L$">Liberia (L$)</option>
                    <option value="€">Lithuania (€)</option>
                    <option value="€">Luxembourg (€)</option>
                    <option value="RM">Malaysia (RM)</option>
                    <option value="Rf">Maldives (Rf)</option>
                    <option value="€">Malta (€)</option>
                    <option value="MX$">Mexico (MX$)</option>
                    <option value="€">Monaco (€)</option>
                    <option value="₮">Mongolia (₮)</option>
                    <option value="MAD">Morocco (MAD)</option>
                    <option value="MT">Mozambique (MT)</option>
                    <option value="K">Myanmar (K)</option>
                    <option value="N$">Namibia (N$)</option>
                    <option value="Rs">Nepal (Rs)</option>
                    <option value="€">Netherlands (€)</option>
                    <option value="NZ$">New Zealand (NZ$)</option>
                    <option value="C$">Nicaragua (C$)</option>
                    <option value="₦">Nigeria (₦)</option>
                    <option value="kr">Norway (kr)</option>
                    <option value="ر.ع.">Oman (ر.ع.)</option>
                    <option value="₨">Pakistan (₨)</option>
                    <option value="B/.">Panama (B/.)</option>
                    <option value="₲">Paraguay (₲)</option>
                    <option value="S/">Peru (S/)</option>
                    <option value="₱">Philippines (₱)</option>
                    <option value="zł">Poland (zł)</option>
                    <option value="€">Portugal (€)</option>
                    <option value="$">Puerto Rico ($)</option>
                    <option value="QR">Qatar (QR)</option>
                    <option value="lei">Romania (lei)</option>
                    <option value="₽">Russian Federation (₽)</option>
                    <option value="FRw">Rwanda (FRw)</option>
                    <option value="﷼">Saudi Arabia (﷼)</option>
                    <option value="CFA">Senegal (CFA)</option>
                    <option value="din">Serbia (din)</option>
                    <option value="S$">Singapore (S$)</option>
                    <option value="€">Slovakia (€)</option>
                    <option value="€">Slovenia (€)</option>
                    <option value="Sh.so.">Somalia (Sh.so.)</option>
                    <option value="R">South Africa (R)</option>
                    <option value="€">Spain (€)</option>
                    <option value="Rs">Sri Lanka (Rs)</option>
                    <option value="£SD">Sudan (£SD)</option>
                    <option value="kr">Sweden (kr)</option>
                    <option value="CHF">Switzerland (CHF)</option>
                    <option value="NT$">Taiwan (NT$)</option>
                    <option value="฿">Thailand (฿)</option>
                    <option value="TT$">Trinidad and Tobago (TT$)</option>
                    <option value="د.ت">Tunisia (د.ت)</option>
                    <option value="₺">Turkey (₺)</option>
                    <option value="USh">Uganda (USh)</option>
                    <option value="₴">Ukraine (₴)</option>
                    <option value="د.إ">United Arab Emirates (د.إ)</option>
                    <option value="£">United Kingdom (£)</option>
                    <option value="$">United States ($)</option>
                    <option value="$U">Uruguay ($U)</option>
                    <option value="сўм">Uzbekistan (сўм)</option>
                    <option value="Bs.">Venezuela (Bs.)</option>
                    <option value="₫">Vietnam (₫)</option>
                    <option value="﷼">Yemen (﷼)</option>
                    <option value="ZK">Zambia (ZK)</option>
                    <option value="Z$">Zimbabwe (Z$)</option>
                  </select>
                  <span class="bk-auth-select-arrow"><i class="ri-arrow-down-s-line"></i></span>
                </div>
              </div>
            </div>

            <!-- Transaction PIN -->
            <div class="bk-auth-group">
              <label for="pin">Transaction PIN (4 digits) *</label>
              <div class="bk-auth-input-wrap">
                <i class="ri-key-2-line bk-auth-input-icon"></i>
                <input type="password" id="pin" name="account_pin" class="bk-auth-input" placeholder="&#8226;&#8226;&#8226;&#8226;" maxlength="4" pattern="[0-9]{4}" required>
                <button type="button" class="bk-auth-toggle" onclick="toggleField('pin','pinEye')">
                  <i class="ri-eye-line" id="pinEye"></i>
                </button>
              </div>
              <span class="bk-auth-hint">Your PIN will be required to authorize transactions</span>
            </div>

            <!-- Divider -->
            <div class="bk-auth-divider" style="margin:22px 0 18px">Security</div>

            <!-- Password -->
            <div class="bk-auth-group">
              <label for="password">Password *</label>
              <div class="bk-auth-input-wrap">
                <i class="ri-lock-password-line bk-auth-input-icon"></i>
                <input type="password" id="password" name="password" class="bk-auth-input" placeholder="Create a strong password" required oninput="checkStrength()">
                <button type="button" class="bk-auth-toggle" onclick="toggleField('password','passEye')">
                  <i class="ri-eye-line" id="passEye"></i>
                </button>
              </div>
              <!-- Strength Meter -->
              <div class="bk-auth-strength" id="strengthMeter" style="display:none">
                <div class="bk-auth-strength-bar"><div class="bk-auth-strength-fill" id="strengthFill" style="width:0%"></div></div>
                <div class="bk-auth-strength-label" id="strengthLabel"></div>
                <ul style="margin:8px 0 0;padding:0;list-style:none;font-size:.72rem;color:var(--txt-m);display:flex;flex-direction:column;gap:3px">
                  <li id="req1"><i class="ri-checkbox-blank-circle-line" style="font-size:.6rem;margin-right:4px"></i> At least 8 characters</li>
                  <li id="req2"><i class="ri-checkbox-blank-circle-line" style="font-size:.6rem;margin-right:4px"></i> At least one uppercase letter</li>
                  <li id="req3"><i class="ri-checkbox-blank-circle-line" style="font-size:.6rem;margin-right:4px"></i> At least one number</li>
                  <li id="req4"><i class="ri-checkbox-blank-circle-line" style="font-size:.6rem;margin-right:4px"></i> At least one special character</li>
                </ul>
              </div>
            </div>

            <!-- Confirm Password -->
            <div class="bk-auth-group">
              <label for="password_confirmation">Confirm Password *</label>
              <div class="bk-auth-input-wrap">
                <i class="ri-lock-line bk-auth-input-icon"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" class="bk-auth-input" placeholder="Repeat your password" required oninput="checkMatch()">
                <button type="button" class="bk-auth-toggle" onclick="toggleField('password_confirmation','confEye')">
                  <i class="ri-eye-line" id="confEye"></i>
                </button>
              </div>
              <span class="bk-auth-hint" id="matchMsg" style="display:none"></span>
            </div>

            <!-- Terms -->
            <div class="bk-auth-check">
              <input type="checkbox" id="terms" name="terms" required>
              <span>I agree to the <a href="/terms" target="_blank">Terms of Service</a> and <a href="/privacy" target="_blank">Privacy Policy</a></span>
            </div>

            <!-- Submit -->
            <button type="submit" class="bk-auth-btn bk-auth-btn--gold" style="width:100%">
              <i class="ri-check-line"></i> Create Account
            </button>

        </form>

        <!-- Login link -->
        <div class="bk-auth-footer">
          Already have an account? <a href="{{ route('login') }}">Sign in instead</a>
        </div>

      </div>
    </div>
  </div>

</div>

<!-- Scripts -->
<script>
// Toggle password fields
function toggleField(id,iconId){
  var f=document.getElementById(id),ic=document.getElementById(iconId);
  if(f.type==='password'){f.type='text';ic.className='ri-eye-off-line'}
  else{f.type='password';ic.className='ri-eye-line'}
}

// PIN restrict to numbers
document.getElementById('pin').addEventListener('keypress',function(e){
  if(e.which<48||e.which>57)e.preventDefault();
});

// Password strength
function checkStrength(){
  var pw=document.getElementById('password').value;
  var meter=document.getElementById('strengthMeter');
  var fill=document.getElementById('strengthFill');
  var label=document.getElementById('strengthLabel');
  meter.style.display=pw.length>0?'block':'none';
  var score=0;
  if(pw.length>7){score++;setReq('req1',true)}else setReq('req1',false);
  if(pw.length>10)score++;
  if(/[A-Z]/.test(pw)){score++;setReq('req2',true)}else setReq('req2',false);
  if(/[0-9]/.test(pw)){score++;setReq('req3',true)}else setReq('req3',false);
  if(/[^A-Za-z0-9]/.test(pw)){score++;setReq('req4',true)}else setReq('req4',false);
  var pct=Math.min(score/5*100,100);
  fill.style.width=pct+'%';
  fill.className='bk-auth-strength-fill '+(score<2?'bk-strength-red':score<4?'bk-strength-yellow':'bk-strength-green');
  var labels=['Very Weak','Weak','Fair','Good','Strong','Very Strong'];
  var colors=[
    'color:var(--red)','color:var(--red)',
    'color:#e5a93d','color:#e5a93d',
    'color:var(--green)','color:var(--green)'
  ];
  label.textContent='Strength: '+labels[score];
  label.style.cssText=colors[score];
  checkMatch();
}
function setReq(id,ok){
  var el=document.getElementById(id);
  el.style.color=ok?'var(--green)':'var(--txt-m)';
  el.querySelector('i').className=ok?'ri-checkbox-circle-fill':'ri-checkbox-blank-circle-line';
}
function checkMatch(){
  var pw=document.getElementById('password').value;
  var cf=document.getElementById('password_confirmation').value;
  var msg=document.getElementById('matchMsg');
  if(!cf){msg.style.display='none';return}
  msg.style.display='block';
  if(pw===cf){msg.textContent='Passwords match';msg.style.color='var(--green)'}
  else{msg.textContent='Passwords do not match';msg.style.color='var(--red)'}
}
</script>

<!-- GTranslate -->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
</body>
</html>
