<div class="background-dark">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @if(isset($query))
                    <h1>Ni zadetkov</h1>
                @else
                    <h1>Napaka 404</h1>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container section">
    <div class="row">
        <div class="col-xs-12">
            @if(isset($query))
                <h3>Besede <b>{{ $query }}</b> ni v naši bazi.</h3>
            @else
                <h3>Nismo uspeli najti tistega kar ste iskali.</h3>

                <p>Se zgodi.</p>
            @endif
        </div>
    </div>
</div>

<div class="container section">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">

            <div class="search-bar">
                <search-word size="large" placeholder="Poiščite drugo besedo..." url="{{ route('home') }}"></search-word>
            </div>
        </div>
    </div>
</div>