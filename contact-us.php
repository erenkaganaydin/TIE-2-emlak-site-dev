<?php
    include_once "header.php";

include_once "php/sunucu-bilgileri.php";
// PDO bağlantısı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}
$sql = "SELECT * FROM yoneticibilgileri where Deleted = 0";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$bilgiler = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body class="inner-pages hd-white">
    <!-- Wrapper -->
    <div id="wrapper">

        <?php
        include_once "header_nav.php";
        ?>

        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Bize Ulaş</h1>
                    <h2><a href="index.php">Anasayfa </a> &nbsp;/&nbsp; İletişim</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION CONTACT US -->
        <section class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h3 class="mb-4">Mesaj Gönder</h3>
                        <form id="contactform" class="contact-form" name="contactform" method="post" novalidate="">
                            <div class="form-group">
                                <input type="text" required="" class="form-control input-custom input-full" name="name" placeholder="Adınız">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control input-custom input-full" name="lastname" placeholder="Soyadınız">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-custom input-full" name="email" placeholder="Email adresiniz">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-custom input-full" name="telefon" placeholder="Telefon numaranız">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control textarea-custom input-full"  name="message" rows="8" placeholder="Mesajınız (varsa)"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Gönder</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-12 bgc">
                        <div class="call-info">
                            <h3>İletişim Bilgileri</h3>
                            <p class="mb-5">Bize dilediğiniz zaman ulaşabilirsiniz!</p>
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p"><?php echo $bilgiler['Adres']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p"><?php echo $bilgiler['Telefon']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti"><?php echo $bilgiler['EPosta']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info cll">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <p class="in-p ti">7/24 Ulaşabilirsiniz</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION CONTACT US -->
        <div style="height: 10px;background-color: #0c5460"></div>
        <?php include_once "footer.php"; ?>

        <script>
            document.getElementById("contactform").addEventListener("submit", function(event) {
                event.preventDefault(); // Formun normal submit işlemini durdur

                var formData = new FormData(this); // Form verilerini FormData nesnesine al

                // AJAX isteği gönder
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "./php/mesaj-kaydet.php", true); // submit.php'yi kendi işlediğiniz PHP dosyasının yoluyla değiştirin

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // İsteğin başarıyla tamamlandığı durumu işleyin
                        console.log(xhr.responseText);
                        alert(xhr.responseText);
                    } else {
                        // Hata durumu
                        console.error(xhr.statusText);
                        alert("İşleminiz tamamlanamadı !");
                    }
                };

                xhr.onerror = function() {
                    // İstek sırasında bir hata olursa
                    console.error("Network error");
                };

                xhr.send(formData); // FormData nesnesini isteğe ekle
            });
        </script>