<li><a href="{{ route('show', $pair->word->word) }}">{{ $pair->word->word }}</a>
    <span class="glyphicon glyphicon-chevron-right"></span>
    <a href="{{ route('show', $pair->linkedWord->word) }}">{{ $pair->linkedWord->word }}</a>
    <span class="text-muted">({{ $pair->timeDifference }})</span></li>
