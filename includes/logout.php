<?php

  unset($_SESSION['userId']);
  unset($_SESSION['userName']);
  unset($_SESSION['userEmail']);

  header('Location:index.php');
  exit;