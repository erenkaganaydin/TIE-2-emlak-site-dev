<?php
session_start();

/* Kullanıcının oturumunu kontrol et
if (!isset($_SESSION['user_data'])) {
    // Oturum yoksa giriş sayfasına yönlendir
    header('Location: login.php');
    exit();
}
*/
// Kullanıcı bilgilerini al
if (isset($_SESSION['user_data']))
{
    $userData = $_SESSION['user_data'];
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="emlak sitem ile emlak portföyünüz dijitalde" name="description">
    <meta content="" name="author">
    <title>Emlak Sitem</title>
    <!-- FAVICON -->
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <!-- GOOGLE FONTS -->
    <link href="css/css-1?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <link href="css/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800, 700" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/fontawesome-5-all.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- ARCHIVES CSS -->
    <link href="css/search-form.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <link href="css/aos2.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/nice-select.css" rel="stylesheet">
    <link href="css/slick.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/colors/black.css" id="color" rel="stylesheet">
</head>


