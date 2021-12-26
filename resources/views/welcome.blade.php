<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <title>Rozvoz</title>
            <div>
                @if ( Auth::check() )
                    {{ Form::open(array('route' =>'logout' )) }}
                    {{ Form::submit('Logout', ['id' => 'logout-button']) }}
                    {{ Form::close() }}

                    {{--  Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\LoginController@logout']) --}}
                @else
                    <a href={{ route('login') }}><button>Login</button> </a>
                @endif
            </div>
            <div class="navigacia">
                <ul class="nav">
                @foreach ($rozvozy as $rozvoz_smer)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('rozvoz', ['rozvoz_id' => $rozvoz_smer->orders_status_id ]) }}" >
                            {{ $rozvoz_smer->orders_status_name }}
                        </a>
                    <li>
                @endforeach
                </ul>
            </div>

            <div>
                @yield('content')
            </div>


    </body>
</html>
