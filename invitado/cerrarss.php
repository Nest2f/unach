<?php

session_start();
setcookie('nueva', '', time() - 5, "/");
session_destroy();
echo "<script> alert('Sesi�n Finalizada');</script>";
header("refresh:0;url=../guest.php");

