<?php
// Veritabanı bağlantısı için bilgiler
include_once "sunucu-bilgileri.php";


try {
    // PDO nesnesi oluştur
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8");

    if (isset($_POST['update'])) {
        // POST verilerini al
        $adSoyad = $_POST['AdSoyad'];
        $telefon = $_POST['Telefon'];
        $email = $_POST['EPosta'];
        $adres = $_POST['Adres'];

        // SQL sorgusu oluştur
        $sql = "UPDATE yoneticibilgileri SET AdSoyad = :AdSoyad,Telefon = :telefon, EPosta = :email, Adres = :adres WHERE Id = 1";

        // Sorguyu hazırla
        $stmt = $conn->prepare($sql);

        // Değişkenleri bağla
        $stmt->bindParam(':AdSoyad', $adSoyad);
        $stmt->bindParam(':telefon', $telefon);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adres', $adres);

        // Sorguyu çalıştır
        $stmt->execute();

        // Güncelleme başarılı mesajı döndür
        echo "Veriler başarıyla güncellendi";
    }
    else if (isset($_POST['listele']))
    {
        header('Content-Type: application/json');

        try {
            // PDO nesnesi oluştur
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Hata modunu ayarla
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET NAMES utf8");

            if (isset($_POST['listele'])) {
                // SQL sorgusu oluştur
                $sql = "SELECT * FROM yoneticibilgileri LIMIT 1";

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
            } else {
                echo json_encode(array('success' => false, 'message' => 'Hata: Geçersiz İşlem'));
            }
        } catch(PDOException $e) {
            // Hata durumunda hatayı döndür
            echo json_encode(array('success' => false, 'message' => 'Hata: ' . $e->getMessage()));
        }
    }
    else
    {
        echo "Hata: Geçersiz İşlem";
    }
} catch(PDOException $e) {
    // Hata durumunda hatayı göster
    echo "Hata: " . $e->getMessage();
}

// Veritabanı bağlantısını kapat
$conn = null;
?>
