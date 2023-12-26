<?php
// Veritabanı bağlantısı
include_once "sunucu-bilgileri.php";


try {
    // PDO nesnesi oluştur
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Formdan gelen verileri al
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $message = $_POST['message'];

    // Veritabanına ekleme sorgusu
    $sql = "INSERT INTO mesajlar (name, lastname, email, telefon, message) VALUES (:name, :lastname, :email, :telefon, :message)";

    // Sorguyu hazırla
    $stmt = $conn->prepare($sql);

    // Parametreleri bağla
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':message', $message);

    // Sorguyu çalıştır
    $stmt->execute();

    echo "Mesaj başarıyla kaydedildi.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Veritabanı bağlantısını kapat
$conn = null;
?>
