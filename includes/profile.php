<?php
require_once ROOT.'/includes/activeRecords/User.php';
$message = '';
$name = '';
$email = '';
$hasErrors = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 ?
        $_POST['name'] : null;
    $email = isset($_POST['email']) && strlen(trim($_POST['email'])) > 3 ?
        $_POST['email'] : null;
    $oldPassword = isset($_POST['oldPassword']) && strlen(trim($_POST['oldPassword'])) > 3 ?
        $_POST['oldPassword'] : null;
    $newPassword = isset($_POST['newPassword']) && strlen(trim($_POST['newPassword'])) > 3 ?
        $_POST['newPassword'] : null;
    $checkPass = isset($_POST['checkPass']) && strlen(trim($_POST['checkPass'])) > 3 ?
        $_POST['checkPass'] : null;

    $user = User::getById($conn, $_SESSION['userId']);
    echo 'xx ' . $user->getPassword();
    $verifyOldPass = password_verify($oldPassword,$user->getPassword());

    if (is_null($name)){
        $errors[] = 'name';
    }
    if (is_null($email)){
        $errors[] = 'email';
    }
    if (!$verifyOldPass){
        $errors[] = 'Wrong Password';
    }
    if (is_null($oldPassword)){
        $errors[] = 'old password';
    }
    if (is_null($newPassword)){
        $errors[] = 'new password';
    }
    if (is_null($checkPass)){
        $errors[] = 'checkPassword';
    }
    if ($newPassword !== $checkPass){
        $errors[] = 'Password does not match';
    }

    if (empty($errors)){
        $user = new User();
        $user->setId($_SESSION['userId']);
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($newPassword);

        if ($user->save($conn)){
            header('Location:index.php');
            exit();
        }else{
            $message = 'Not done';
        }

    }else{
        $hasErrors = true;
        $message = 'Errors: ' . implode(',',$errors);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){

    $user = User::getById($conn, $_SESSION['userId']);
    if (is_null($user)){
           $message = 'Wrong username or password';
    }else{
        $name = $user->getName();
        $email = $user->getEmail();
    }



}
