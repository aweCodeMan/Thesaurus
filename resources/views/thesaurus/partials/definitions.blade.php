<ul class="definitions-list">
    @if(count($definitions) == 1)
        <li class="text-muted"><i>{{ $definitions }}</i></li>

    @else
        @foreach(explode(':', $definitions, -1) as $definition)
            <li class="text-muted"><i>{{ $definition }}</i></li>
        @endforeach
    @endif
</ul>