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
    $id = 0;
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        // SQL sorgusu oluştur
        $sql = "SELECT * FROM ilanlar
                    WHERE ilanlar.deleted = 0 and id = $id
                    ORDER BY ilanlar.tarih DESC;
                ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $ilan_bilgisi = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql2 = "SELECT * FROM ilan_ozellikleri
                WHERE ilan_ozellikleri.deleted = 0 and ilan_id = $id;
                ";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $ilan_ozellikleri = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $sql3 = "SELECT * FROM ilan_resimleri
                WHERE ilan_resimleri.deleted = 0 and ilan_id = $id;
                ";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        $ilan_resmi = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        // Eğer bir kayıt varsa, bilgileri döndür
        if ($ilan_bilgisi) {

        } else {
            // Oturum yoksa giriş sayfasına yönlendir
            header('Location: index.php');
            exit();
        }
    }
    else{
        header('Location: index.php');
        exit();
    }

$sqlbililer = "SELECT * FROM yoneticibilgileri where Deleted = 0";
$stmtbilgiler = $conn->prepare($sqlbililer);
$stmtbilgiler->execute();
$bilgiler = $stmtbilgiler->fetch(PDO::FETCH_ASSOC);
?>

<body class="inner-pages sin-1 homepage-4 hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <?php
        include_once "header_nav.php";
        ?>

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="single-proper blog details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper" style="justify-content: space-between;">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h3><?php echo $ilan_bilgisi['baslik']; ?> <span class="mrg-l-5 category-tag"><?php echo $ilan_bilgisi['ilan_durumu']; ?></span></h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo $ilan_bilgisi['city']." ".$ilan_bilgisi['state']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single detail-wrapper mr-2" >
                                            <div class="detail-wrapper-body">
                                                <div class="listing-title-bar">
                                                    <h4><?php echo $ilan_bilgisi['price']." ₺"; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- main slider carousel items -->
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Galeri</h5>
                                    <div class="carousel-inner">
                                        <?php
                                        $resimsira = 0;
                                            foreach ($ilan_resmi as $item) { ?>
                                                <div class="<?php if ($resimsira++ == 0){echo "active";} ?> item carousel-item" data-slide-number="<?php echo $resimsira; ?>">
                                                    <img src="<?php echo $item['resim_path'] ?>" class="img-fluid" alt="slider-listing">
                                                </div>
                                            <?php
                                        }
                                        ?>

                                        <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                                    </div>
                                    <!-- main slider carousel nav controls -->
                                    <ul class="carousel-indicators smail-listing list-inline">
                                        <?php
                                        $resimsira = 0;
                                        foreach ($ilan_resmi as $item) { ?>
                                            <li class="list-inline-item <?php if ($resimsira++ == 0){echo "active";} ?>">
                                                <a id="carousel-selector-0" class="selected" data-slide-to="<?php echo $resimsira; ?>" data-target="#listingDetailsSlider">
                                                    <img src="<?php echo $item['resim_path'] ?>" class="img-fluid" alt="listing-small">
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <!-- main slider carousel items -->
                                </div>
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Açıklama</h5>
                                    <p><?php echo $ilan_bilgisi['aciklama']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mb-4">İlan Özellikleri</h5>
                            <ul class="homes-list clearfix">
                                <li>
                                    <span class="font-weight-bold mr-1">İlan Numarasi:</span>
                                    <span class="det">ESIL<?php echo $ilan_bilgisi['id']."-1826"; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">İlan Tipi:</span>
                                    <span class="det"><?php echo $ilan_bilgisi['ilan_tipi']; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">İlan Durumu:</span>
                                    <span class="det"><?php echo $ilan_bilgisi['ilan_durumu']; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">İlan Fiyatı:</span>
                                    <span class="det"><?php echo $ilan_bilgisi['price']; ?> ₺</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Oda Sayısı:</span>
                                    <span class="det"><?php echo $ilan_bilgisi['oda_sayisi']; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Ek Oda Sayısı:</span>
                                    <span class="det"><?php echo $ilan_bilgisi['oda_sayisi_ek']; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Banyo:</span>
                                    <span class="det"><?php echo $ilan_bilgisi['banyo_sayisi']; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Yapım Yılı:</span>
                                    <span class="det"><?php echo $ilan_bilgisi['yas']; ?></span>
                                </li>
                            </ul>
                            <!-- title -->
                            <h5 class="mt-5">Özellikler</h5>
                            <!-- cars List -->
                            <ul class="homes-list clearfix">
                                <?php
                                foreach ($ilan_ozellikleri as $item) {?>
                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                        <span><?php echo $item['ozellik']; ?></span>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>

                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">

                            <!-- end author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed mt-33 mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>İletişim Bilgileri</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="sidebar-widget author-widget2">
                                            <div class="author-box clearfix">
                                                <img src="images/1.png" alt="author-image" class="author__img">
                                                <h4 class="author__title"><?php echo $bilgiler['AdSoyad'];?></h4>
                                                <p class="author__meta">İlan yetkilisi</p>
                                            </div>
                                            <ul class="author__contact">
                                                <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span><?php echo $bilgiler['Adres'];?></li>
                                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#"><?php echo $bilgiler['Telefon'];?></a></li>
                                                <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#"><?php echo $bilgiler['EPosta'];?></a></li>
                                            </ul>
                                            <div class="agent-contact-form-sidebar">
                                                <h4>Mesaj Gönderin</h4>
                                                <form id="contactform" class="contact-form" name="contactform" method="post" novalidate="">
                                                    <div class="form-group">
                                                        <input type="text" required="" class="form-control input-custom input-full" name="name" placeholder="Adınız">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" required="" class="form-control input-custom input-full" name="lastname" placeholder="Soyadınız">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-custom input-full" name="email" placeholder="Email adresiniz">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-custom input-full" name="telefon" placeholder="Telefon numaranız">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control textarea-custom input-full"  name="message" rows="8" placeholder="Mesajınız (varsa)"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-lg">Gönder</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-search-field-2">
                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>En Son İlanlar</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="recent-post">
                                                <?php
                                                $sira = 1;
                                                $sql = "SELECT * FROM ilanlar
            INNER JOIN (
                SELECT ilan_id, MIN(id) AS min_resim_id
                FROM ilan_resimleri
                GROUP BY ilan_id
            ) AS T ON ilanlar.id = T.ilan_id
            INNER JOIN ilan_resimleri ON ilan_resimleri.id = T.min_resim_id
            WHERE ilanlar.deleted = 0
            ORDER BY ilanlar.tarih DESC LIMIT 3;
            ";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($row as $item) { ?>
                                                    <div class="recent-main <?php if ($sira++%2 == 0){echo "mt-4";} ?>">
                                                        <div class="recent-img">
                                                            <a href="./ilan-detay.php?id=<?php echo $item['id']; ?>"><img src="<?php echo $item['resim_path']; ?>" alt="<?php echo $item['baslik']; ?>"></a>
                                                        </div>
                                                        <div class="info-img">
                                                            <a href="./ilan-detay.php?id=<?php echo $item['id']; ?>"><h6><?php echo $item['baslik']; ?></h6></a>
                                                            <p><?php echo $item['price']."₺"; ?></p>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </div>

                                    <!-- Start: Specials offer
                                    <div class="widget-boxed popular mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Specials of the day</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="banner"><img src="images/single-property/banner.jpg" alt=""></div>
                                        </div>
                                    </div>
                                   End: Specials offer -->

                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- START SIMILAR PROPERTIES -->
                <section class="similar-property featured portfolio p-0 bg-white-inner">
                    <div class="container">
                        <h5>Dikkat Çeken İlanlar</h5>
                        <div class="row portfolio-items">
                            <?php

                            $sql = "SELECT * FROM ilanlar
                        INNER JOIN (
                            SELECT ilan_id, MIN(id) AS min_resim_id
                            FROM ilan_resimleri
                            GROUP BY ilan_id
                        ) AS T ON ilanlar.id = T.ilan_id
                        INNER JOIN ilan_resimleri ON ilan_resimleri.id = T.min_resim_id
                        WHERE ilanlar.deleted = 0 and ilanlar.id <> $id
                        ORDER BY rand() LIMIT 3;
                        ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($row as $item) {?>
                                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                                    <div class="project-single mb-0" data-aos="fade-up">
                                        <a href="ilan-detay.php" class="recent-16">
                                            <div class="recent-img16 img-center" style="background-image: url(<?php echo $item['resim_path']; ?>);"></div>
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
                                            <div class="view-proper">View Details</div>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <!-- END SIMILAR PROPERTIES -->
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

       <?php include_once "footer.php"; ?>

<script>
    document.getElementById("contactform").addEventListener("submit", function(event) {
        event.preventDefault(); // Formun normal submit işlemini durdur

        var formData = new FormData(this); // Form verilerini FormData nesnesine al

        // AJAX isteği gönder
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./php/mesaj-kaydet.php", true); // submit.php'yi kendi işlediğiniz PHP dosyasının yoluyla değiştirin

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // İsteğin başarıyla tamamlandığı durumu işleyin
                console.log(xhr.responseText);
                alert(xhr.responseText);
            } else {
                // Hata durumu
                console.error(xhr.statusText);
                alert("İşleminiz tamamlanamadı !");
            }
        };

        xhr.onerror = function() {
            // İstek sırasında bir hata olursa
            console.error("Network error");
        };

        xhr.send(formData); // FormData nesnesini isteğe ekle
    });
</script>
<?php
try {
    // İlgili ilanın ID'si
    $ilan_id = 1; // İlan ID'sini kendinize göre güncelleyin

    // SQL sorgusu
    $sql = "UPDATE ilanlar SET goruntulenme = goruntulenme + 1 WHERE id = :ilan_id";

    // Sorguyu hazırla
    $stmt = $conn->prepare($sql);

    // Parametreleri bind et
    $stmt->bindParam(':ilan_id', $id, PDO::PARAM_INT);

    // Sorguyu çalıştır
    $stmt->execute();

} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

// PDO bağlantısını kapat
$pdo = null;

?>