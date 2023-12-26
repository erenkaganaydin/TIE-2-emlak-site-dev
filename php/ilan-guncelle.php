<?php
include_once "sunucu-bilgileri.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // İlanı güncelleme
    $sql = "UPDATE ilanlar SET 
        baslik = :baslik, 
        aciklama = :aciklama, 
        ilan_durumu = :ilan_durumu, 
        ilan_tipi = :ilan_tipi, 
        oda_sayisi = :oda_sayisi, 
        price = :price, 
        area = :area, 
        address = :address, 
        city = :city, 
        state = :state, 
        country = :country, 
        latitude = :latitude, 
        longitude = :longitude, 
        yas = :yas, 
        oda_sayisi_ek = :oda_sayisi_ek, 
        banyo_sayisi = :banyo_sayisi, 
        ad = :ad, 
        kullanici_adi = :kullanici_adi, 
        email = :email, 
        telefon = :telefon 
    WHERE id = :ilan_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':baslik', $_POST['baslik']);
    $stmt->bindParam(':aciklama', $_POST['aciklama']);
    $stmt->bindParam(':ilan_durumu', $_POST['ilan_durumu']);
    $stmt->bindParam(':ilan_tipi', $_POST['ilan_tipi']);
    $stmt->bindParam(':oda_sayisi', $_POST['oda_sayisi']);
    $stmt->bindParam(':price', $_POST['price']);
    $stmt->bindParam(':area', $_POST['area']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':city', $_POST['city']);
    $stmt->bindParam(':state', $_POST['state']);
    $stmt->bindParam(':country', $_POST['country']);
    $stmt->bindParam(':latitude', $_POST['latitude']);
    $stmt->bindParam(':longitude', $_POST['longitude']);
    $stmt->bindParam(':yas', $_POST['yas']);
    $stmt->bindParam(':oda_sayisi_ek', $_POST['oda_sayisi_ek']);
    $stmt->bindParam(':banyo_sayisi', $_POST['banyo_sayisi']);
    $stmt->bindParam(':ad', $_POST['ad']);
    $stmt->bindParam(':kullanici_adi', $_POST['kullanici_adi']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':telefon', $_POST['telefon']);
    $stmt->bindParam(':ilan_id', $_POST['ilan_id']); // Ekledik

    $stmt->execute();

    // İlan özelliklerini güncelleme
    $ilan_id = $_POST['ilan_id']; // Güncellenen ilanın ID'sini alın
    // Önce mevcut özellikleri sil
    $deleteFeaturesSql = "DELETE FROM ilan_ozellikleri WHERE ilan_id = :ilan_id";
    $deleteFeaturesStmt = $conn->prepare($deleteFeaturesSql);
    $deleteFeaturesStmt->bindParam(':ilan_id', $ilan_id);
    $deleteFeaturesStmt->execute();

    // Sonra yeni özellikleri ekle
    foreach ($_POST['features'] as $feature) {
        $featureSql = "INSERT INTO ilan_ozellikleri (ilan_id, ozellik) VALUES (:ilan_id, :ozellik)";
        $featureStmt = $conn->prepare($featureSql);
        $featureStmt->bindParam(':ilan_id', $ilan_id);
        $featureStmt->bindParam(':ozellik', $feature);
        $featureStmt->execute();
    }

    // Yeni resimleri yükleme işlemi (eski resimleri sil ve yeni resimleri ekle)
    if (!empty($_FILES['resimler']['name'][0])) {
        $uploadDirectory = '../uploads/'; // İlgili dizini belirtin
        $baseUrl = 'http://localhost:1011/TIE-2-emlak-site-dev/uploads/'; // Change this to the actual base URL

        // Mevcut resimleri sil
        $deleteImagesSql = "DELETE FROM ilan_resimleri WHERE ilan_id = :ilan_id";
        $deleteImagesStmt = $conn->prepare($deleteImagesSql);
        $deleteImagesStmt->bindParam(':ilan_id', $ilan_id);
        $deleteImagesStmt->execute();

        // Yeni resimleri ekle
        foreach ($_FILES['resimler']['tmp_name'] as $key => $tmp_name) {
            $originalFileName = $_FILES['resimler']['name'][$key];
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

            // Generate a random file name with extension
            $randomString = bin2hex(random_bytes(8)); // 8 bytes will result in a 16-character hex string
            $newFileName = $randomString . '.' . $fileExtension;

            $filePath = $uploadDirectory . $newFileName;
            $fileUrl = $baseUrl . $newFileName;

            move_uploaded_file($tmp_name, $filePath);

            // İlgili resmi veritabanına ekleyin (örneğin, ilan_resimleri tablosuna)
            $resimSql = "INSERT INTO ilan_resimleri (ilan_id, resim_path) VALUES (:ilan_id, :resim_path)";
            $resimStmt = $conn->prepare($resimSql);
            $resimStmt->bindParam(':ilan_id', $ilan_id);
            $resimStmt->bindParam(':resim_path', $fileUrl); // Store the URL instead of the file path
            $resimStmt->execute();
        }
    }

    $response = ["success" => true, "message" => "İlan başarıyla güncellendi"];
    echo json_encode($response);
} catch (PDOException $e) {
    $response = ["success" => false, "message" => "Hata: " . $e->getMessage()];
    echo json_encode($response);
}

// Veritabanı bağlantısını kapat
$conn = null;
?>
