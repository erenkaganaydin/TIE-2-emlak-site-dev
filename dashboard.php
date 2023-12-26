<?php

include_once "php/sunucu-bilgileri.php";
// PDO bağlantısı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

include "ortak/header.php"; ?>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">

        <?php include "ortak/navbars.php"; ?>

                    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                        <div class="dashborad-box stat bg-white">
                            <h4 class="title">Genel Bilgiler</h4>
                            <div class="section-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number">
                                                    <?php
                                                    $sql = "SELECT * FROM ilanlar where deleted = 0";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    echo count($row);
                                                    ?>
                                                </h6>
                                                <p class="type ml-1">İlan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number"><?php
                                                    $sql = "SELECT sum(goruntulenme) toplam FROM ilanlar where deleted = 0";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    echo ($row['toplam']);
                                                    ?></h6>
                                                <p class="type ml-1">Toplam Görüntülenme</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashborad-box">
                            <h4 class="title">Son İlanlar</h4>
                            <div class="section-body listing-table">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>İlan Adı</th>
                                                <th>Tarih</th>
                                                <th>Görüntülenme</th>
                                                <th>Düzenle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM ilanlar where deleted = 0 LIMIT 4";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($row as $item) {
                                        ?>
                                            <tr>
                                                <td><?php echo $item['baslik']; ?></td>
                                                <td><?php echo $item['tarih']; ?></td>
                                                <td class="status"><span class=" active"><?php echo $item['goruntulenme']; ?></span></td>
                                                <td class="edit"><a href="./edit-propery.php?id=<?php echo $item['id']; ?>"><i class="fa fa-pencil"></i></a></td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="dashborad-box stat bg-white">
                            <h4 class="title">Hızlı Düzenle</h4>
                            <div class="section-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12 dar pro mr-3">
                                        <a href="./user-profile.php">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number" style="margin-top: 7px;">
                                                   İletişim Bilgilerim
                                                </h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-xs-12 dar pro" style="background-color: #1eabc3">
                                        <a href="./gelen-mesajlar.php">
                                            <div class="item">
                                                <div class="icon">
                                                    <i class="fa fa-list" aria-hidden="true"></i>
                                                </div>
                                                <div class="info">
                                                    <h6 class="number" style="margin-top: 7px;">
                                                        Mesajlar
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include "ortak/footer.php"; ?>
