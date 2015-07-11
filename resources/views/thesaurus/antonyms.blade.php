@extends('app')

@section('meta')
    <meta name="description" content="Protipomenki so besedn pari z nasprotnim pomenom. Prebrskajte po seznamu vseh slovenskih protipomenk.">
    <meta name="keywords" content="tezaver, protipomenke, slovar, slovenščina, besede, sopomenke">
    <meta name="twitter:card" content="summary"/>

    <meta property="og:title" content="Vse slovenske protipomenke | Sopomenke.si"/>
    <meta property="og:description" content="Protipomenki so besedn pari z nasprotnim pomenom. Prebrskajte po seznamu vseh slovenskih protipomenk."/>
    <meta property="og:image" content="/images/favicon.png"/>
@endsection


@section('title')
    Vse slovenske protipomenke
@endsection

@section('content')

    @include('thesaurus.partials.title', array('title' => 'Protipomenke'))

    <!--  -->
    <div class="container ">
        <div class="row">

            @if(count($antonyms) == 0)
                <div class="col-xs-12">
                    <h2>Ni nobene protipomenke</h2>
                </div>
            @else
                @foreach($antonyms->chunk(count($antonyms) / 2) as $chunk)
                    <div class="col-sm-6 section">
                        <ul class="linked-words-list" style="padding-left: 0">
                            @foreach($chunk as $index => $pair)
                                @if($index % 2)
                                    @include('thesaurus.partials.wordPair', array('pair' => $pair))
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                {!! $antonyms->render() !!}

            @endif
        </div>
    </div>
@endsection