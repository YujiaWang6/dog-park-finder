<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | New Review Form</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="/app.js"></script>
</head>
<body>
    <section class="w3-padding">
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
    </section>

    <section class="container-sm">
        <a href="/console/reviews/list">Back to Reviews List</a>
        <h1 class="h1">Create a New Review</h1>
        <form method="post" action="/console/reviews/add" novalidation>
            <?= csrf_field()?>
            <div class="mb-3">
                <label for="user_id" class="form-label">User<sup>*</sup>:</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option disabled selected>Select the User</option>
                    <?php foreach($users as $user): ?>
                        <option value="<?= $user->id?>" <?= $user->id == old('user_id') ? 'selected' : ''?>>
                            <?= $user->user_name?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <?php if($errors->first('user_id')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('user_id');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="park_id" class="form-label">Park<sup>*</sup>:</label>
                <select name="park_id" id="park_id" class="form-control">
                    <option disabled selected>Select the Park</option>
                    <?php foreach($parks as $park): ?>
                        <option value="<?= $park->id?>" <?= $park->id == old('park_id') ? 'selected' : ''?>>
                            <?= $park->park_name?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <?php if($errors->first('park_id')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('park_id');?>
                    </span>
                <?php endif;?>

            </div>

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
            
            <button type="submit" class="btn btn-primary">Create</button>

        </form>

    </section>
        
</body>
</html>