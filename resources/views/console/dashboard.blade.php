<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | CMS Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section class="w3-padding">
        <?php if(Auth::check()): ?>
                    <p class="h4">
                        You are logged in as
                        <?= auth()->user()->user_name ?>
                    </p>
                    <a href="/" class="btn btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="Go to website Home page">Home Page</a>
                    <a href="/console/dashboard" class="btn btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="Go to CMS Admin dashboard">Dashboard</a>
                    <a href="/console/logout" class="btn btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="Log out the account">Logout</a>
        <?php else: ?>
            <span >
                <a href="/" class="btn btn-outline-info">Back to Home Page</a>
            </span>
        <?php endif; ?>
    </section>


    <section class="container-sm">
        <h1 class="h1 text-center">Dog Park Finder CMS Dashboard</h1>
        <div class="row g-3">
            <div class="col-12 mb-3 mb-sm-0 text-center p-2 border">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Breed</th>
                                <th>Age</th>
                                <th>User Role</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($users as $key=>$value): ?>
                                <tr>
                                    <td><?= $value->id?></td>
                                    <td><?= $value->user_name?></td>
                                    <td><?= $value->email?></td>
                                    <td><?= $value->breed?></td>
                                    <td><?= $value->age?></td>
                                    <td><?= $value->user_role?></td>
                                    <td><a href="/console/users/edit/<?= $value->id?>">Modify</a></td>
                                    <td><a href="/console/users/delete/<?= $value->id?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="align-bottom">
                    <a href="/console/users/list" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="right" title="Click the button to start managing all the Users in database">Manage Users</a>
                </div>
            </div>
            <div class="col-12 mb-3 mb-sm-0 text-center p-2 border">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Park Name</th>
                                <th>Address</th>
                                <th>Postcode</th>
                                <th>Information</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>City</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($parks as $key=>$value): ?>
                                <tr>
                                    <td><?= $value->id?></td>
                                    <td><?= $value->park_name?></td>
                                    <td><?= $value->address?></td>
                                    <td><?= $value->postcode?></td>
                                    <td><?= $value->information?></td>
                                    <td><?= $value->latitude?></td>
                                    <td><?= $value->longitude?></td>
                                    <td><?= $value->city?></td>
                                    <td><a href="/console/parks/edit/<?= $value->id?>">Modify</a></td>
                                    <td><a href="/console/parks/delete/<?= $value->id?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="/console/parks/list" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="right" title="Click the button to start managing all the Parks in database">Manage Parks</a>
            </div>
            <div class="col-12 mb-3 mb-sm-0 text-center p-2 border">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>User</th>
                                <th>Park</th>
                                <th>Rate</th>
                                <th>Review</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($reviews as $review): ?>
                                <tr>
                                    <td><?= $review->id?></td>
                                    <td><?= $review->user->user_name?></td>
                                    <td><?= $review->park->park_name?></td>
                                    <td><?= $review->mark?></td>
                                    <td><?= $review->description?></td>
                                    <td><a href="/console/reviews/edit/<?= $review->id?>">Modify</a></td>
                                    <td><a href="/console/reviews/delete/<?= $review->id?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="/console/reviews/list" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="right" title="Click the button to start managing all the Reviews in database">Manage Reviews</a>
            </div>
            <div class="col-12 mb-3 mb-sm-0 text-center p-2 border">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>User</th>
                                <th>Park</th>
                                <th>Report</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($reports as $report): ?>
                                <tr>
                                    <td><?= $report->id?></td>
                                    <td><?= $report->user->user_name?></td>
                                    <td><?= $report->park->park_name?></td>
                                    <td><?= $report->report?></td>
                                    <td><a href="/console/reports/edit/<?= $report->id?>">Modify</a></td>
                                    <td><a href="/console/reports/delete/<?= $report->id?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="/console/reports/list" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="right" title="Click the button to start managing all the Safety reports in database">Manage Reports</a>
            </div>
        </div> 
    </section>
    <script src="/app.js"></script>
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