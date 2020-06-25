<?php
require_once ROOT.'/includes/register.php';
?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="./index.php?page=register" method="post">
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
                <label>Password
                    <input class="form-control" type="password" name="password" placeholder="Password...">
                </label>
            </div>
            <div>
                <label>Check Password
                    <input class="form-control" type="password" name="checkPass" placeholder="Check Password...">
                </label>
            </div>
            <div>
                <input class="btn btn-outline-primary" type="submit" value="Register" >
            </div>
        </form>
        <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
    </div>
    <div class="col-md-4"></div>
</div>