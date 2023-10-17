<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | New Park Form</title>
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

    <section class="w3-padding">
        <?php if(Auth::check()): ?>
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

    <section class="container-sm">
        <a href="/console/parks/list">Back to Parks List</a>
        <h1 class="h1">Create a New Park</h1>
        <form method="post" action="/console/parks/add" novalidation>
            <?= csrf_field()?>
            <div class="mb-3">
                <label for="park_name" class="form-label">Park Name<sup>*</sup>:</label>
                <input type="text" name="park_name" id="park_name" class="form-control" value="<?=old('park_name')?>">

                <?php if($errors->first('park_name')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('park_name');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Addres<sup>*</sup>:</label>
                <input type="text" name="address" id="address" class="form-control" value="<?=old('address')?>">

                <?php if($errors->first('address')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('address');?>
                    </span>
                <?php endif;?>

            </div>

            <div class="mb-3">
                <label for="postcode" class="form-label">Postcode<sup>*</sup>:</label>
                <input type="text" name="postcode" id="postcode" class="form-control" value="<?=old('postcode')?>">

                <?php if($errors->first('postcode')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('postcode');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="information" class="form-label">Information:</label>
                <textarea name="information" id="information" class="form-control"><?=old('information')?></textarea>

                <?php if($errors->first('information')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('information');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude:</label>
                <input type="text" name="latitude" id="latitude" class="form-control" value="<?=old('latitude')?>">

                <?php if($errors->first('latitude')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('latitude');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude:</label>
                <input type="text" name="longitude" id="longitude" class="form-control" value="<?=old('longitude')?>">

                <?php if($errors->first('longitude')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('longitude');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" name="city" id="city" class="form-control" value="<?=old('city')?>">

                <?php if($errors->first('city')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('city');?>
                    </span>
                <?php endif;?>

            </div>
            <button type="submit" class="btn btn-primary">Create</button>

        </form>

    </section>
        
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