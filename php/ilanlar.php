<?php
include_once "sunucu-bilgileri.php";

try {
    // PDO nesnesi oluştur
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8");

    if (isset($_POST['tumu'])) {
        // SQL sorgusu oluştur
        $sql = "SELECT * FROM ilanlar
            INNER JOIN (
                SELECT ilan_id, MIN(id) AS min_resim_id
                FROM ilan_resimleri
                GROUP BY ilan_id
            ) AS T ON ilanlar.id = T.ilan_id
            INNER JOIN ilan_resimleri ON ilan_resimleri.id = T.min_resim_id
            WHERE ilanlar.deleted = 0
            ORDER BY ilanlar.tarih DESC;
            ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);



        // Eğer bir kayıt varsa, bilgileri döndür
        if ($row) {
            echo json_encode(array('success' => true, 'data' => $row));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Kayıt bulunamadı'));
        }
    } else {
        echo json_encode(array('success' => false, 'message' => 'Hata: Geçersiz İşlem'));
    }
} catch (PDOException $e) {
    // Hata durumunda hatayı döndür
    echo json_encode(array('success' => false, 'message' => 'Hata: ' . $e->getMessage()));
}

?>