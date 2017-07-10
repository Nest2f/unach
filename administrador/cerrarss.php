<?php

session_start();
if (isset($_COOKIE['nueva'])) {
    unset($_COOKIE['nueva']);
    setcookie('nueva', '', time() - 18000, '/');
}
session_destroy();
echo "<script> alert('Sesión Finalizada');</script>";
header("refresh:0;url=../index.php");

