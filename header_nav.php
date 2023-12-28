<!-- START SECTION HEADINGS -->
<!-- Header Container
================================================== -->
<header id="header-container">
    <!-- Header -->
    <div id="header">
        <div class="container container-header" style="max-width: 1240px">
            <!-- Left Side Content -->
            <div class="left-side">
                <!-- Logo -->
                <div id="logo">
                    <a href="index.php"><img alt="" src="images/logo-light-dark.svg"></a>
                </div>
                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
                <!-- Main Navigation -->
                <nav class="style-1" id="navigation">
                    <ul id="responsive">
                        <li><a href="index.php">Anasayfa</a></li>
                        <li><a href="./ilanlar.php">Tüm İlanlar</a></li>
                        <li><a href="about.php">Hakkımızda</a></li>
                        <li><a href="contact-us.php">İletişim</a></li>
                    </ul>
                </nav>
                <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->

            <?php
            if (isset($_SESSION['user_data']))
            {
            ?>
            <!-- Right Side Content / End -->
            <div class="right-side d-none d-none d-lg-none d-xl-flex">
                <!-- Header Widget -->
                <div class="header-widget">
                    <a class="button border" href="add-property.php">İlan Ekle<i
                            class="fas fa-laptop-house ml-2"></i></a>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['user_data']))
            {
            ?>
                <!-- Right Side Content / End -->
                <div class="header-user-menu user-menu add">
                    <div class="header-user-name">
                        <?php echo $_SESSION['user_data']['AdSoyad'] ?>
                    </div>
                    <ul>
                        <li><a href="user-profile.php"> Bilgilerimi Düzenle</a></li>
                        <li><a href="add-property.php"> İlan Ekle</a></li>
                        <li><a href="change-password.php"> Şifre Değiştir</a></li>
                        <li><a href="logout.php">Çıkış</a></li>
                    </ul>
                </div>
            <?php
            }
            ?>

            <?php
            if (!isset($_SESSION['user_data']))
            {
            ?>
            <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                <!-- Header Widget -->
                <div class="header-widget sign-in">
                    <div class=""><a href="login.php">Giriş</a></div>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->