<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | New User Form</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="/app.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="/">Dog Park Finder</a>
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
                
                <div class="mb-2 mb-lg-0 navbar-nav">
                    <?php if(Auth::check() && auth()->user()->user_role ==='admin'):?>
                        <div class="nav-item">
                            <a href='/console/dashboard' class="nav-link">Dashboard</a>
                        </div>
                        <div class="nav-item">
                            <a href='/console/logout' class="nav-link">log out</a>
                        </div>
                    <?php elseif(Auth::check() && auth()->user()->user_role === 'user'): ?>
                        <a href='/console/users/profile/<?= auth()->user()->id?>' class="nav-link">Profile</a>
                        <a href='/console/logout' class="nav-link">Log out</a>
                    <?php else:?>
                        <div class="nav-item">
                            <a href='/console/login' class="nav-link">Login</a>
                        </div>
                        <div class="nav-item">
                            <a href='/console/users/add' class="nav-link">Create an account</a>
                        </div>
                    <?php endif;?>
                </div>
                
            </div>
        </div>
    </nav>
    
    
    <div style="background-image: url({{ asset('add.jpeg') }});background-position:center center; background-size:cover; background-repeat: no-repeat; min-height: 90vh;">
        <div style="background-color: rgb(255,255,255,0.5); min-height: 90vh;">
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

            <section class="container-sm" style="max-width:700px;">
                <div class="container-sm">
                    <?php if(Auth::check() && auth()->user()->user_role === 'admin'):?>
                        <a href="/console/users/list">Back to Users List</a>
                        <h1 class="h1">Create a New User</h1>
                    <?php elseif(!Auth::check()): ?>
                        <p class="h3">Create an Account</p>
                        <h1 class="h1">Become a Dog Park Finder Member</h1>
                    <?php endif;?>
                    <?php if((Auth::check() && auth()->user()->user_role === 'admin') || (!Auth::check())): ?>
                        <form method="post" action="/console/users/add" novalidation>
                            <?= csrf_field()?>
                            <div class="mb-3">
                                <label for="user_name" class="form-label">User Name<sup>*</sup>:</label>
                                <input type="text" name="user_name" id="user_name" class="form-control" value="<?=old('user_name')?>">

                                <?php if($errors->first('user_name')):?>
                                    <span class="form-text w3-text-red">
                                        <?= $errors->first('user_name');?>
                                    </span>
                                <?php endif;?>

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email<sup>*</sup>:</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?=old('email')?>">

                                <?php if($errors->first('email')):?>
                                    <span class="form-text w3-text-red">
                                        <?= $errors->first('email');?>
                                    </span>
                                <?php endif;?>

                            </div>

                            <div class="mb-3">
                                <label for="email_confirmation" class="form-label">Confirm Email<sup>*</sup>:</label>
                                <input type="text" name="email_confirmation" id="email_confirmation" class="form-control" value="<?= old('email_confirmation') ?>">

                                <?php if ($errors->first('email_confirmation')) : ?>
                                    <span class="form-text w3-text-red">
                                        <?= $errors->first('email_confirmation'); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password<sup>*</sup>:</label>
                                <input type="password" name="password" id="password" class="form-control">

                                <?php if($errors->first('password')):?>
                                    <span class="form-text w3-text-red">
                                        <?= $errors->first('password');?>
                                    </span>
                                <?php endif;?>

                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password<sup>*</sup>:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">

                                <?php if ($errors->first('password_confirmation')) : ?>
                                    <span class="form-text w3-text-red">
                                        <?= $errors->first('password_confirmation'); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="breed" class="form-label">Breed:</label>
                                <input type="text" name="breed" id="breed" class="form-control" value="<?=old('breed')?>">

                                <?php if($errors->first('breed')):?>
                                    <span class="form-text w3-text-red">
                                        <?= $errors->first('breed');?>
                                    </span>
                                <?php endif;?>

                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age:</label>
                                <input type="text" name="age" id="age" class="form-control" value="<?=old('age')?>">

                                <?php if($errors->first('age')):?>
                                    <span class="form-text w3-text-red">
                                        <?= $errors->first('age');?>
                                    </span>
                                <?php endif;?>

                            </div>

                            <?php if(Auth::check() && auth()->user()->user_role === 'admin'):?>
                                <div class="mb-3">
                                    <label for="user_role" class="form-label">User Role:</label>
                                    <input type="radio" name="user_role" id="admin" value="admin" <?= old('user_role') === 'admin' ? 'checked' : '' ?>>
                                    <label for="admin">Admin</label>
                                    <input type="radio" name="user_role" id="user" value="user" <?= old('user_role') === 'user' ? 'checked' : ''?>>
                                    <label for="user">User</label>

                                    <?php if($errors->first('user_role')):?>
                                        <span class="form-text w3-text-red">
                                            <?= $errors->first('user_role');?>
                                        </span>
                                    <?php endif;?>

                                </div>
                            <?php endif; ?>

                            <?php if(Auth::check() && auth()->user()->user_role === 'admin'):?>
                                <button type="submit" class="btn btn-primary">Create</button>
                            <?php else:?>
                                <button type="submit" class="btn btn-primary">Create an Account</button>
                            <?php endif; ?>

                        </form>
                    <?php else:?>
                        <h1 class="h1 text-center">You've already logged in, please log out to create an new account.</h1>
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0 text-center p-2">
                                <a href="/console/logout" class="btn btn-success">Log out</a>
                            </div>
                        </div>

                    <?php endif;?>
                </div>
            </section>
        </div>
    </div>
    <footer class="container-fluid">
            <p>©Copy right Dog Park Finder, 2023</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    </body>
</html>