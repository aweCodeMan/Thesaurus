@extends('app')

@section('meta')

@endsection

@section('title')
    {{ ucfirst($query) }}
@endsection

@section('content')

    @if(count($words) == 0)
        @include('thesaurus.partials.404')
    @else
        @include('thesaurus.partials.title', array('title' => $words[0]->word))

        @foreach($words as $index => $word)

            @include('thesaurus.partials.hr', array('index' => $index))

            <div class="container section">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>{{ $word->pronunciation }}
                            <span class="word-tags text-muted"><b>{{ $word->tags }}</b></span>
                        </h2>


                        @include('thesaurus.partials.definitions', array('definitions' => $word->definitions))

                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Sopomenke</h4>

                                @if(count($word->synonyms) == 0)
                                    <p class="empty-data"><b><span class="glyphicon glyphicon-remove"></span>Še ni
                                                                                                          sopomenk.</b></p>
                                @else
                                    <ul class="linked-words-list">
                                        @foreach($word->synonyms as $synonym)
                                            <li><a href="{{ route('show', $synonym->word) }}">{{ $synonym->word }}</a>
                                                <remove-linked-word linked-word="{{ $synonym->toJson() }}" word="{{ $word->toJson() }}" url="{{ route('delete.relationship') }}" type="{{ \Betoo\Thesaurus\Word::TYPE_SYNONYM }}"></remove-linked-word>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <add-linked-word url-autocomplete="{{ route('home') }}" word="{{ $word->toJson() }}" url="{{ route('store.relationship') }}" type="{{ \Betoo\Thesaurus\Word::TYPE_SYNONYM }}"></add-linked-word>

                            </div>
                            <div class="col-xs-6">
                                <h5>Protipomenke</h5>

                                @if(count($word->antonyms) == 0)
                                    <p class="empty-data"><b><span class="glyphicon glyphicon-remove"></span>Še ni
                                                                                                          protipomenk.</b></p>
                                @else
                                    <ul class="linked-words-list">
                                        @foreach($word->antonyms as $antonym)
                                            <li><a href="{{ route('show', $antonym->word) }}">{{ $antonym->word }}</a>
                                                <remove-linked-word linked-word="{{ $antonym->toJson() }}" word="{{ $word->toJson() }}" url="{{ route('delete.relationship') }}" type="{{ \Betoo\Thesaurus\Word::TYPE_SYNONYM }}"></remove-linked-word>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <add-linked-word url-autocomplete="{{ route('home') }}" word="{{ $word->toJson() }}" url="{{ route('store.relationship') }}" type="{{ \Betoo\Thesaurus\Word::TYPE_ANTONYM }}"></add-linked-word>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection