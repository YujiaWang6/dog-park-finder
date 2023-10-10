<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | <?= $user->user_name?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="/app.js"></script>
</head>
<body>
    <section class="w3-padding">
        <?php if(Auth::check() && auth()->user()->user_role === 'admin'): ?>
                    <p class="h4">
                        You are logged in as
                        <?= auth()->user()->user_name ?>
                    </p>
                    <a href="/" class="btn btn-outline-info">Home Page</a>
                    <a href="/console/dashboard" class="btn btn-outline-info">Dashboard</a>
                    <a href="/console/logout" class="btn btn-outline-info">Logout</a>
        <?php else: ?>
            <span >
                <a href="/" class="btn btn-outline-info">Back to Home Page</a>
            </span>
        <?php endif; ?>
    </section>

    <section class="d-flex justify-content-center">
        <div>
            <?php if(Auth::check() && $user->id == auth()->user()->id):?>
                <h1 class="h1">Welcome <?= $user->user_name?></h1>
            <?php else:?>
                <h1 class="h1"><?= $user->user_name?> Profile</h1>
            <?php endif;?>
    

            <div class="mb-3">
                <p>User Name: <?= $user->user_name?></p>
            </div>

            <div class="mb-3">
                <p>Email: <?= $user->email?></p>
            </div>

            <div class="mb-3">
                <p>Breed: <?= $user->breed?></p>
            </div>

            <div class="mb-3">
                <p>Age: <?= $user->age?></p>
            </div>
            <div class="mb-3">
                <?php if(Auth::check() && (($user->id == auth()->user()->id) || (auth()->user()->user_role === 'admin'))):?>
                    <form method="get" action="/console/users/edit/<?= $user->id?>" novalidation>
                        <?= csrf_field()?>
                        <button type="submit" class="btn btn-primary">Update information</button>
                    </form>
                <?php endif;?>
            </div>
        </div>

    </section>
    
</body>
</html>