<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
</head>
<body>
    <header class="w3-padding">
        <h1 class="w3-text-red">Dog Park Finder CMS Dashboard</h1>
        <?php if(Auth::check()): ?>
            You are logged in as
            <?= auth()->user()->user_name ?> |
            <a href="/console/logout">Logout</a> |
            <a href="/console/dashboard">Dashboard</a> |
            <a href="/">Website Home Page</a>
        <?php else: ?>
            <a href="/">Return to Products Page</a>
        <?php endif; ?>
    </header>

    <section class="w3-padding">
        <form method="post" action="/console/login" novalidation>
            <?= csrf_field()?>
            <div class="w3-margin-bottom">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" value="<?=old('email')?>">

                <?php if($errors->first('email')):?>
                    <span class="w3-text-red">
                        <?= $errors->first('email');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="w3-margin-bottom">
                <laebl>Password:</laebl>
                <input type="password" name="password" id="password">

                <?php if($errors->first('password')):?>
                    <span class="w3-text-red">
                        <?= $errors->first('password');?>
                    </span>
                <?php endif;?>

            </div>
            <button type="submit">Log In</button>

        </form>

    </section>
    
</body>
</html>