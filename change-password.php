<?php include "ortak/header.php"; ?>

<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">

        <?php include "ortak/navbars.php"; ?>

                    <div class="col-lg-7 col-md-6 col-xs-6 pl-3 offset-lg-1 offset-md-3" style="    height: 83vh;">
                        <div class="my-address">
                            <h3 class="heading pt-0">Şifre Değiştir</h3>
                            <form id="passwordForm">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group name">
                                            <label>Current Password</label>
                                            <input type="password" name="current-password" class="form-control" placeholder="Eski Sifre">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group email">
                                            <label>New Password</label>
                                            <input type="password" name="new-password" class="form-control" placeholder="Yeni Sifre">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="form-group subject">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="confirm-new-password" class="form-control" placeholder="Yeni Sifre Tekrar">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn mt-2">
                                            <button type="submit" class="btn btn-common">Güncelle</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        <?php include "ortak/footer.php"; ?>
        <script>
            $(document).ready(function () {
                // Form submit event listener
                $("#passwordForm").submit(function (e) {
                    e.preventDefault(); // Formun normal submit işlemini engelle

                    // Form verilerini al
                    var formData = $(this).serialize();

                    // AJAX isteği
                    $.ajax({
                        type: 'POST',
                        url: './php/sifre-guncelle.php', // PHP dosyasının yolunu belirtin
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                            // İstek başarılıysa burada işlemleri gerçekleştirin
                            console.log(response);

                            if (response.success) {
                                // Başarılı işlem
                                alert(response.message);
                            } else {
                                // Hata durumu
                                alert(response.message);
                            }
                        },
                        error: function (error) {
                            // İstek hatası durumunda burada işlemleri gerçekleştirin
                            console.log('Error: ' + error.responseText);
                        }
                    });
                });
            });

        </script>