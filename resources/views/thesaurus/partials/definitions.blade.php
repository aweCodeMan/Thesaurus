<ul class="definitions-list">
    @foreach(explode(':', $definitions, -1) as $definition)
        <li class="text-muted"><i>{{ $definition }}</i></li>
    @endforeach
</ul>