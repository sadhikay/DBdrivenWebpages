<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['cart']);
unset($_SESSION['notAvailable']);
unset($_SESSION['numCart']);
unset($_SESSION['added']);

header('Location: login.php');

?>