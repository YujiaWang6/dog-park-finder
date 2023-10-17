<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | Reports List</title>
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

    <section class="w3-padding">
        <h1>Manage Reports</h1>
        <a href="/console/reports/add" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Want to report a safety issue of a park? Click here to CREATE a safety report">Create a new report</a>
        <h2>List of Reports</h2>
        <div>
            <?php if(session()->has('message')):?>
                <div class="h5 w3-text-red">
                    <?= session()->get('message')?>
                </div>
            <?php endif;?>
        </div>
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
                            <td><a href="/console/reports/edit/<?= $report->id?>" data-toggle="tooltip" data-placement="left" title="MODIFY safety report of <?= $report->park->park_name?>">Modify</a></td>
                            <td><a href="/console/reports/delete/<?= $report->id?>" data-toggle="tooltip" data-placement="left" title="DELETE safety report of <?= $report->park->park_name?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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