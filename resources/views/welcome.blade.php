<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <title>Rozvoz</title>
            <div>
                @foreach ($rozvozy as $rozvoz_smer)
                    <div>
                    <a href="{{route('rozvoz', ['rozvoz_id' => $rozvoz_smer->orders_status_id ]) }}" >
                        {{ $rozvoz_smer->orders_status_name }}
                    </a>
                    </div>
                @endforeach
            </div>

            <div>
                @yield('content')
            </div>


    </body>
</html>
