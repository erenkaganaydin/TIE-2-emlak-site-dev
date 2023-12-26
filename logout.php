<?php

session_start();

// Oturumu temizle
session_unset();
session_destroy();

// Çıkış yaptıktan sonra giriş sayfasına yönlendir
header('Location: login.php');

?>