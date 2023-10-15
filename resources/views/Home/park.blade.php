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
        <h1><?= $park->park_name?></h1>
        <p><?= $park->city?></p>
        <div>
            <h2>Reports</h2>
            <?php foreach($reports as $report):?>
                <?= $report->report?>
                <a href="/console/users/profile/<?= $report->user->id?>"><?= $report->user->user_name?></a>
            <?php endforeach;?>
        </div>
        <div>
            <h2>Reviews</h2>
            <?php foreach($reviews as $review):?>
                <?= $review->description?>
                <?= $review->mark?>
                <a href="/console/users/profile/<?= $review->user->id?>"><?= $review->user->user_name?></a>
            <?php endforeach;?>
        </div>
        <div>
            <h2>Average Mark</h2>

                <?= $marks?>

        </div>
        <a href="/parks/<?= $park->id?>/report/add">Report safety issue</a>
        <a href="/parks/<?= $park->id?>/review/add">Rate and Review</a>
    </body>
</html>
