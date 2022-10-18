@extends('layouts.user_layout')

@section('content')
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div id="tradingview_a080f"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSDT/?exchange=BINANCE"
                rel="noopener" target="_blank"><span class="blue-text">BTCUSDT Chart</span></a> by TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget({
                "width": 980,
                "height": 610,
                "symbol": "BINANCE:BTCUSDT",
                "interval": "240",
                "timezone": "Etc/UTC",
                "theme": "dark",
                "style": "1",
                "locale": "en",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "allow_symbol_change": true,
                "show_popup_button": true,
                "popup_width": "1000",
                "popup_height": "650",
                "container_id": "tradingview_a080f"
            });
        </script>
    </div>
    <!-- TradingView Widget END -->
@endsection
