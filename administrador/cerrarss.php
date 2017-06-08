<?php

session_start();
setcookie('nueva', $_SESSION['Id_Tipo_Usuario'], time() - 18000);
session_destroy();
echo "<script> alert('Sesión Finalizada');</script>";
header("refresh:0;url=../index.php");

