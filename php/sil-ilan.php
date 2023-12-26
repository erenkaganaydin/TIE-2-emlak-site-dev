<?php

include_once "sunucu-bilgileri.php";

// PDO bağlantısı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

// POST isteği ile gönderilen ilan_id parametresini alın
$ilanId = isset($_POST['ilan_id']) ? $_POST['ilan_id'] : null;

if (!$ilanId) {
    // İlan ID bulunamazsa hata döndür
    echo json_encode(['success' => false, 'message' => 'İlan ID eksik.']);
    exit;
}

try {
    // Veritabanında ilanı sil
    $stmt = $pdo->prepare("DELETE FROM ilanlar WHERE id = ?");
    $stmt->execute([$ilanId]);

    // Başarılı bir şekilde silindiğini bildir
    echo json_encode(['success' => true, 'message' => 'İlan başarıyla silindi.']);
} catch (PDOException $e) {
    // Hata oluştuğunda hatayı bildir
    echo json_encode(['success' => false, 'message' => 'İlan silinirken bir hata oluştu: ' . $e->getMessage()]);
}
?>
