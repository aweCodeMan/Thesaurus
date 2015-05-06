@extends('app')

@section('title')
    Vse slovenske sopomenke in protipomenke
@endsection

@section('content')
    <div class="background-dark">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="jumbotron">
                        <h1>Tezaver</h1>

                        <p class="tagline">Iščite sopomenke in protipomenke vseh
                                           slovenskih besed.</p>

                        <p>Naj vam beseda nikoli več ne obstane na jeziku.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container section">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                <div class="search-bar">
                    <search-word size="large" url="{{ route('home') }}"></search-word>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-sm-6 section">
                @if(count($data['lastSynonyms']) > 0)
                    <h2>Zadnje sopomenke</h2>

                    <ul class="linked-words-list">
                        @foreach($data['lastSynonyms'] as $index => $pair)
                            @if($index % 2)
                                @include('thesaurus.partials.wordPair', array('pair' => $pair))
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-sm-6 section">
                @if(count($data['lastAntonyms']) > 0)
                    <h2>Zadnje protipomenke</h2>

                    <ul class="linked-words-list">
                        @foreach($data['lastAntonyms'] as $index => $pair)
                            @if($index % 2)
                                @include('thesaurus.partials.wordPair', array('pair' => $pair))
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="container section">
        <div class="row">
            <div class="col-xs-12">
                <h4>Statistika</h4>

                <ul style="list-style: none">
                    <li><span class="text-muted">Število besed v bazi: </span><b>93275</b></li>
                    <li><span class="text-muted">Število vseh sopomenk: </span><b>{{ $data['synonymCount'] }}</b></li>
                    <li><span class="text-muted">Število vseh protipomenk: </span><b>{{ $data['antonymCount'] }}</b>
                    </li>
                </ul>
            </div>
        </div>

    </div>


@endsection