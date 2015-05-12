<!DOCTYPE html>
<html lang="sl">
<head>
    <meta lang="sl">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.png" />
    <link rel="icon" href="/images/favicon.png">

    @yield('meta')

    <title>@yield('title') | Tezaver Betoo</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" defer="true">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Open+Sans:400italic,700,400&subset=latin-ext' rel='stylesheet' type='text/css' defer="true">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" async="true"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" async="true"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js" defer="true"></script>
    <script src="/js/vendor/all.js" defer="true"></script>
    <script src="/js/app.js" defer="true"></script>

    <!-- Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ env('ANALYTICS_ID', 'UA-XXXXXXXX-X') }}', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body data-ng-app="thesaurus">

<div class="wrapper">

    @include('partials.navbar')

    @yield('content')

    <!-- Used for sticky footer -->
    <div class="push"></div>
</div>
@include('partials.footer')

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" defer="true"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" defer="true"></script>
</body>
</html>
