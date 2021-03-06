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
        <?php if (!isset($_SESSION['user'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="/user/signup">SignUp</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/login">Login</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="/user/logout">Logout</a>
            </li>
        <?php endif; ?>
        <?php new \fw\widgets\language\Language(); ?>
    </ul>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success']; unset($_SESSION['success']) ?>
        </div>
    <?php endif; ?>

    <?=$content?>



    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <?php
        foreach ($scripts as $script) {
            echo $script;
        }
    ?>

</body>
</html>