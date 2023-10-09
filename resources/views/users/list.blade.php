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

    <section>
        <h1>Manage Users</h1>
        <a href="/console/users/add">Create a new user</a>
        <h2>List of Users</h2>
        <div>
            <?php if(session()->has('message')):?>
                <div>
                    <?= session()->get('message')?>
                </div>
            <?php endif;?>
        </div>
        <table>
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
        </table>
    </section>
        
</body>
</html>