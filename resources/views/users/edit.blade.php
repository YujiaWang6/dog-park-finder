<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Park Finder | User Update Form</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="/app.js"></script>
</head>
<body>
    <section class="w3-padding">
        <?php if(Auth::check()&&auth()->user()->user_role==='admin'): ?>
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
        <?php if(auth()->user()->user_role==='admin'):?>
            <a href="/console/users/list">Back to Users List</a>
        <?php endif;?>
        <h1 class="h1">Update <?= $user->user_name?></h1>
        <form method="post" action="/console/users/edit/<?= $user->id?>" novalidation>
            <?= csrf_field()?>
            <div class="mb-3">
                <label for="user_name" class="form-label">User Name<sup>*</sup>:</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="<?=old('user_name', $user->user_name)?>">

                <?php if($errors->first('user_name')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('user_name');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email<sup>*</sup>:</label>
                <input type="text" name="email" id="email" class="form-control" value="<?=old('email', $user->email)?>">

                <?php if($errors->first('email')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('email');?>
                    </span>
                <?php endif;?>

            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password<sup>*</sup>:</label>
                <input type="password" name="password" id="password" class="form-control">

                <?php if($errors->first('password')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('password');?>
                    </span>
                <?php endif;?>

            </div>

            <div class="mb-3">
                <label for="breed" class="form-label">Breed:</label>
                <input type="text" name="breed" id="breed" class="form-control" value="<?=old('breed', $user->breed)?>">

                <?php if($errors->first('breed')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('breed');?>
                    </span>
                <?php endif;?>

            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="text" name="age" id="age" class="form-control" value="<?=old('age', $user->age)?>">

                <?php if($errors->first('age')):?>
                    <span class="form-text w3-text-red">
                        <?= $errors->first('age');?>
                    </span>
                <?php endif;?>

            </div>
            <?php if(auth()->user()->user_role === 'admin'):?>
                <div class="mb-3">
                    <label for="user_role" class="form-label">User Role:</label>
                    <input type="radio" name="user_role" id="admin" value="admin" <?= old('user_role', $user->user_role) === 'admin' ? 'checked' : '' ?>>
                    <label for="admin">Admin</label>
                    <input type="radio" name="user_role" id="user" value="user" <?= old('user_role', $user->user_role) === 'user' ? 'checked' : ''?>>
                    <label for="user">User</label>

                    <?php if($errors->first('user_role')):?>
                        <span class="form-text w3-text-red">
                            <?= $errors->first('user_role');?>
                        </span>
                    <?php endif;?>

                </div>
            <?php endif;?>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>

    </section>
        
</body>
</html>