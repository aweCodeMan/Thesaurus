@extends('app')

@section('meta')
    <meta name="description" content="Sopomenke so besedni pari z enakim pomenom. Prebrskajte po seznamu vseh slovenskih sopomenk.">
    <meta name="keywords" content="tezaver, protipomenke, slovar, slovenščina, besede, sopomenke">
    <meta name="twitter:card" content="summary"/>

    <meta property="og:title" content="Vse slovenske sopomenke | Sopomenke.si"/>
    <meta property="og:description" content="Sopomenke so besedni pari z enakim pomenom. Prebrskajte po seznamu vseh slovenskih sopomenk."/>
    <meta property="og:image" content="/images/favicon.png"/>
@endsection


@section('title')
    Vse slovenske sopomenke
@endsection

@section('content')

    @include('thesaurus.partials.title', array('title' => 'Sopomenke'))

    <!--  -->
    <div class="container ">
        <div class="row">

            @if(count($synonyms) == 0)
                <div class="col-xs-12">
                    <h2>Ni nobene sopomenke</h2>
                </div>
            @else
                @foreach($synonyms->chunk(count($synonyms) / 2) as $chunk)
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

                {!! $synonyms->render() !!}
            @endif

        </div>
    </div>
@endsection