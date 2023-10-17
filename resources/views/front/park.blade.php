<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Styles -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Dog Park Finder | <?= $park->park_name?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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
            <a href="/parksresult?location=<?= $searchedLocation?>" class="btn btn-outline-info">Back to Search Results</a>
        </section>
        
        <section class="container-sm">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h1><?= $park->park_name?></h1>
                </div>
                <div class="col-4 d-flex justify-content-between">
                    <a href="/parks/<?= $park->id?>/report/add" class="btn btn-danger d-flex align-items-center">Report safety issue</a>
                    <a href="/parks/<?= $park->id?>/review/add" class="btn btn-success d-flex align-items-center">Rate and Review</a>
                </div> 
            </div>

            <p class="h4">Address: <?=$park->address?>, <?= $park->city?> <?=$park->postcode?></p>
            <h2>Information:</h2>
            <p><?= $park->information?></p>
            <h3 class="mb-5">Average Mark: <?= $marks?>/5</h3>
            <div class="mb-5">
                <h2>Safety Reports:</h2>
                <?php foreach($reports as $report):?>
                    <div class="row mb-3">
                        <a href="/console/users/profile/<?= $report->user->id?>" class="col-sm-2"><?= $report->user->user_name?></a>
                        <p class="col-sm-10"><?= $report->report?></p>
                    </div>

                <?php endforeach;?>
            </div>
            <div class="mb-5">
                <h2>Reviews:</h2>
                <?php foreach($reviews as $review):?>
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <a href="/console/users/profile/<?= $review->user->id?>"><?= $review->user->user_name?></a>
                            <p>mark:<?= $review->mark?>/5</p>
                        </div>
                        <p class="col-sm-10"><?= $review->description?></p>
                    </div>
                    


                <?php endforeach;?>
            </div>

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
