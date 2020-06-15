<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h3>My account</h3>
        <hr>
    </div>
    <div class="col-md-4"></div>
</div>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="./index.php?page=profile" method="post">
            <div>
                <label>Name
                    <input class="form-control" type="text" name="name" value="<?= $name ?>" placeholder="Name...">
                </label>
            </div>
            <div>
                <label>Email
                    <input class="form-control" type="email" name="email" value="<?= $email ?>" placeholder="Email...">
                </label>
            </div>
            <div>
                <label>OldPassword
                    <input class="form-control" type="password" name="oldPassword" placeholder="Password...">
                </label>
            </div>
            <div>
                <label>New Password
                    <input class="form-control" type="password" name="newPassword" placeholder="Password...">
                </label>
            </div>
            <div>
                <label>Check Password
                    <input class="form-control" type="password" name="checkPass" placeholder="Check Password...">
                </label>
            </div>
            <div>
                <input class="btn btn-outline-primary" type="submit" value="Save" >
            </div>
        </form>
        <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
    </div>
    <div class="col-md-4"></div>
</div>