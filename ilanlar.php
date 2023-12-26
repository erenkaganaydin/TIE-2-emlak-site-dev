<?php
    include_once "header.php";
    include_once "php/sunucu-bilgileri.php";
// PDO bağlantısı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

$ekSorgular = " and 1=1 ";

if(isset($_POST['filtreler']))
{
    if (isset($_POST['anahtar_kelime']))
    {
        if (strlen($_POST['anahtar_kelime'])>0)
            $ekSorgular = $ekSorgular. " and ilanlar.baslik like '%".$_POST['anahtar_kelime']."%' ";
    }
    if (isset($_POST['ilan_tip']))
    {
        if (strlen($_POST['ilan_tip'])>1)
         $ekSorgular = $ekSorgular. " and ilanlar.ilan_tipi = '".$_POST['ilan_tip']."' ";
    }
    if (isset($_POST['sehir']))
    {
        if (strlen($_POST['sehir'])>1)
            $ekSorgular = $ekSorgular. " and ilanlar.city = '".$_POST['sehir']."' ";
    }
}
?>

<body class="inner-pages agents hp-6 full hd-white">
    <!-- Wrapper -->
    <div id="wrapper">

        <?php include_once "header_nav.php"; ?>

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="properties-list featured portfolio blog ho-17">
            <div class="container">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p><a href="index.php">Anasayfa </a> &nbsp;/&nbsp; <span>İlanlar</span></p>
                                </div>
                                <h3>İlanlar</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->
                <div class="col-12 px-0 parallax-searchs">
                    <div class="banner-search-wrap">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <div class="row" style="justify-content: space-between">
                                        <form action="" method="post" style="display: contents;">
                                            <input type="hidden" name="filtreler">
                                            <div class="rld-single-input">
                                                <input type="text" value="<?php if (isset($_POST['anahtar_kelime'])){ echo $_POST['anahtar_kelime'];} ?>" name="anahtar_kelime" placeholder="Anahtar Kelime...">
                                            </div>
                                            <div class="rld-single-select ml-22">
                                                <select class="select single-select" name="ilan_tip">
                                                    <option value="0">İlan Tipi</option>
                                                    <?php
                                                    $sql = "
                                                    SELECT * FROM ilan_tipleri where deleted = 0
                                                        ";
                                                    $stmt = $pdo->prepare($sql);
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
                                                    $stmt = $pdo->prepare($sql);
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
                                                <button class="btn btn-yellow" type="submit">Ara</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Search Form -->
                <section class="headings-2 pt-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="font-weight-bold mb-0 mt-3">9 Search results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row portfolio-items">
                    <?php
                    $sql = "SELECT * FROM ilanlar
                        INNER JOIN (
                            SELECT ilan_id, MIN(id) AS min_resim_id
                            FROM ilan_resimleri
                            GROUP BY ilan_id
                        ) AS T ON ilanlar.id = T.ilan_id
                        INNER JOIN ilan_resimleri ON ilan_resimleri.id = T.min_resim_id
                        WHERE ilanlar.deleted = 0 $ekSorgular
                        ORDER BY ilanlar.tarih DESC;
                        ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($row as $item) {?>
                    <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                        <div class="project-single mb-0" data-aos="fade-up">
                            <a href="ilan-detay.php?id=<?php echo $item['ilan_id']; ?>" class="recent-16">
                                <div class="recent-img16 img-center" style="background-image: url(images/interior/p-1.jpg);"></div>
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
        <!-- END SECTION PROPERTIES LISTING -->


        <a data-scroll="" href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->


        <?php include_once "footer.php"; ?>

<script>
    $(".dropdown-filter").on('click', function() {

        $(".explore__form-checkbox-list").toggleClass("filter-block");

    });

</script>