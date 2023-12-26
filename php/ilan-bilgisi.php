<?php
include_once "sunucu-bilgileri.php";

try {
    // PDO nesnesi oluştur
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8");

    if (isset($_POST['ilan_detay']))
    {
        $id = $_POST['id'];
        // SQL sorgusu oluştur
        $sql = "SELECT * FROM ilanlar
                WHERE ilanlar.deleted = 0 and id = $id
                ORDER BY ilanlar.tarih DESC;
            ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql2 = "SELECT * FROM ilan_ozellikleri
            WHERE ilan_ozellikleri.deleted = 0 and ilan_id = $id;
            ";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $row2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $sql3 = "SELECT * FROM ilan_resimleri
            WHERE ilan_resimleri.deleted = 0 and ilan_id = $id;
            ";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        $row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        // Eğer bir kayıt varsa, bilgileri döndür
        if ($row) {
            echo json_encode(array('success' => true, 'data' => $row,'ozellikler' => $row2, 'resimler' => $row3 ));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Kayıt bulunamadı'));
        }
    }
    else {
        echo json_encode(array('success' => false, 'message' => 'Hata: Geçersiz İşlem'));
    }
} catch (PDOException $e) {
    // Hata durumunda hatayı döndür
    echo json_encode(array('success' => false, 'message' => 'Hata: ' . $e->getMessage()));
}

?>