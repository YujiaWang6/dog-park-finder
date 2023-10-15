<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | New Report for <?= $park->park_name?></title>
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

    <section class="container-sm">
        <?php if(Auth::check()&&auth()->user()->user_role === 'admin'):?>
            <a href="/console/reports/list">Back to Reports List</a>
            <a href="/parks/<?= $park->id?>">Back to <?= $park->park_name?></a>
            <h1 class="h1">Create a New Report</h1>
        <?php else:?>
            <a href="/parks/<?= $park->id?>">Back to <?= $park->park_name?></a>
            <h1 class="h1">Write a safety report for <?= $park->park_name?></h1>
        <?php endif;?>

        <form method="post" action="/parks/<?= $park->id?>/report/add" novalidation>
            <?= csrf_field()?>
            
            <div class="mb-3">
                <label for="report" class="form-label">Report<sup>*</sup>:</label>
                <textarea name="report" id="report" class="form-control"><?=old('report')?></textarea>

                <?php if($errors->first('report')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('report');?>
                    </span>
                <?php endif;?>

            </div>
            
            <button type="submit" class="btn btn-primary">Create</button>

        </form>

    </section>
        
</body>
</html>