@extends('app')

@section('title')
    Tezaver
@endsection

@section('content')
    <div class="background-dark">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="jumbotron">
                        <h1>Tezaver</h1>

                        <p class="tagline">Tezaver je orodje, ki vam omogoča iskanje sopomenk in protipomenk vseh
                                           slovenskih besed.</p>

                        <p>Naj vam nikoli več beseda ne ostane na jeziku.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 well">

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Poiščite sopomenke ali protipomenke...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Išči!</button>
                      </span>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Dodane sopomenke</h2>
            </div>

            <div class="col-sm-6">
                <h2>Dodane protipomenke</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h4>Statistika</h4>

                <ul>
                    <li><span class="text-muted">Število besed v bazi: </span><b>93752</b></li>
                    <li><span class="text-muted">Število vseh sopomenk: </span><b>1234</b></li>
                    <li><span class="text-muted">Število vseh protipomenk: </span><b>1245</b></li>
                </ul>
            </div>
        </div>

    </div>


@endsection