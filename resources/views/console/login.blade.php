<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="/app.js"></script>
</head>
<body>
    <header class="w3-padding">
        <?php if(Auth::check()): ?>
            You are logged in as
            <?= auth()->user()->user_name ?> |
            <a href="/console/logout">Logout</a> |
            <a href="/console/dashboard">Dashboard</a> |
            <a href="/">Website Home Page</a>
        <?php else: ?>
            <span >
                <a href="/" class="btn btn-outline-info">Back to Home Page</a>
            </span>
        <?php endif; ?>
    </header>

    <section class="container-sm">
        <h1 class="h1">Dog Park Finder Login</h1>
        <form method="post" action="/console/login" novalidation>
            <?= csrf_field()?>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?=old('email')?>">

                <?php if($errors->first('email')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('email');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <laebl for="password" class="form-label">Password:</laebl>
                <input type="password" name="password" id="password" class="form-control">

                <?php if($errors->first('password')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('password');?>
                    </span>
                <?php endif;?>

            </div>
            <button type="submit" class="btn btn-primary">Log In</button>

        </form>

    </section>
    
</body>
</html>