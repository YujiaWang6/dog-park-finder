<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | New Review for <?= $park->park_name?></title>
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
            <a href="/console/reviews/list">Back to Reviews List</a>
            <a href="/parks/<?= $park->id?>">Back to <?= $park->park_name?></a>
            <h1 class="h1">Create a New Review</h1>
        <?php else:?>
            <a href="/parks/<?= $park->id?>">Back to <?= $park->park_name?></a>
            <h1 class="h1">Rate and Review for <?= $park->park_name?></h1>
        <?php endif;?>
        <form method="post" action="/parks/<?= $park->id?>/review/add" novalidation>
            <?= csrf_field()?>

            <div class="mb-3">
                <label for="mark" class="form-label">Rate<sup>*</sup>:</label>
                <input type="number" name="mark" id="mark" class="form-control" value="<?=old('mark')?>" min="1" max="5">

                <?php if($errors->first('mark')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('mark');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Review:</label>
                <textarea name="description" id="description" class="form-control"><?=old('description')?></textarea>

                <?php if($errors->first('description')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('description');?>
                    </span>
                <?php endif;?>

            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </section>
        
</body>
</html>