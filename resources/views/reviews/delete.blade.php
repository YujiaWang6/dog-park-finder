<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | Review Delete Confirmation</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="/app.js"></script>
</head>
<body>
    <header class="w3-padding">
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
    </header>

    <section class="container-sm">
        <a href="/console/reviews/list">Back to Reviews List</a>
        <h1 class="h1 text-center">Are you sure you want to delete the review for <?= $review->park->park_name?></h1>
        <form method="post" action="/console/reviews/deleted/<?= $review->id?>" novalidate class="text-center">
            <?= csrf_field()?>
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0 text-center p-2">
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 text-center p-2">
                    <a href="/console/reviews/list" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </section>
        
</body>
</html>