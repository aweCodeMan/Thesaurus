@extends('app')

@section('title')
    Pomoč
@endsection

@section('meta')
    <meta name="description" content="Vsak uporabnik tezavra včasih potrebuje pomoč. Naša pomoč vam še odgovori na smisel življenja.">
    <meta name="keywords" content="tezaver, pomoč">
    <meta name="twitter:card" content="summary" />

    <meta property="og:title" content="Pomoč | Tezaver" />
    <meta property="og:description" content="Vsak uporabnik tezavra včasih potrebuje pomoč. Naša pomoč še odgovori na smisel življenja." />
    <meta property="og:image" content="/images/favicon.png" />
@endsection

@section('content')
    <div class="background-dark">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Pomoč</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 section">
                <h2>Kaj je tezaver?</h2>

                <p class="help-text">Tezaver je slovar slovenskih besed, ki vam za izbrano besedo pove še sopomenke ter
                                     protipomenke. Tezaver je <b>popoldanski projekt</b>, ki je namenjen vsem ljubiteljem sopomenk.</p></div>
            <div class="col-sm-6 section">
                <h2>Zakaj tezaver?</h2>

                <p class="help-text">Slovenščina do sedaj še ni imela uporabnega tezavra in je čas, da se to
                                     spremeni. Prav tako smo bili naveličani uporabe vedno istih besed.</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 section">
                <h2>Kako lahko dodajam sopomenke/protipomenke?</h2>


                <p class="help-text">Kliknite na gumb <b>Dodaj</b> na spletni strani besede in vnesite besedo, ki jo želite
                                     dodati. Vse ostalo se
                                     izvede avtomatsko.</p>
            </div>

            <div class="col-sm-6 section">
                <h2>Kako lahko odstranjujem sopomenke/protipomenke?</h2>

                <p class="help-text">Na spletni strani besede kliknite na <span class="glyphicon glyphicon-trash"></span> ob sopomenki/protipomenki, ki
                                     jo želite odstraniti. V pojavno okno vpišite potrditveno besedo.
                                     Vse ostalo se izvede avtomatsko.</p></div>

            <div class="row">
                <div class="col-sm-6 section">
                    <h2>Kaj je smisel življenja?</h2>

                    <p class="help-text">Ležanje na plaži. Čivava. Roka.</p>
                </div>

                <div class="col-sm-6 section">
                    <h2>Kako lahko pomagam?</h2>

                    <p class="help-text">Uporabljite tezaver. Če kakšna sopomenka manjka, jo dodajte. Povejte svojim
                                         prijateljem in znancem.</br>Bodite dobri drug do drugega in vse bo v redu.</p>
                </div>
            </div>
        </div>
    </div>



@endsection