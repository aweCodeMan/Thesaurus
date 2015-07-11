<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#betoo-navbar-collapse">
                <span class="sr-only">Odpri/zapri menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Sopomenke.si</a>

        </div>

        <div class="collapse navbar-collapse" id="betoo-navbar-collapse">
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <search-word url="{{ route('home') }}"></search-word>
                </div>
            </form>
        </div>
    </div>
</nav>