<?php

include "ortak/header.php"; ?>

<body class="maxw1600 m0a dashboard-bd">
<!-- Wrapper -->
<div class="int_main_wraapper mt-10" id="wrapper">

    <?php include "ortak/navbars.php"; ?>

    <div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-3 mt-0 offset-lg-1 offset-md-3">

                    <div class="widget-boxed-header">
                        <h4>Profil Detay</h4>
                    </div>
                    <div class="sidebar-widget author-widget2">
                        <div class="author-box clearfix">
                            <img alt="author-image" class="author__img" src="images/1.png">
                            <h4 class="author__title" id="adSoyadBilgisi">Ad Soyad</h4>
                            <p class="author__meta">Yönetici Kullanıcı</p>
                        </div>
                        <ul class="author__contact">
                            <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span><span
                                    id="adresBilgisi">[Adres]</span></li>
                            <li><span class="la la-phone"><i aria-hidden="true" class="fa fa-phone"></i></span><a
                                    href="#" id="telefonBilgisi">[Telefon]</a></li>
                            <li><span class="la la-envelope-o"><i aria-hidden="true"
                                                                  class="fa fa-envelope"></i></span><a href="#"
                                                                                                       id="ePostaBilgisi">[Email]</a>
                            </li>
                        </ul>
                        <div class="agent-contact-form-sidebar">
                            <h4>Bilgileri Güncelle</h4>
                            <form id="contact_form" name="contact_form">
                                <input id="AdSoyad" name="AdSoyad" placeholder="Ad Soyad" required="" type="text">
                                <input id="Telefon" maxlength="20" name="Telefon" placeholder="Telefon Numarasi"
                                       required="" type="text">
                                <input id="EPosta" name="EPosta" placeholder="Email Adresi" required="" type="email">
                                <textarea id="Adres" name="Adres" placeholder="Adres" required=""></textarea>
                                <input name="update" type="hidden">
                                <input class="multiple-send-message" onclick="submitForm();" type="button"
                                       value="Bilgileri Güncelle">
                            </form>
                        </div>
                    </div>
                </div>

<?php include "ortak/footer.php"; ?>

<script>
    $(document).ready(function () {
        bilgileriGetir();
    });

    function bilgileriGetir() {
        $.ajax({
            type: 'POST',
            url: './php/yoneticibilgiler.php',
            data: {listele: true}, // Send the 'listele' parameter to indicate fetching data
            dataType: 'json', // Assuming your API returns JSON
            success: function (response) {
                if (response.success) {
                    // Populate form fields with existing data
                    $('#AdSoyad').val(response.data.AdSoyad);
                    $('#adSoyadBilgisi').html(response.data.AdSoyad);
                    $('#navbarAdSoyad').html(response.data.AdSoyad);
                    $('#Telefon').val(response.data.Telefon);
                    $('#telefonBilgisi').html(response.data.Telefon);
                    $('#EPosta').val(response.data.EPosta);
                    $('#ePostaBilgisi').html(response.data.EPosta);
                    $('#Adres').val(response.data.Adres);
                    $('#adresBilgisi').html(response.data.Adres);
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

    function submitForm() {
        var formData = $("#contact_form").serialize();

        $.ajax({
            type: "POST",
            url: "./php/yoneticibilgiler.php",
            data: formData,
            success: function (response) {
                alert(response); // Başarılı mesajı alert ile göster
                bilgileriGetir();
                // Burada başka bir işlem yapabilir veya yönlendirme yapabilirsiniz.
            },
            error: function (error) {
                alert("Hata oluştu: " + error);
            }
        });
    }

</script>
