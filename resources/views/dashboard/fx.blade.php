@extends('layouts.dashboard')

@section('title', 'FX Trading')

@section('content')
{{-- ── Header Card ── --}}
<div class="db-card d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div>
        <small class="text-muted">Available Balance</small>
        <h3 class="fw-bold mb-0">{{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}</h3>
    </div>
    <a href="{{ route('deposit') }}" class="btn btn-outline-primary btn-sm mt-2 mt-md-0">Add Funds</a>
</div>

{{-- ── Tabs ── --}}
<ul class="nav nav-tabs mb-3" id="fxTab" role="tablist">
    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#stocks">Stocks</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#crypto">Crypto</button></li>
    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#forex">Forex</button></li>
</ul>

{{-- ── Search ── --}}
<div class="search-box">
    <i class="bi bi-search"></i>
    <input type="text" class="form-control" placeholder="Search assets...">
</div>

<div class="tab-content">
    {{-- Stocks --}}
    <div class="tab-pane fade show active" id="stocks">
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="AAPL">
            <div class="d-flex align-items-center">
                <div class="asset-icon stock-icon"><i class="bi bi-bar-chart-line"></i></div>
                <div class="flex-grow-1"><div class="asset-name">Apple Inc.</div><div class="asset-symbol">AAPL</div></div>
                <div class="text-end"><div class="asset-price">$189.98</div><div class="price-change-up">+2.34%</div></div>
            </div>
        </div>
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="TSLA">
            <div class="d-flex align-items-center">
                <div class="asset-icon stock-icon"><i class="bi bi-lightning-charge"></i></div>
                <div class="flex-grow-1"><div class="asset-name">Tesla Inc.</div><div class="asset-symbol">TSLA</div></div>
                <div class="text-end"><div class="asset-price">$248.42</div><div class="price-change-down">-1.25%</div></div>
            </div>
        </div>
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="AMZN">
            <div class="d-flex align-items-center">
                <div class="asset-icon stock-icon"><i class="bi bi-cart"></i></div>
                <div class="flex-grow-1"><div class="asset-name">Amazon.com</div><div class="asset-symbol">AMZN</div></div>
                <div class="text-end"><div class="asset-price">$178.75</div><div class="price-change-up">+0.87%</div></div>
            </div>
        </div>
    </div>

    {{-- Crypto --}}
    <div class="tab-pane fade" id="crypto">
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="BTC">
            <div class="d-flex align-items-center">
                <div class="asset-icon crypto-icon"><i class="bi bi-currency-bitcoin"></i></div>
                <div class="flex-grow-1"><div class="asset-name">Bitcoin</div><div class="asset-symbol">BTC</div></div>
                <div class="text-end"><div class="asset-price">$67,245.32</div><div class="price-change-up">+3.42%</div></div>
            </div>
        </div>
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="ETH">
            <div class="d-flex align-items-center">
                <div class="asset-icon crypto-icon"><i class="bi bi-currency-ethereum"></i></div>
                <div class="flex-grow-1"><div class="asset-name">Ethereum</div><div class="asset-symbol">ETH</div></div>
                <div class="text-end"><div class="asset-price">$3,512.76</div><div class="price-change-up">+1.87%</div></div>
            </div>
        </div>
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="SOL">
            <div class="d-flex align-items-center">
                <div class="asset-icon crypto-icon"><i class="bi bi-currency-exchange"></i></div>
                <div class="flex-grow-1"><div class="asset-name">Solana</div><div class="asset-symbol">SOL</div></div>
                <div class="text-end"><div class="asset-price">$187.34</div><div class="price-change-down">-0.65%</div></div>
            </div>
        </div>
    </div>

    {{-- Forex --}}
    <div class="tab-pane fade" id="forex">
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="EUR/USD">
            <div class="d-flex align-items-center">
                <div class="asset-icon stock-icon"><i class="bi bi-globe"></i></div>
                <div class="flex-grow-1"><div class="asset-name">Euro / US Dollar</div><div class="asset-symbol">EUR/USD</div></div>
                <div class="text-end"><div class="asset-price">1.0854</div><div class="price-change-up">+0.12%</div></div>
            </div>
        </div>
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="GBP/USD">
            <div class="d-flex align-items-center">
                <div class="asset-icon stock-icon"><i class="bi bi-globe"></i></div>
                <div class="flex-grow-1"><div class="asset-name">British Pound / US Dollar</div><div class="asset-symbol">GBP/USD</div></div>
                <div class="text-end"><div class="asset-price">1.2678</div><div class="price-change-down">-0.08%</div></div>
            </div>
        </div>
        <div class="asset-card" data-bs-toggle="modal" data-bs-target="#tradeModal" data-asset="USD/JPY">
            <div class="d-flex align-items-center">
                <div class="asset-icon stock-icon"><i class="bi bi-globe"></i></div>
                <div class="flex-grow-1"><div class="asset-name">US Dollar / Japanese Yen</div><div class="asset-symbol">USD/JPY</div></div>
                <div class="text-end"><div class="asset-price">156.32</div><div class="price-change-up">+0.24%</div></div>
            </div>
        </div>
    </div>
</div>

{{-- ── Trade Modal ── --}}
<div class="modal fade" id="tradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4">
            <form method="POST" action="{{ route('trades.store') }}">
                @csrf
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="tradeModalTitle">Trade Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="order-form">
                        <input type="hidden" name="asset_symbol" id="assetSymbolInput">
                        <input type="hidden" name="asset_name" id="assetNameInput">
                        <input type="hidden" name="type" id="tradeTypeInput" value="buy">

                        <div class="d-flex gap-2 mb-3">
                            <button type="button" class="btn btn-accent flex-fill" id="buyBtn">Buy</button>
                            <button type="button" class="btn btn-outline-secondary flex-fill" id="sellBtn">Sell</button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Amount (USD)</label>
                            <input type="number" name="amount_usd" class="form-control" id="tradeAmount" placeholder="0.00" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="tradeQuantity" placeholder="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Order Type</label>
                            <select class="form-select" name="order_type" id="orderType" required>
                                <option value="market">Market Order</option>
                                <option value="limit">Limit Order</option>
                                <option value="stop">Stop Order</option>
                            </select>
                        </div>

                        <div class="mb-3 d-none" id="limitPriceContainer">
                            <label class="form-label">Limit Price</label>
                            <input type="number" name="limit_price" class="form-control" id="limitPrice" placeholder="0.00">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-accent w-100 py-2" type="submit">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    /* Buy / Sell toggle */
    const buyBtn = document.getElementById('buyBtn');
    const sellBtn = document.getElementById('sellBtn');
    const typeInput = document.getElementById('tradeTypeInput');
    buyBtn.addEventListener('click', () => { buyBtn.className='btn btn-accent flex-fill'; sellBtn.className='btn btn-outline-secondary flex-fill'; typeInput.value='buy'; });
    sellBtn.addEventListener('click', () => { sellBtn.className='btn btn-danger flex-fill'; buyBtn.className='btn btn-outline-secondary flex-fill'; typeInput.value='sell'; });

    /* Limit price toggle */
    const orderType = document.getElementById('orderType');
    const limitC = document.getElementById('limitPriceContainer');
    orderType.addEventListener('change', () => { limitC.classList.toggle('d-none', orderType.value !== 'limit'); });

    /* Populate asset from card click */
    document.querySelectorAll('.asset-card').forEach(card => {
        card.addEventListener('click', () => {
            document.getElementById('assetSymbolInput').value = card.dataset.asset;
            document.getElementById('assetNameInput').value = card.querySelector('.asset-name').innerText;
            document.getElementById('tradeModalTitle').textContent = 'Trade ' + card.dataset.asset;
        });
    });

    /* Live prices – Stocks */
    fetch('https://financialmodelingprep.com/api/v3/quote/AAPL,TSLA,AMZN?apikey=demo')
        .then(r=>r.json()).then(data=>{
            data.forEach(s=>{
                const c=document.querySelector(`[data-asset="${s.symbol}"]`);
                if(!c)return;
                c.querySelector('.asset-price').textContent='$'+parseFloat(s.price).toFixed(2);
                const ch=parseFloat(s.changesPercentage).toFixed(2);
                const el=c.querySelector('.price-change-up,.price-change-down');
                el.textContent=ch+'%';
                el.className=ch>=0?'price-change-up':'price-change-down';
            });
        }).catch(()=>{});

    /* Live prices – Crypto */
    fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,solana&vs_currencies=usd&include_24hr_change=true')
        .then(r=>r.json()).then(data=>{
            const map={BTC:'bitcoin',ETH:'ethereum',SOL:'solana'};
            for(const [sym,id] of Object.entries(map)){
                const c=document.querySelector(`[data-asset="${sym}"]`);
                if(!c||!data[id])continue;
                c.querySelector('.asset-price').textContent='$'+data[id].usd.toFixed(2);
                const ch=data[id].usd_24h_change.toFixed(2);
                const el=c.querySelector('.price-change-up,.price-change-down');
                el.textContent=ch+'%';
                el.className=ch>=0?'price-change-up':'price-change-down';
            }
        }).catch(()=>{});

    /* Live prices – Forex */
    const pairs={'EUR/USD':['EUR','USD'],'GBP/USD':['GBP','USD'],'USD/JPY':['USD','JPY']};
    Object.entries(pairs).forEach(([sym,[from,to]])=>{
        fetch(`https://api.frankfurter.app/latest?from=${from}&to=${to}`)
            .then(r=>r.json()).then(d=>{
                const c=document.querySelector(`[data-asset="${sym}"]`);
                if(c) c.querySelector('.asset-price').textContent=d.rates[to].toFixed(4);
            }).catch(()=>{});
    });
});
</script>
@endpush