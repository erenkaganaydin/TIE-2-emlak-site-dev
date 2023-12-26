<?php
include_once "sunucu-bilgileri.php";

try {
    // PDO nesnesi oluştur
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Hata modunu ayarla
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Hata durumunda hatayı göster
    echo "Bağlantı Hatası: " . $e->getMessage();
    die();
}

// Kullanıcı giriş bilgilerini kontrol et
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kullanıcı bilgilerini veritabanından kontrol et (örnek bir sorgu)
    $validUser = checkUserCredentials($pdo, $email, $password);

    if ($validUser) {
        // Kullanıcı bilgilerini döndür
        $userInfo = getUserInfo($pdo, $email);

        // Başarı durumunu ve kullanıcı bilgilerini JSON formatında döndür
        echo json_encode(['success' => true, 'data' => $userInfo]);
        exit;
    } else {
        // Başarısız durumu JSON formatında döndür
        echo json_encode(['success' => false]);
        exit;
    }
}

function checkUserCredentials($pdo, $email, $password) {
    try {
        // Veritabanı sorgusunu hazırla ve çalıştır
        $stmt = $pdo->prepare("SELECT * FROM yoneticibilgileri WHERE EPosta = :email AND Sifre = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Sonuçları kontrol et
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($row !== false);
    } catch (PDOException $e) {
        // Hata durumunda hatayı göster
        echo "Sorgu Hatası: " . $e->getMessage();
        die();
    }
}

function getUserInfo($pdo, $email) {
    try {
        // Veritabanı sorgusunu hazırla ve çalıştır
        $stmt = $pdo->prepare("SELECT * FROM yoneticibilgileri WHERE EPosta = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Sonuçları kontrol et
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['user_data'] = $row;

        return $row;
    } catch (PDOException $e) {
        // Hata durumunda hatayı göster
        echo "Sorgu Hatası: " . $e->getMessage();
        die();
    }
}
?>
