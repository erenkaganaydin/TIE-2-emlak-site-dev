<?php include "ortak/header.php"; ?>

<body class="inner-pages maxw1600 m0a dashboard-bd">
<!-- Wrapper -->
<div id="wrapper" class="int_main_wraapper">

    <?php include "ortak/navbars.php"; ?>

    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
        <form id="ilan-formu" method="post" enctype="multipart/form-data">
            <input type="hidden" id="ilan_id" name="ilan_id" value="<?php echo $_GET['id']; ?>">
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
                            <div class="form-group tipilan">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                        class="current">İlan Tipi</span>
                                    <ul class="list">
                                        <li data-value="Ev" class="option">Ev</li>
                                        <li data-value="Ticari" class="option">Ticari</li>
                                        <li data-value="Apartman" class="option">Apartman</li>
                                        <li data-value="Garaj" class="option">Garaj</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                            <div class="form-group odasayisi">
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
                                <input type="text" id="adress" name="address" placeholder="Adresinizi Girin" >
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="city">Şehir</label>
                                <input type="text" name="city" placeholder="Şehrinizi Girin" id="city">
                            </p>
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
                            <div class="form-group yas">
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
                            <div class="form-group odaek">
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
                            <div class="form-group banyosayisi">
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
                        <div class="col-lg-12 col-md-12 row" id="oncekiResimler">

                        </div>
                        <div class="col-lg-12 col-md-12 mt-5">
                            <label for="resimler">Tekrar Yükle:</label>
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
                formData.append("ilan_id", $("#ilan_id").val());
                formData.append("baslik", $("#baslik").val());
                formData.append("aciklama", $("#aciklama").val());
                formData.append("ilan_durumu", $(".ilan_durum .current").text());
                formData.append("ilan_tipi", $(".tipilan .current").text());
                formData.append("oda_sayisi", $(".odasayisi .current").text());
                formData.append("price", $("#price").val());
                formData.append("area", $("#area").val());
                formData.append("address", $("#adress").val());
                formData.append("city", $("#city").val());
                formData.append("state", $("#state").val());
                formData.append("country", $("#country").val());
                formData.append("latitude", $("#latitude").val());
                formData.append("longitude", $("#longitude").val());
                formData.append("yas", $(".yas .current").text());
                formData.append("oda_sayisi_ek", $(".odaek .current").text());
                formData.append("banyo_sayisi", $(".banyosayisi .current").text());
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
                    url: "./php/ilan-guncelle.php", // Sunucu tarafında verileri işleyecek bir dosya
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json', // Assuming your API returns JSON
                    success: function (response) {
                        // Başarılı cevap
                        console.log(response.message);
                        alert(response.message);
                        bilgileriGetir();
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
        });
    </script>


    <script>
        $(document).ready(function () {
            ozellikleriGetir();

            // Silme butonuna tıklandığında
            $('#oncekiResimler').on('click', '.sil-button', function () {
                var resimId = $(this).data('resim-id');

                // AJAX isteği göndererek resmi silme işlemini yap
                $.ajax({
                    type: 'POST',
                    url: './php/sil-resim.php',  // Silme işlemini gerçekleştirecek PHP dosyasının yolu
                    data: {resim_id: resimId},
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            console.log('Resim başarıyla silindi.');
                            // Silme işleminden sonra tekrar bilgileri getirerek sayfayı güncelle
                            bilgileriGetir();
                        } else {
                            console.log('Resim silme başarısız.');
                        }
                    },
                    error: function (error) {
                        console.log('Hata:', error.responseText);
                    }
                });
            });


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

                    bilgileriGetir();
                },
                error: function (error) {
                    console.log('Error fetching data: ' + error.responseText);
                }
            });
        }

        function bilgileriGetir() {
            $.ajax({
                type: 'POST',
                url: './php/ilan-bilgisi.php',
                data: {ilan_detay: true,id:<?php echo $_GET['id']; ?>}, // Send the 'listele' parameter to indicate fetching data
                dataType: 'json', // Assuming your API returns JSON
                success: function (response) {
                    if (response.success) {
                        // Populate form fields with existing data
                        console.log(response.data);
                        console.log(response.ozellikler);
                        $("#baslik").val(response.data.baslik);
                        $("#aciklama").val(response.data.aciklama);

                        // İlan Durumu seçimini güncelle
                        $(".form-group.ilan_durum .nice-select .current").text(response.data.ilan_durumu);
                        $(".form-group.ilan_durum .nice-select .option[data-value='" + response.data.ilan_durumu + "']").addClass('selected');

                        // Diğer alanları da aynı şekilde güncelleyebilirsiniz

                        $(".form-group.tipilan .nice-select .current").text(response.data.ilan_tipi);
                        $(".form-group.tipilanies .nice-select .option[data-value='" + response.data.ilan_tipi + "']").addClass('selected');

                        $(".form-group.odasayisi .nice-select .current").text(response.data.oda_sayisi);
                        $(".form-group.odasayisi .nice-select .option[data-value='" + response.data.oda_sayisi + "']").addClass('selected');


                        $("#price").val(response.data.price);
                        $("#area").val(response.data.area);
                        $("#adress").val(response.data.address);

                        $("#city").val(response.data.city);
                        $("#state").val(response.data.state);
                        $("#country").val(response.data.country);
                        $("#latitude").val(response.data.latitude);
                        $("#longitude").val(response.data.longitude);

                        $(".form-group.yas .nice-select .current").text(response.data.yas);
                        $(".form-group.yas .nice-select .option[data-value='" + response.data.yas + "']").addClass('selected');

                        $(".form-group.odaek .nice-select .current").text(response.data.oda_sayisi_ek);
                        $(".form-group.odaek .nice-select .option[data-value='" + response.data.oda_sayisi_ek + "']").addClass('selected');

                        $(".form-group.banyosayisi .nice-select .current").text(response.data.banyo_sayisi);
                        $(".form-group.banyosayisi .nice-select .option[data-value='" + response.data.banyo_sayisi + "']").addClass('selected');

                        $("#con-name").val(response.data.ad);
                        $("#con-user").val(response.data.kullanici_adi);
                        $("#con-email").val(response.data.email);
                        $("#con-phn").val(response.data.telefon);

                        if (response.ozellikler && response.ozellikler.length > 0) {
                            console.log("ozellik");
                            response.ozellikler.forEach(function (ozellik) {
                                // Özellik adını alın ve küçük harfe çevirin
                                var ozellikAdi = ozellik.ozellik;

                                // Veri özelliğine sahip checkbox'ı bulun ve işaretleyin
                                $("[data-ozellik='" + ozellikAdi + "']").prop("checked", true);
                            });
                        }

                        var resimDiv = $('#oncekiResimler');
                        resimDiv.empty(); // Önceki resimleri temizle

                        response.resimler.forEach(function (resim) {
                            // Her resim için bir div oluşturun
                            var imgDiv = $('<div class="col-3">').addClass('resim-container');

                            // Resmi gösteren bir img elementi oluşturun
                            var imgElement = $('<img>').attr('src', resim.resim_path);

                            // Silme butonunu oluşturun ve bir data attribute ekleyin
                            var silButtonDiv = $('<div> ').addClass('prperty-submit-button');
                            var silButton = $('<button type="button">').text('Sil').addClass('sil-button').data('resim-id', resim.id);

                            // Oluşturulan elementleri div içine ekleyin
                            imgDiv.append(imgElement);
                            imgDiv.append(silButtonDiv);
                            silButtonDiv.append(silButton);

                            // Div'i ana div'e ekleyin
                            resimDiv.append(imgDiv);
                        });
                    } else {
                        // Handle the case where no data is found
                        console.log('No data found');
                    }
                },
                error: function (error) {
                    console.log('Error fetching data: ' + error.responseText);
                }
            });
        }
    </script>