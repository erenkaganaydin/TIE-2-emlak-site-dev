<?php
include_once "sunucu-bilgileri.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // AJAX isteği ile gönderilen resim ID'sini al
    $resimId = $_POST['resim_id'];

    // Burada veritabanından resmi silme işlemini gerçekleştirin
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Silme sorgusu
        $silmeSorgusu = $conn->prepare('DELETE FROM ilan_resimleri WHERE id = :resimId');
        $silmeSorgusu->bindParam(':resimId', $resimId, PDO::PARAM_INT);

        // Silme işlemini gerçekleştir
        $silmeSorgusu->execute();

        $response = ['success' => true];
    } catch (PDOException $e) {
        $response = ['success' => false, 'error' => $e->getMessage()];
    }

    // JSON formatında cevap döndür
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Sayfaya doğrudan erişim engelle
    header("HTTP/1.1 403 Forbidden");
    exit;
}
?>
