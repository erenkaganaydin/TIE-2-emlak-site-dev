<?php
include_once "sunucu-bilgileri.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // POST verilerini al
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $confirmNewPassword = $_POST['confirm-new-password'];
    $userId = 1; // Örneğin, 1 ID'li kullanıcıyı güncellemek istiyorsunuz

    // Mevcut şifreyi kontrol et
    $checkPasswordQuery = "SELECT Sifre FROM yoneticibilgileri WHERE Id = ?";
    $stmt = $conn->prepare($checkPasswordQuery);
    $stmt->execute([$userId]);
    $row = $stmt->fetch();

    if ($row) {
        $dbPassword = $row['Sifre'];
        // Mevcut şifre doğruysa güncelleme işlemini yap
        if ($currentPassword == $dbPassword) {
            // Hash lersek if (password_verify($currentPassword, $dbPassword)) {
            // Yeni şifre ve tekrarı eşleşiyorsa güncelle
            if ($newPassword == $confirmNewPassword) {
                //Hash lersek $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $hashedNewPassword = $newPassword;

                // Şifreyi güncelle
                $updatePasswordQuery = "UPDATE yoneticibilgileri SET Sifre = ? WHERE Id = ?";
                $stmt = $conn->prepare($updatePasswordQuery);
                $stmt->execute([$hashedNewPassword, $userId]);

                echo json_encode(['success' => true, 'message' => 'Şifre güncellendi']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Yeni şifreler eşleşmiyor']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Mevcut şifre yanlış']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Kullanıcı bulunamadı']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Hata: ' . $e->getMessage()]);
}

$conn = null;


?>