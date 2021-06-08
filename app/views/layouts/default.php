<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php \fw\core\base\View::getMeta(); ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Hello, world!</h1>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/page">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/signup">SignUp</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/logout">Logout</a>
        </li>
    </ul>

    <?=$content?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php
        foreach ($scripts as $script) {
            echo $script;
        }
    ?>

</body>
</html>