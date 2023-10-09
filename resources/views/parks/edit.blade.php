<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a href="/console/parks/list">Back to Parks List</a>
        <h1 class="h1">Update <?= $park->park_name?></h1>
        <form method="post" action="/console/parks/edit/<?= $park->id?>" novalidation>
            <?= csrf_field()?>
            <div class="mb-3">
                <label for="park_name" class="form-label">Park Name<sup>*</sup>:</label>
                <input type="text" name="park_name" id="park_name" class="form-control" value="<?=old('park_name', $park->park_name)?>">

                <?php if($errors->first('park_name')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('park_name');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Addres<sup>*</sup>:</label>
                <input type="text" name="address" id="address" class="form-control" value="<?=old('address', $park->address)?>">

                <?php if($errors->first('address')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('address');?>
                    </span>
                <?php endif;?>

            </div>

            <div class="mb-3">
                <label for="postcode" class="form-label">Postcode<sup>*</sup>:</label>
                <input type="text" name="postcode" id="postcode" class="form-control" value="<?=old('postcode', $park->postcode)?>">

                <?php if($errors->first('postcode')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('postcode');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="information" class="form-label">Information:</label>
                <textarea name="information" id="information" class="form-control"><?=old('information', $park->information)?></textarea>

                <?php if($errors->first('information')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('information');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude:</label>
                <input type="text" name="latitude" id="latitude" class="form-control" value="<?=old('latitude', $park->latitude)?>">

                <?php if($errors->first('latitude')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('latitude');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude:</label>
                <input type="text" name="longitude" id="longitude" class="form-control" value="<?=old('longitude', $park->longitude)?>">

                <?php if($errors->first('longitude')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('longitude');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" name="city" id="city" class="form-control" value="<?=old('city', $park->city)?>">

                <?php if($errors->first('city')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('city');?>
                    </span>
                <?php endif;?>

            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>

    </section>
        
</body>
</html>