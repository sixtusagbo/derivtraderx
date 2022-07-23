@extends('layouts.core')

@section('content')

    <!-- Hero -->
    <div class="hero">
        <!-- Node Particles -->
        <div id="particles-js">
        </div>

        <div class="hero-content">
            <h2 class="fw-bold text-light">Professional</h2>
            <h1 class="fw-bold text-primary">Asset Management</h1>
            <p class="fs-4">Up to 20% daily earnings, Instant withdrawal. Payments are in your account regularly!.</p>
            @if (Route::has('login'))
                <div class="auth-buttons">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- Hero END -->

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
            {
                "symbols": [{
                    "description": "BTC/USD",
                    "proName": "BITSTAMP:BTCUSD"
                }, {
                    "description": "ETH/USD",
                    "proName": "KRAKEN:ETHUSD"
                }, {
                    "description": "LTC/USD",
                    "proName": "KRAKEN:LTCUSD"
                }, {
                    "description": "BNB/USD",
                    "proName": "BINANCE:BNBUSD"
                }, {
                    "description": "DOGE/USD",
                    "proName": "BITTREX:DOGEUSD"
                }, {
                    "description": "TRX/USDT",
                    "proName": "BINGX:TRXUSDT"
                }],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": true,
                "displayMode": "adaptive",
                "locale": "en"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->

    <div>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi quam dicta nesciunt sit. Itaque optio ducimus
        consectetur quas suscipit sunt, vero est facere fugit sapiente voluptatum voluptates repellat similique delectus.
        Totam fuga dolorum, et ipsum ad dolor eaque dolore nostrum perferendis facilis. Sit corporis quos, autem quas
        pariatur obcaecati a, commodi labore facere odio quod velit tenetur ad doloremque minima!
        Libero sequi similique maiores adipisci, ipsam quos. Aliquam libero sequi incidunt et ratione optio velit vero amet
        nemo quo ducimus hic ut, obcaecati qui earum iste cupiditate laudantium? Assumenda, natus?
        Voluptatem sint sequi eum soluta quisquam iusto blanditiis incidunt similique beatae consequatur quod magni, ut
        vitae aspernatur neque, reprehenderit quam voluptates perferendis minima id earum? Cum autem cumque rerum
        blanditiis.
        Voluptas tempora velit distinctio quasi, accusantium voluptates minus, aspernatur molestias illo quae similique aut
        saepe porro, vitae sint nostrum voluptate sapiente exercitationem repellendus unde error in aliquid animi. Cum,
        iure?
        Eos nostrum excepturi beatae obcaecati at sint, officia velit voluptatem, provident quas ut illo tempora molestiae
        perspiciatis pariatur quam magni dignissimos ea aperiam a est? Praesentium ducimus eligendi aliquid repellendus.
        Reiciendis atque accusamus iusto, voluptatum asperiores eius, alias vitae fugiat excepturi et laborum deserunt fugit
        aliquid ad molestias at nulla numquam quia ratione? Accusantium molestiae fugiat veniam minus praesentium doloribus!
        Dignissimos temporibus at, modi beatae sunt quaerat? Rem voluptatem, minima hic architecto recusandae, expedita
        voluptate consectetur inventore maiores facilis et natus animi voluptas corrupti ab qui dolor. Eos, labore quod.
        Velit dolor, vitae eum voluptate accusamus reprehenderit error ex ipsa debitis rerum, odit ad? Sint tempore
        doloremque, itaque voluptates fugiat similique quis reiciendis labore dolores culpa, doloribus error mollitia sed?
        Libero quidem voluptatem deleniti, minus, non maxime iusto provident aperiam dolores velit aliquam, officia
        temporibus voluptas illo nulla ab reiciendis eum delectus! Eos esse nisi ab, quos suscipit porro deleniti?
    </div>

    <div>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi quam dicta nesciunt sit. Itaque optio ducimus
        consectetur quas suscipit sunt, vero est facere fugit sapiente voluptatum voluptates repellat similique delectus.
        Totam fuga dolorum, et ipsum ad dolor eaque dolore nostrum perferendis facilis. Sit corporis quos, autem quas
        pariatur obcaecati a, commodi labore facere odio quod velit tenetur ad doloremque minima!
        Libero sequi similique maiores adipisci, ipsam quos. Aliquam libero sequi incidunt et ratione optio velit vero amet
        nemo quo ducimus hic ut, obcaecati qui earum iste cupiditate laudantium? Assumenda, natus?
        Voluptatem sint sequi eum soluta quisquam iusto blanditiis incidunt similique beatae consequatur quod magni, ut
        vitae aspernatur neque, reprehenderit quam voluptates perferendis minima id earum? Cum autem cumque rerum
        blanditiis.
        Voluptas tempora velit distinctio quasi, accusantium voluptates minus, aspernatur molestias illo quae similique aut
        saepe porro, vitae sint nostrum voluptate sapiente exercitationem repellendus unde error in aliquid animi. Cum,
        iure?
        Eos nostrum excepturi beatae obcaecati at sint, officia velit voluptatem, provident quas ut illo tempora molestiae
        perspiciatis pariatur quam magni dignissimos ea aperiam a est? Praesentium ducimus eligendi aliquid repellendus.
        Reiciendis atque accusamus iusto, voluptatum asperiores eius, alias vitae fugiat excepturi et laborum deserunt fugit
        aliquid ad molestias at nulla numquam quia ratione? Accusantium molestiae fugiat veniam minus praesentium doloribus!
        Dignissimos temporibus at, modi beatae sunt quaerat? Rem voluptatem, minima hic architecto recusandae, expedita
        voluptate consectetur inventore maiores facilis et natus animi voluptas corrupti ab qui dolor. Eos, labore quod.
        Velit dolor, vitae eum voluptate accusamus reprehenderit error ex ipsa debitis rerum, odit ad? Sint tempore
        doloremque, itaque voluptates fugiat similique quis reiciendis labore dolores culpa, doloribus error mollitia sed?
        Libero quidem voluptatem deleniti, minus, non maxime iusto provident aperiam dolores velit aliquam, officia
        temporibus voluptas illo nulla ab reiciendis eum delectus! Eos esse nisi ab, quos suscipit porro deleniti?
    </div>
    <div>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi quam dicta nesciunt sit. Itaque optio ducimus
        consectetur quas suscipit sunt, vero est facere fugit sapiente voluptatum voluptates repellat similique delectus.
        Totam fuga dolorum, et ipsum ad dolor eaque dolore nostrum perferendis facilis. Sit corporis quos, autem quas
        pariatur obcaecati a, commodi labore facere odio quod velit tenetur ad doloremque minima!
        Libero sequi similique maiores adipisci, ipsam quos. Aliquam libero sequi incidunt et ratione optio velit vero amet
        nemo quo ducimus hic ut, obcaecati qui earum iste cupiditate laudantium? Assumenda, natus?
        Voluptatem sint sequi eum soluta quisquam iusto blanditiis incidunt similique beatae consequatur quod magni, ut
        vitae aspernatur neque, reprehenderit quam voluptates perferendis minima id earum? Cum autem cumque rerum
        blanditiis.
        Voluptas tempora velit distinctio quasi, accusantium voluptates minus, aspernatur molestias illo quae similique aut
        saepe porro, vitae sint nostrum voluptate sapiente exercitationem repellendus unde error in aliquid animi. Cum,
        iure?
        Eos nostrum excepturi beatae obcaecati at sint, officia velit voluptatem, provident quas ut illo tempora molestiae
        perspiciatis pariatur quam magni dignissimos ea aperiam a est? Praesentium ducimus eligendi aliquid repellendus.
        Reiciendis atque accusamus iusto, voluptatum asperiores eius, alias vitae fugiat excepturi et laborum deserunt fugit
        aliquid ad molestias at nulla numquam quia ratione? Accusantium molestiae fugiat veniam minus praesentium doloribus!
        Dignissimos temporibus at, modi beatae sunt quaerat? Rem voluptatem, minima hic architecto recusandae, expedita
        voluptate consectetur inventore maiores facilis et natus animi voluptas corrupti ab qui dolor. Eos, labore quod.
        Velit dolor, vitae eum voluptate accusamus reprehenderit error ex ipsa debitis rerum, odit ad? Sint tempore
        doloremque, itaque voluptates fugiat similique quis reiciendis labore dolores culpa, doloribus error mollitia sed?
        Libero quidem voluptatem deleniti, minus, non maxime iusto provident aperiam dolores velit aliquam, officia
        temporibus voluptas illo nulla ab reiciendis eum delectus! Eos esse nisi ab, quos suscipit porro deleniti?
    </div>
@endsection
