@extends('app')

@section('title')
    Pomoč
@endsection

@section('meta')
    <meta name="description" content="Vsak uporabnik portala sopomenke.si včasih potrebuje pomoč. Tu se nahajajo vsi odgovori.">
    <meta name="keywords" content="tezaver, pomoč, sopomenke, protipomenke, vprašanja">
    <meta name="twitter:card" content="summary" />

    <meta property="og:title" content="Pomoč | Sopomenke.si" />
    <meta property="og:description" content="Vsak uporabnik portala sopomenke.si včasih potrebuje pomoč. Tu se nahajajo vsi odgovori." />
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
                <h2>Kaj so sopomenke.si?</h2>

                <p class="help-text"><a href="{{ route('home') }}">Sopomenke.si</a> je slovar slovenskih besed, ki vam za izbrano besedo poda sopomenke ter
                                     protipomenke. <a href="{{ route('home') }}">Sopomenke.si</a> je <b>popoldanski projekt</b>, ki je namenjen vsem ljubiteljem sopomenk.</p></div>
            <div class="col-sm-6 section">
                <h2>Zakaj sopomenke.si?</h2>

                <p class="help-text">Slovenščina do sedaj še ni imela uporabnega slovarja sopomenk in je čas, da se to
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

                    <p class="help-text">Ležanje na plaži s čivavo v roki.</p>
                </div>

                <div class="col-sm-6 section">
                    <h2>Kako lahko pomagam?</h2>

                    <p class="help-text">Uporabljite portal <a href="{{ route('home') }}">sopomenke.si</a>. Če kakšna sopomenka manjka, jo dodajte. Povejte svojim
                                         prijateljem in znancem.</br>Bodite dobri drug do drugega in vse bo v redu.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 section">
                    <h2>Kako lahko pomagam pri razvoju?</h2>

                    <p class="help-text">Ni problema. Tukaj je <a href="https://github.com/aweCodeMan/Thesaurus">Github repositorij.</a></p>
                </div>

                <div class="col-sm-6 section">
                    <h2>Ali lahko uporabim podatke iz sopomenke.si?</h2>

                    <p class="help-text">Seveda. Podatki so javno dostopni in na voljo za brskanje, spreminjanje in uporabo. V pomoč naj ti tudi služi
                        <a href="{{ route('v1.docs') }}">API dokumentacija.</a>
                </div>
            </div>
        </div>
    </div>



@endsection