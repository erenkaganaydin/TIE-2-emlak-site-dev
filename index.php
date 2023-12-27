<?php
    include_once "header.php";
    include_once "php/sunucu-bilgileri.php";
try {
    // PDO nesnesi oluştur
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8");
}
catch (PDOException $e) {
    // Hata durumunda hatayı döndür
    echo json_encode(array('success' => false, 'message' => 'Hata: ' . $e->getMessage()));
}

?>
<body class="homepage-5 the-search hd-white">
<!-- Wrapper -->
<div id="wrapper">
    <?php include_once "header_nav.php"; ?>

    <!-- STAR HEADER SEARCH -->
    <section class="parallax-searchs home17 overlay" data-stellar-background-ratio="0.5" id="hero-area">
        <div class="hero-main">
            <div class="container" data-aos="zoom-in">
                <div class="banner-inner-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-inner">
                                <h1 class="title text-center">Hayallerinizdeki Evi Bulun</h1>
                                <h5 class="sub-title text-center">Detayları girin ve aramaya başlayın</h5>
                            </div>
                        </div>
                        <!-- Search Form -->
                        <div class="col-12">
                            <div class="banner-search-wrap">
                                <ul class="nav nav-tabs rld-banner-tab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs_1">Hayallerini Ara</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tabs_1">
                                        <div class="rld-main-search">
                                            <div class="row" style="justify-content: space-around">
                                                <form action="ilanlar.php" method="post" style="display: contents;">
                                                    <input type="hidden" name="filtreler">
                                                    <div class="rld-single-input">
                                                        <input placeholder="Anahtar Kelime..." type="text" name="anahtar_kelime">
                                                    </div>
                                                    <div class="rld-single-select ml-22">
                                                        <select class="select single-select" name="ilan_durumu">
                                                            <option value="0">İlan Durumu</option>
                                                            <option value="Satılık">Satılık</option>
                                                            <option value="Kiralık">Kiralık</option>
                                                        </select>
                                                    </div>
                                                    <div class="rld-single-select ml-22">
                                                        <select class="select single-select" name="ilan_tip">
                                                            <option value="0">İlan Tipi</option>
                                                            <?php
                                                            $sql = "
                                                        SELECT * FROM ilan_tipleri where deleted = 0
                                                            ";
                                                            $stmt = $conn->prepare($sql);
                                                            $stmt->execute();
                                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach ($row as $item) {?>
                                                                <option <?php if (isset($_POST['ilan_tip'])){ if ($_POST['ilan_tip'] == $item['adi']) echo "selected";} ?> value="<?php echo $item['adi']; ?>"><?php echo $item['adi']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="rld-single-select">
                                                        <select class="select single-select mr-0" name="sehir">
                                                            <option value="0">Sehir</option>
                                                            <?php
                                                            $sql = "SELECT * FROM sehirler where deleted = 0";
                                                            $stmt = $conn->prepare($sql);
                                                            $stmt->execute();
                                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach ($row as $item) {?>
                                                                <option <?php if (isset($_POST['sehir'])){ if ($_POST['sehir'] == $item['adi']) echo "selected";} ?> value="<?php echo $item['adi']; ?>"><?php echo $item['adi']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                        <button type="submit" class="btn btn-yellow" >Ara</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HEADER SEARCH -->

    <!-- START SECTION RECENTLY PROPERTIES -->
    <section class="recently portfolio bg-white-3">
        <div class="container-fluid recently-slider">
            <div class="section-title">
                <h3>En Son</h3>
                <h2>İlanlar</h2>
            </div>
            <div class="portfolio right-slider">
                <div class="owl-carousel home5-right-slider">
                    <?php
                    $sql = "SELECT * FROM ilanlar
                        INNER JOIN (
                            SELECT ilan_id, MIN(id) AS min_resim_id
                            FROM ilan_resimleri
                            GROUP BY ilan_id
                        ) AS T ON ilanlar.id = T.ilan_id
                        INNER JOIN ilan_resimleri ON ilan_resimleri.id = T.min_resim_id
                        WHERE ilanlar.deleted = 0
                        ORDER BY ilanlar.tarih DESC LIMIT 5;
                        ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $sira = 1;
                    foreach ($row as $item) {?>
                        <?php if ($sira++ == 1)
                        {?>
                            <div class="inner-box">
                                <a href="ilan-detay.php?id=<?php echo $item['ilan_id']; ?>" class="recent-16" data-aos="fade-up" data-aos-delay="<?php echo (($sira*50)+100); ?>">
                                    <div class="recent-img16 img-fluid img-center" style="background-image: url(<?php echo $item['resim_path']; ?>);"></div>
                                    <div class="recent-content"></div>
                                    <div class="recent-details">
                                        <div class="recent-title"><?php echo $item['baslik']; ?></div>
                                        <div class="recent-price"><?php
                                            $number = $item['price'];

                                            // Noktalama ekleyerek
                                            $formattedNumber = number_format($number, 2, ',', '.');

                                            // veya

                                            // Noktalama kaldırarak
                                            $formattedNumber = str_replace('', '', number_format($number, 2));

                                            echo $formattedNumber;
                                            ?> ₺</div>
                                        <div class="house-details"><?php echo $item['oda_sayisi']; ?> Oda <span>|</span> <?php echo $item['banyo_sayisi']; ?> Banyo <span>|</span> <?php echo $item['area']; ?> m2</div>
                                    </div>
                                    <div class="view-proper">İncele</div>
                                </a>
                            </div>
                        <?php } else{?>
                            <a href="ilan-detay.php?id=<?php echo $item['ilan_id']; ?>" class="recent-16" data-aos="fade-up" data-aos-delay="<?php echo (($sira*50)+100); ?>">
                                <div class="recent-img16 img-fluid img-center" style="background-image: url(<?php echo $item['resim_path']; ?>);"></div>
                                <div class="recent-content"></div>
                                <div class="recent-details">
                                    <div class="recent-title"><?php echo $item['baslik']; ?></div>
                                    <div class="recent-price"><?php
                                        $number = $item['price'];

                                        // Noktalama ekleyerek
                                        $formattedNumber = number_format($number, 2, ',', '.');

                                        // veya

                                        // Noktalama kaldırarak
                                        $formattedNumber = str_replace(',', '', number_format($number, 2));

                                        echo $formattedNumber;
                                        ?> ₺</div>
                                    <div class="house-details"><?php echo $item['oda_sayisi']; ?> Oda <span>|</span> <?php echo $item['banyo_sayisi']; ?> Banyo <span>|</span> <?php echo $item['area']; ?> m2</div>
                                </div>
                                <div class="view-proper">İncele</div>
                            </a>

                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION RECENTLY PROPERTIES -->

    <!-- START SECTION INFO-HELP -->
    <section class="info-help h18">
        <div class="container">
            <div class="row info-head">
                <div class="col-lg-12 col-md-8 col-xs-8">
                    <div class="info-text" data-aos="fade-up" data-aos-delay="150">
                        <h3 class="text-center mb-0">Neden Bizimle Aramalasınız</h3>
                        <p class="text-center mb-4 p-0">Hayalinizdeki yeri neden birlikte aramalıyız ?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION INFO-HELP -->

    <!-- START SECTION INFO -->
    <section _ngcontent-bgi-c3="" class="featured-boxes-area">
        <div _ngcontent-bgi-c3="" class="container">
            <div _ngcontent-bgi-c3="" class="featured-boxes-inner">
                <div _ngcontent-bgi-c3="" class="row m-0">
                    <div _ngcontent-bgi-c3="" class="col-lg-3 col-sm-6 col-md-6 p-0" data-aos="fade-up"
                         data-aos-delay="250">
                        <div _ngcontent-bgi-c3="" class="single-featured-box">
                            <div _ngcontent-bgi-c3="" class="icon color-fb7756"><img alt=""
                                                                                     height="85" src="images/icons/i-5.svg" width="85">
                            </div>
                            <h3 _ngcontent-bgi-c3="" class="mt-5">Anahtar Teslim</h3>
                            <p _ngcontent-bgi-c3="">Siz hayallerinizdeki yeri buluduğunuzda, sizin için gerekli tüm işlemleri tamamlaıyoruz. Size sadece hayalinizin keyfini sürmek kalıyor.</p></div>
                    </div>
                    <div _ngcontent-bgi-c3="" class="col-lg-3 col-sm-6 col-md-6 p-0" data-aos="fade-up"
                         data-aos-delay="350">
                        <div _ngcontent-bgi-c3="" class="single-featured-box">
                            <div _ngcontent-bgi-c3="" class="icon color-facd60"><img alt=""
                                                                                     height="85" src="images/icons/i-6.svg" width="85">
                            </div>
                            <h3 _ngcontent-bgi-c3="" class="mt-5">Güven Faktörü</h3>
                            <p _ngcontent-bgi-c3="">Sahip olduğumuz tecrübe ile yaşayabileceğiniz tüm sorunları ön görüyor ve gerekli önemleri alıyoruz.Size, hiç bir şeyi düşünmeden sadece hayallerinizi yaşamak kalıyor..</p></div>
                    </div>
                    <div _ngcontent-bgi-c3="" class="col-lg-3 col-sm-6 col-md-6 p-0" data-aos="fade-up"
                         data-aos-delay="450">
                        <div _ngcontent-bgi-c3="" class="single-featured-box">
                            <div _ngcontent-bgi-c3="" class="icon color-1ac0c6"><img alt=""
                                                                                     height="85" src="images/icons/i-7.svg" width="85">
                            </div>
                            <h3 _ngcontent-bgi-c3="" class="mt-5">Ödeme Desteği</h3>
                            <p _ngcontent-bgi-c3="">Satın alma işlemlerinde, taksit imkanı sunarak, daha küçük ödemeler ile daha büyük mülklere sahip olmanızı sağlıyoruz.</p>
                        </div>
                    </div>
                    <div _ngcontent-bgi-c3="" class="col-lg-3 col-sm-6 col-md-6 p-0" data-aos="fade-up"
                         data-aos-delay="550">
                        <div _ngcontent-bgi-c3="" class="single-featured-box">
                            <div _ngcontent-bgi-c3="" class="icon"><img alt="" height="85"
                                                                        src="images/icons/i-8.svg" width="85"></div>
                            <h3 _ngcontent-bgi-c3="" class="mt-5">7/24 Destek</h3>
                            <p _ngcontent-bgi-c3="">Dilediğiniz zaman, sesli ve yazılı kanallardan bize ulaşabiliyor ve tüm sorunlarınızda kesintisiz destek alabiliyorsunuz.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION INFO -->

    <!-- START SECTION POPULAR PLACES -->
    <section class="popular-places">
        <div class="container">
            <div class="sec-title">
                <h2><span>Popüler </span>Sehirler</h2>
                <p>En çok ilana sahip şehirlerimiz.</p>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM sehirler where deleted = 0";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $sira = 1;
                foreach ($row as $item) {?>
                <div class="col-sm-6 col-lg-4 col-xl-4" data-aos="zoom-in" data-aos-delay="<?php echo (($sira*50)+100)?>">
                    <!-- Image Box -->
                    <a class="img-box hover-effect" href="#">
                        <img alt="" class="img-responsive" src="<?php echo $url.$item['resim']; ?>">
                        <!-- Badge
                        <div class="listing-badges">
                            <span class="featured">Yeni</span>
                        </div> -->
                        <div class="img-box-content visible">
                            <h4><?php echo $item['adi']; ?></h4>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <div class="col-sm-6 col-lg-4 col-xl-4" data-aos="zoom-in" data-aos-delay="350">
                    <!-- Image Box -->
                    <a class="img-box hover-effect no-mb x3" href="properties-map.html">
                        <img alt="" class="img-responsive" src="images/popular-places/5.jpg">
                        <!-- Badge -->
                        <div class="img-box-content visible">
                            <h4>Diğer </h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION POPULAR PLACES -->

    <!-- START SECTION INFO-HELP -->
    <section class="info-help h17">
        <div class="container">
            <div class="row info-head">
                <div class="col-lg-6 col-md-8 col-xs-8" data-aos="fade-right">
                    <div class="info-text">
                        <h3>Biz sizin için bulalım</h3>
                        <h5 class="mt-3">Ücretsiz</h5>
                        <p class="pt-2">Dilerseniz, formu doldurun, sizi arayalım ve size en uygun ilanları sizin için listeleyelim. Zamandan kazanın.</p>
                        <div class="inf-btn pro">
                            <a class="btn btn-pro btn-secondary btn-lg" href="contact-us.php">İletişime Geç</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION INFO-HELP -->

    <!-- STAR SECTION PARTNERS -->
    <div class="partners bg-white-3">
        <div class="container">
            <div class="sec-title">
                <h2><span>İş </span>Ortaklarımız</h2>
                <p>Size daha iyi hizmet verebilmek için birlikte çalıştığımız yerler.</p>
            </div>
            <div class="owl-carousel style2">
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/11.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/12.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/13.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/14.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/15.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/16.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/17.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/11.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/12.jpg"></div>
                <div class="owl-item" data-aos="fade-up"><img alt="" src="images/partners/13.jpg"></div>
            </div>
        </div>
    </div>
    <!-- END SECTION PARTNERS -->

<?php
    include_once "footer.php";
?>
