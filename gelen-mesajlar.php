<?php include "ortak/header.php";

include_once "php/sunucu-bilgileri.php";
// PDO bağlantısı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

?>

<body class="maxw1600 m0a dashboard-bd">
<!-- Wrapper -->
<div id="wrapper" class="int_main_wraapper">
    <?php include "ortak/navbars.php"; ?>
    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2"
         style="padding-right: 0">
        <div class="my-properties">
            <table class="table-responsive">
                <thead>
                <tr>
                    <th class="pl-2"></th>
                    <th class="pl-2">Ad Soyad</th>
                    <th class="p-0">E-Mail</th>
                    <th>Telefon</th>
                    <th>Mesaj</th>
                    <th>Tarih</th>
                </tr>
                </thead>
                <tbody id="ilanlarr">
                <?php
                $sql = "SELECT * FROM mesajlar order by tarih desc";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $sira = 1;
                foreach ($row as $item) {?>
                    <tr>
                        <td><?php echo $sira++; ?></td>
                        <td><?php echo $item['name']." ".$item['lastname']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td><?php echo $item['telefon']; ?></td>
                        <td><?php echo $item['message']; ?></td>
                        <td><?php echo $item['tarih']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>

    <?php include "ortak/footer.php"; ?>

