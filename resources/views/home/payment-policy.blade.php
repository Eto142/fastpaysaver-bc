@include('home.header')

<!-- Page Hero -->
<section class="bk-page-hero">
  <div class="bk-wrap">
    <h1>Payment Policy</h1>
    <p>Important information about deposits, withdrawals, refunds, and account policies.</p>
    <div class="bk-breadcrumb"><a href="/">Home</a> <span>/</span> Payment Policy</div>
  </div>
</section>

<!-- Policy Content -->
<section class="bk-page-section">
  <div class="bk-wrap">
    <div class="bk-text-page sr">

      <h2>1. Financial Responsibility</h2>
      <p>1.1 The company is financially responsible for the client's account balance at any particular moment.</p>
      <p>1.2 Company's financial responsibility starts with the first record about the customer's deposit and continues up to a full withdrawal of funds.</p>
      <p>1.3 The client has the right to demand from the Company any amount of funds which is available in his/her account at the time of the enquiry.</p>
      <p>1.4 The only official methods of deposits/withdrawals are the methods which appear on the company's official website. The client assumes all the risks related to the usage of these payment methods since the payment methods are not the company's partners and not the company's responsibility. The company is not responsible for any delay or cancellation of a transaction which was caused by the payment method. In case the client has any claims related to any of the payment methods, it is his/her responsibility to contact the support service of the particular payment method and to notify the company about those claims.</p>
      <p>1.5 The company does not assume any responsibility for the activity of any third party service providers which the customer may use in order to make a deposit/withdrawal. The company's financial responsibility for the client's funds starts when the funds have been loaded to the company's bank account or any other account related to the payment methods which appear on the company's website. In case any fraud is detected during or after a financial transaction, the company reserves the right to cancel such transaction and freeze the client's account. The Company's responsibility for the clients' funds ends when the funds are withdrawn from the company's bank account or any other account related to the company.</p>
      <p>1.6 In case of any technical mistakes related to financial transactions, the company reserves the right to cancel such transactions and their results.</p>
      <p>1.7 The client may have only one registered account on the company's website. In case the company detects any duplication of the customer's accounts, the company reserves the right to freeze the customer's accounts and funds without the right of withdrawal.</p>

      <h2>2. Client Registration</h2>
      <p>2.1 Client registration is based on two main steps: web registration and identity verification.</p>
      <p>In order to complete web registration, the client needs to provide the company with their real identity and contact details, and accept the company's agreements and appendices.</p>
      <p>2.2 For identity verification, the company may request a scan or digital photo of a government-issued identification document, full copy of all pages with photo and personal details.</p>
      <p>The company reserves the right to demand additional documents such as payment bills, bank confirmation, bank card scans, or any other document necessary during the identification process.</p>
      <p>2.3 The identification process must be completed within 10 business days of the company's request. In some cases, the company may extend the identification period up to 30 working days.</p>

      <h2>3. Deposit Process</h2>
      <p>In order to make a deposit, the client shall make an enquiry from their Personal Cabinet. The client needs to choose a payment method from the list, fill in all necessary details, and continue with the payment.</p>
      <p>The following currencies are available for deposit: <strong>USD</strong>.</p>
      <p>Withdrawal request processing time depends on the payment method and may vary. In case of using electronic payment methods, the transaction time can vary from seconds to days. In case of using direct bank wire, the transaction time can be from 3 up to 45 business days.</p>
      <p>Any transactions made by the Client must be executed through the determined source belonging exclusively to the Client. The withdrawal, refund, compensation, and other payments carried out from the Client's account can only be made using the same account (bank or payment card) that was used to deposit the funds. Withdrawal from the Account may be carried out only in the same currency in which the corresponding deposit was made.</p>

      <h2>4. Taxes</h2>
      <p>The company is not a tax agent and does not provide clients' financial information to any third parties. This information can only be provided in case of an official demand from government agencies.</p>

      <h2>5. Refund Policy</h2>
      <p>5.1 At any time a Client can withdraw a part or all funds from his/her Account by sending the Company a Request for Withdrawal, which complies with the following terms:</p>
      <ul>
        <li>The withdrawal amount will be limited by the remaining balance at the time of execution. If the amount exceeds the balance, the Company may reject the order after explaining the reason.</li>
        <li>The order must comply with the requirements and restrictions set forth by current legislation.</li>
        <li>Money must be withdrawn to the same payment system previously used to deposit funds.</li>
      </ul>
      <p>5.2 A Request for Withdrawal is executed by transferring funds to the Client's External Account by an authorised Agent.</p>
      <p>5.3 The Client shall make a Request for Withdrawal in the currency of the deposit. If the deposit currency differs from the transfer currency, the Company will convert at the exchange rate established at the time of processing.</p>
      <p>5.4 The conversion rate, commission, and other expenses related to each withdrawal method are set by the Company and may be changed at any time.</p>
      <p>5.5 The Company reserves the right to set minimum and maximum withdrawal amounts depending on the method.</p>
      <p>5.6 The withdrawal order is deemed accepted if it is created in the Client's Dashboard and displayed in the Balance History section.</p>
      <p>5.7 Funds will be withdrawn from the Client's account within <strong>five (5) business days</strong>.</p>
      <p>5.8 If funds have not arrived after five business days, the Client may ask the Company to investigate the transfer.</p>
      <p>5.9 If the Client has made an error in payment information resulting in a failed transfer, the Client will pay a commission for resolving the situation.</p>

      <h2>6. Bank Wire Transfer</h2>
      <p>6.1 The Client may send a Request for Withdrawal by bank wire transfer at any time if the Company accepts this method.</p>
      <p>6.2 Withdrawals may only be made to a bank account opened in the Client's name. The Company will not process transfers to third-party accounts.</p>
      <p>6.3 Any charges or fees will be paid by the client, not by the company.</p>
      <p>6.4 The Client understands and agrees that the Company assumes no liability for the time a bank transfer takes.</p>

      <h2>7. Electronic Transfer</h2>
      <p>7.1 The Client may send a Request for Withdrawal by electronic transfer at any time if the Company uses this method.</p>
      <p>7.2 Withdrawals may only be made to the Client's personal electronic payment system wallet.</p>
      <p>7.3 The Client understands that the Company is not responsible for the time an electronic transfer takes or technical failures outside the Company's control.</p>
      <p>7.4 The Company may offer additional withdrawal methods at its discretion, as posted in the Dashboard.</p>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Have Questions About Our Policies?</h2>
        <p>Our support team is available to help clarify any payment-related questions.</p>
        <div class="bk-cta-btns">
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--white">Contact Support <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('faq') }}" class="bk-btn bk-btn--glass">View FAQ <i class="ri-question-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')
