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

        // Sorguyu hazırla
        $stmt = $conn->prepare($sql);

        // Sorguyu çalıştır
        $stmt->execute();

        // İlk kaydı getir
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Eğer bir kayıt varsa, bilgileri döndür
        if ($row) {
            echo json_encode(array('success' => true, 'data' => $row));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Kayıt bulunamadı'));
        }
    }
    else if (isset($_POST['ilan_resimleri']))
    {
        $id = $_POST['id'];
        // SQL sorgusu oluştur
        $sql = "SELECT * FROM ilan_resimleri 
                WHERE ilan_resimleri.deleted = 0 and ilan_id = $id
                ORDER BY ilan_resimleri.tarih DESC;
            ";

        // Sorguyu hazırla
        $stmt = $conn->prepare($sql);

        // Sorguyu çalıştır
        $stmt->execute();

        // İlk kaydı getir
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Eğer bir kayıt varsa, bilgileri döndür
        if ($row) {
            echo json_encode(array('success' => true, 'data' => $row));
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