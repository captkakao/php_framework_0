
<div class="container col-4">
    <h2>Registration</h2>

    <form method="post" action="/user/signup">
        <div class="mb-3">
            <label class="form-label">Login</label>
            <input type="text" class="form-control" name="login" value="<?= isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '' ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
</div>
