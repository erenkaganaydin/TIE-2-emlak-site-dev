<?php

include_once "sunucu-bilgileri.php";

// PDO bağlantısı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

// Veritabanından özellikleri sorgula
$query = "SELECT * FROM ozellikler";
$statement = $pdo->prepare($query);
$statement->execute();

// JSON formatında API yanıtını oluştur
$response = array();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $response[] = $row['adi'];
}

header('Content-Type: application/json');
echo json_encode($response);

// PDO bağlantısını kapat
$pdo = null;
?>
