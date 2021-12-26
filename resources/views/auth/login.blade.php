<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>

    <h1>Login user</h1>

    <form name="login-form" method="post" action="{{route('authenticate')}}">
        @csrf
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" required="">
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>




