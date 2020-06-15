<?php
require_once ROOT.'/includes/activeRecords/User.php';
$message = '';
$hasErrors = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 ?
        $_POST['name'] : null;
    $email = isset($_POST['email']) && strlen(trim($_POST['email'])) > 3 ?
        $_POST['email'] : null;
    $password = isset($_POST['password']) && strlen(trim($_POST['password'])) > 3 ?
        $_POST['password'] : null;
    $checkPass = isset($_POST['checkPass']) && strlen(trim($_POST['checkPass'])) > 3 ?
        $_POST['checkPass'] : null;

    if (is_null($name)){
        $errors[] = 'name';
    }
    if (is_null($email)){
        $errors[] = 'email';
    }
    if (is_null($password)){
        $errors[] = 'password';
    }
    if (is_null($checkPass)){
        $errors[] = 'checkPassword';
    }
    if ($password !== $checkPass){
        $errors[] = 'Password does not match';
    }
    if (!is_null(User::getByEmail($conn, $email))){
        $errors[] = 'User email already exist';
    }
    if (empty($errors)){
        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);

        if ($user->save($conn)){
            $message = 'Done';
        }else{
            $message = 'Not done';
        }

    }else{
        $hasErrors = true;
        $message = 'Errors: ' . implode(',',$errors);
    }
}