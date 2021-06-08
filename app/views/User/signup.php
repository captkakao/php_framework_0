
<div class="container col-4">
    <h2>Registration</h2>

    <form method="post" action="/user/signup">
        <div class="mb-3">
            <label class="form-label">Login</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
