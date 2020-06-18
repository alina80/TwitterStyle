<?php
require_once ROOT.'/includes/activeRecords/User.php';

$message = '';
$hasErrors = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = isset($_POST['email']) && strlen(trim($_POST['email'])) > 3 ?
        $_POST['email'] : '';
    $password = isset($_POST['password']) && strlen(trim($_POST['password'])) > 3 ?
        $_POST['password'] : null;

    if (is_null($email)){
        $errors[] = 'enter email';
    }
    if (is_null($password)){
        $errors[] = 'wrong password';
    }
    if (is_null(User::getByEmail($conn,$email))){
        $errors[] = 'User does not exist';
    }

    if (empty($errors)){

        $user = User::loginUser($conn,$email,$password);
        if (!is_null($user)){
            $_SESSION['userId'] = $user->getId();
            $_SESSION['userName'] = $user->getName();
            $_SESSION['userEmail'] = $user->getEmail();

            header('Location:index.php');
            exit();
        }else{
            $message = 'Wrong email or password';
        }

    }else{
        $hasErrors = true;
        $message = 'Errors: ' . implode(',',$errors);
    }



}
