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
        <title>Dog Park Finder | Contact</title>

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
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/contact">Contact</a>
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

        <section class="d-flex" style="background-image: url({{ asset('contact.png') }}); background-size:cover; background-repeat: no-repeat; background-position: center center; min-height:90vh">
            <div class="container-sm" style="background-color:rgb(255,255,255,0.65); min-height:90vh">
                <div class="mt-5">
                    <h1 class="h1">Contact Us</h1>
                    <p>If you have any questions, feedback, or need assistance, please don't hesitate to get in touch with us. We're here to help!</p>
                    <h2 class="h2">Contact Information:</h2>
                    <p><strong>Email</strong>:<a href="mailto:yujia.wang2@mail.mcgill.ca" target="_blank">info@dogparkfinder.com</a></p>
                    <p>We strive to provide the best experience for our users, and your input is valuable to us. Feel free to reach out with any inquiries or concerns, and we'll do our best to assist you.</p>
                    <h2 class="h2">User Terms and Conditions</h2>
                    <p>Please review the following terms and conditions carefully before using our services:</p>
                    <ol>
                        <li><strong>Acceptance of Terms</strong>: By using our website or mobile application, you agree to abide by these terms and conditions. If you do not agree, please refrain from using our services.</li>
                        <li><strong>Privacy Policy</strong>: We are committed to protecting your privacy. Please review our Privacy Policy to understand how we collect, use, and safeguard your personal information.</li>
                        <li><strong>User Conduct</strong>: Users must use our services responsibly and refrain from any unlawful or harmful activities. Any abusive or inappropriate behavior will not be tolerated.</li>
                        <li><strong>Content Submission</strong>: When submitting content, including reviews and reports, you agree to provide accurate and honest information. Misleading or false information is not permitted.</li>
                        <li><strong>Intellectual Property</strong>: All content, including text, images, and software on our platform, is protected by copyright and other intellectual property rights. Users must respect these rights.</li>
                        <li><strong>Liability</strong>: We strive to provide accurate and helpful information but are not liable for any inaccuracies or errors. Users are responsible for their actions and interactions within the platform.</li>
                        <li><strong>Updates</strong>: These terms and conditions may be updated from time to time, and users are encouraged to review them periodically.</li>
                    </ol>
                    <p>Thank you for using Dog Park Finder. If you have any questions or require further clarification on these terms and conditions, please contact us using the provided contact information.</p>
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