<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h3>Login</h3>
        <hr>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="./index.php?page=login" method="post">

            <div>
                <label>Email
                    <input class="form-control" type="email" name="email" placeholder="Email...">
                </label>
            </div>
            <div>
                <label>Password
                    <input class="form-control" type="password" name="password" placeholder="Password...">
                </label>
            </div>

            <div>
                <input class="btn btn-outline-primary" type="submit" value="Login" >
            </div>
        </form>
        <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
    </div>
    <div class="col-md-4"></div>
</div>
