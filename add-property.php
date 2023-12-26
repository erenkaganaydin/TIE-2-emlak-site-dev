<?php

include "ortak/header.php";

include_once "php/sunucu-bilgileri.php";
// PDO bağlantısı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

?>

    <body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
<div id="wrapper" class="int_main_wraapper">

<?php include "ortak/navbars.php"; ?>

    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
        <form id="ilan-formu" method="post" enctype="multipart/form-data">
            <div class="single-add-property">
                <h3>İlan Detayları ve Fiyat</h3>
                <div class="property-form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <label for="baslik">İlan Başlığı</label>
                                <input type="text" name="baslik" id="baslik" placeholder="İlan başlığınız">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <label for="aciklama">İlan Açıklaması</label>
                                <textarea id="aciklama" name="aciklama"
                                          placeholder="İlan açıklamanız..."></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                            <div class="form-group ilan_durum">
                                <div class="nice-select form-control wide" tabindex="0">
                                    <span class="current">İlan Durumu</span>
                                    <ul class="list">
                                        <li data-value="Kiralık" class="option">Kiralık</li>
                                        <li data-value="Satılık" class="option">Satılık</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                            <div class="form-group categories">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                            class="current">İlan Tipi</span>
                                    <ul class="list">
                                        <?php
                                        $sql = "SELECT * FROM ilan_tipleri where deleted = 0";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($row as $item) {?>
                                            <li data-value="<?php echo $item['adi']; ?>" class="option"><?php echo $item['adi']; ?></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                            <div class="form-group categories">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                            class="current">Oda Sayısı</span>
                                    <ul class="list">
                                        <li data-value="1" class="option">1</li>
                                        <li data-value="2" class="option">2</li>
                                        <li data-value="3" class="option">3</li>
                                        <li data-value="4" class="option">4</li>
                                        <li data-value="5" class="option">5</li>
                                        <li data-value="6" class="option">6</li>
                                        <li data-value="7" class="option">7</li>
                                        <li data-value="8" class="option">8</li>
                                        <li data-value="9" class="option">9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb">
                                <label for="price">Fiyat</label>
                                <input type="text" name="price" placeholder="TL (₺)" id="price">
                                <span style="font-size: 11px;">Basamak ayırmak için (,) ve (.) kullanmayınız! <br>Doğru Örnek: 1.000.000 için 1000000 dır.</span>
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb last">
                                <label for="area">Metrekare</label>
                                <input type="text" name="area" placeholder="Metrekare" id="area">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-add-property">
                <h3>İlan Lokasyonu</h3>
                <div class="property-form-group">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="address">Adres</label>
                                <input type="text" name="address" placeholder="Adresinizi Girin" id="address">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group sehir mt-2">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                            class="current">Sehir Seçin</span>
                                    <ul class="list">
                                        <?php
                                        $sql = "SELECT * FROM sehirler where deleted = 0";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($row as $item) {?>
                                            <li data-value="<?php echo $item['adi']; ?>" class="option"><?php echo $item['adi']; ?></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="state">Mahale</label>
                                <input type="text" name="state" placeholder="Mahallenizi Girin" id="state">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="country">Ülke</label>
                                <input type="text" name="country" placeholder="Ülkenizi Girin" id="country">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb first">
                                <label for="latitude">Google Haritalar Enlem</label>
                                <input type="text" name="latitude" placeholder="Google Haritalar Enlem" id="latitude">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb last">
                                <label for="longitude">Google Haritalar Boylam</label>
                                <input type="text" name="longitude" placeholder="Google Haritalar Boylam" id="longitude">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-add-property">
                <h3>Ek Bilgiler</h3>
                <div class="property-form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                            <div class="form-group categories">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                            class="current">Yaş Seçiniz</span>
                                    <ul class="list">
                                        <li data-value="0-1 yıl" class="option">0-1 yıl</li>
                                        <li data-value="1-5 yıl" class="option">1-5 yıl</li>
                                        <li data-value="5-10 yıl" class="option">5-10 yıl</li>
                                        <li data-value="10-15 yıl" class="option">10-15 yıl</li>
                                        <li data-value="15-20 yıl" class="option">15-20 yıl</li>
                                        <li data-value="20-50 yıl" class="option">20-50 yıl</li>
                                        <li data-value="50+ yıl" class="option">50+ yıl</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                            <div class="form-group categories">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                            class="current">Oda Sayısı Seçiniz</span>
                                    <ul class="list">
                                        <li data-value="1" class="option">1</li>
                                        <li data-value="2" class="option">2</li>
                                        <li data-value="3" class="option">3</li>
                                        <li data-value="4" class="option">4</li>
                                        <li data-value="5" class="option">5</li>
                                        <li data-value="6" class="option">6</li>
                                        <li data-value="7" class="option">7</li>
                                        <li data-value="8" class="option">8</li>
                                        <li data-value="9" class="option">9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                            <div class="form-group categories">
                                <div class="nice-select form-control wide" tabindex="0"><span class="current">Banyo Sayısı Seçiniz</span>
                                    <ul class="list">
                                        <li data-value="1" class="option">1</li>
                                        <li data-value="2" class="option">2</li>
                                        <li data-value="3" class="option">3</li>
                                        <li data-value="4" class="option">4</li>
                                        <li data-value="5" class="option">5</li>
                                        <li data-value="6" class="option">6</li>
                                        <li data-value="7" class="option">7</li>
                                        <li data-value="8" class="option">8</li>
                                        <li data-value="9" class="option">9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-add-property">
                <h3>Mülk Özellikleri</h3>
                <div class="property-form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pro-feature-add pl-0" id="ozelliklerListesi">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-add-property">
                <h3>İletişim Bilgileri</h3>
                <div class="property-form-group">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="con-name">Ad</label>
                                <input type="text" placeholder="Adınızı Girin" id="con-name" name="con-name">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="con-user">Kullanıcı Adı</label>
                                <input type="text" placeholder="Kullanıcı Adınızı Girin" id="con-user" name="con-user">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb first">
                                <label for="con-email">E-posta</label>
                                <input type="email" placeholder="E-postanızı Girin" id="con-email" name="con-email">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb last">
                                <label for="con-phn">Telefon</label>
                                <input type="text" placeholder="Telefon Numaranızı Girin" id="con-phn" name="con-phn">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-add-property">
                <h3>İlan Resimleri</h3>
                <div class="property-form-group">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <label for="resimler">Resimler:</label>
                            <input id="resimler" name="resimler[]" type="file" multiple class="file" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                        </div>
                    </div>

                </div>
                <div class="ilan-ekle-buton pt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="prperty-submit-button">
                                <button type="submit">İlanı Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php include "ortak/footer.php"; ?>
    <script src="
https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.5.2/js/fileinput.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.5.2/css/fileinput.min.css
" rel="stylesheet">
    <script>
        $(document).ready(function () {
            $("#ilan-formu").submit(function (e) {
                e.preventDefault();

                // Checkbox'ların değerlerini dizi olarak topla
                var features = [];
                $(".pro-feature-add input[name='check']:checked").each(function () {
                    var ozellik = "";
                    try{
                        ozellik = $(this)[0].attributes['data-ozellik'].value
                        features.push(ozellik);
                    }
                    catch (e) {

                    }
                });

                // Form verilerini al
                var formData = new FormData();
                formData.append("baslik", $("#baslik").val());
                formData.append("aciklama", $("#aciklama").val());
                formData.append("ilan_durumu", $(".ilan_durum .current").text());
                formData.append("ilan_tipi", $(".categories:eq(0) .current").text());
                formData.append("oda_sayisi", $(".categories:eq(1) .current").text());
                formData.append("price", $("#price").val().replace(/,/g, '').replace(/./g, ''));
                formData.append("area", $("#area").val());
                formData.append("address", $("#address").val());
                formData.append("city", $(".sehir .current").text());  //
                formData.append("state",$("#state").val());
                formData.append("country", $("#country").val());
                formData.append("latitude", $("#latitude").val());
                formData.append("longitude", $("#longitude").val());
                formData.append("yas", $(".categories:eq(2) .current").text());
                formData.append("oda_sayisi_ek", $(".categories:eq(3) .current").text());
                formData.append("banyo_sayisi", $(".categories:eq(4) .current").text());
                formData.append("ad", $("#con-name").val());
                formData.append("kullanici_adi", $("#con-user").val());
                formData.append("email", $("#con-email").val());
                formData.append("telefon", $("#con-phn").val());

                // Checkbox'ları dizi olarak ekleyin
                for (var i = 0; i < features.length; i++) {
                    formData.append("features[]", features[i]);
                }

                // Resim dosyalarını da ekleyin
                var resimInput = $("#resimler")[0];
                var resimDosyalari = resimInput.files;
                for (var j = 0; j < resimDosyalari.length; j++) {
                    formData.append("resimler[]", resimDosyalari[j]);
                }

                // AJAX isteği gönder
                $.ajax({
                    type: "POST",
                    url: "./php/ilan-ekle.php", // Sunucu tarafında verileri işleyecek bir dosya
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Başarılı cevap
                        console.log(response);
                        alert(response.message);
                    },
                    error: function (error) {
                        // Hata durumu
                        console.log(error);
                        alert("Bir hata oldu.");

                        // Hata durumunda kullanıcıya bilgi verebilirsiniz.
                    }
                });
            });
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/js/locales/tr.min.js" integrity="sha512-KkUSilO3J9n5tJYIGH4XIT596FYC0hd4kIm6ecQPDvYDdlgJ5jRMEj4cgJdT9GGBScJG+Gk5enLClT/omw6Q3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            // Dosya yükleme alanını etkinleştir
            $("#resimler").fileinput({
                language: "tr",
                showRemove: true,
                showCancel: false,
                showUpload: false,
                showCaption: true,
                allowedFileExtensions: ["jpg", "jpeg", "png", "gif"]
            });

            ozellikleriGetir();
        });

        function ozellikleriGetir()
        {
            $.ajax({
                type: 'GET',
                url: './php/ozellikler.php',
                dataType: 'json',
                success: function (response) {
                    // Özellikleri listeye ekle
                    response.forEach(function (ozellik) {
                        var checkboxId = 'check-' + ozellik.toLowerCase();
                        var labelFor = 'check-' + ozellik.toLowerCase();

                        var listItem = $('<li class="fl-wrap filter-tags clearfix"></li>');
                        var checkboxes = $('<div class="checkboxes float-left"></div>');
                        var filterTagsWrap = $('<div class="filter-tags-wrap"></div>');
                        var inputCheckbox = $('<input id="' + checkboxId + '" data-ozellik="' + ozellik + '" type="checkbox" name="check">');
                        var label = $('<label for="' + labelFor + '">' + ozellik + '</label>');

                        // HTML yapısını oluşturulan öğeleri birleştir
                        filterTagsWrap.append(inputCheckbox);
                        filterTagsWrap.append(label);
                        checkboxes.append(filterTagsWrap);
                        listItem.append(checkboxes);

                        // Listeye ekle
                        $('#ozelliklerListesi').append(listItem);
                    });
                },
                error: function (error) {
                    console.log('Error fetching data: ' + error.responseText);
                }
            });
        }
    </script>