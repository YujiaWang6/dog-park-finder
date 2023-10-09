<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Styles -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Dog Park Finder | Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>

    <body>
        <div>
            <?php if(Auth::check() && auth()->user()->user_role ==='admin'):?>
                <a href='/console/dashboard'>Dashboard</a>
                <a href='/console/logout'>log out</a>
            <?php elseif(Auth::check() && auth()->user()->user_role === 'user'): ?>
                <a href='/'>Profile</a>
                <a href='/console/logout'>Log out</a>
            <?php else:?>
                <a href='/console/login'>Login</a>
                <a href='/console/users/add'>Create an account</a>
            <?php endif;?>
        </div>
    </body>
</html>
