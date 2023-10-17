<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Styles -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>Dog Park Finder | About</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            .search-box{
                background-color: rgb(255, 255, 255, 0.75); width:65vw; height:34vh; display: flex; flex-direction: column; justify-content: center; align-items: center; border-radius:15px;
            }
            @media screen and (max-width:1000px){
                .search-box{
                    width:90vw;
                    height:34vh;
                }
            }
        </style>

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
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/about">About</a>
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

        <section class="d-flex" style="background-image: url({{ asset('about.jpeg') }}); background-size:cover; background-repeat: no-repeat; background-position: center center; height: 90vh;">
            <div class="container-sm" style="background-color:rgb(255,255,255,0.65)">
                <div>
                    <h1 class="mt-5">About Dog Park Finder</h1>
                    <p>Welcome to Dog Park Finder, your go-to source for finding the best off-leash dog parks near you! Our mission is to make every dog owner's experience at the park enjoyable, safe, and informative.</p>
                    <h2>Our Story</h2>
                    <p>Dog Park Finder was born out of a deep love for our four-legged friends. We understand the importance of providing dogs with a safe and engaging environment where they can run, play, and socialize. Our team of dog enthusiasts came together to create this platform, aiming to connect dog owners with the perfect parks for their furry companions.</p>
                    <h2>What We Do</h2>
                    <ul>
                        <li><strong>Find Dog Parks</strong>: Discover a variety of dog parks in your area with detailed information on their locations, amenities, and more.</li>
                        <li><strong>Read Reviews</strong>: Get insights from the community by reading reviews and ratings of dog parks. Find the most popular and highly-rated spots for your dog to enjoy.</li>
                        <li><strong>Share Your Experience</strong>: Join the community and share your own experiences. Leave reviews and let others know about your favorite dog parks and the adventures you've had there.</li>
                        <li><strong>Safety First</strong>: We take safety seriously. Use our reporting feature to alert the community about any potential hazards, accidents, or issues in a dog park.</li>
                    </ul>
                    <h2>Get Involved</h2>
                    <p>Join our community of dog lovers, and let's work together to ensure that every dog has access to the best dog parks. Whether you're a seasoned dog owner or a new pup parent, we welcome you to share your experiences, contribute to our database, and help us make this platform even better.</p>
                </div>
            </div>
        </section>


        <footer class="container-fluid">
            <p>©Copy right Dog Park Finder, 2023</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>