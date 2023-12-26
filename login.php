<?php include_once "header.php";

if (isset($_SESSION['user_data'])) {
    // Oturum yoksa giriş sayfasına yönlendir
    header('Location: index.php');
    exit();
}
?>

<body class="inner-pages hd-white">
<!-- Wrapper -->
<div id="wrapper">
<?php include_once "header_nav.php"; ?>

        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Login</h1>
                    <h2><a href="index.php">Home </a> &nbsp;/&nbsp; login</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION LOGIN -->
        <div id="login">
            <div class="login">
                <form>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                    <button type="submit" class="mt-5 btn_1 rounded full-width">Giriş Yap</button>
                </form>
            </div>
        </div>
        <!-- END SECTION LOGIN -->

       <?php include_once "footer.php"; ?>

    <script>
        $(document).ready(function () {
            // Form submit eventini yakala
            $('form').submit(function (e) {
                e.preventDefault(); // Formun normal submit işlemlerini engelle

                // Formdan alınan bilgileri al
                var email = $('#email').val();
                var password = $('#password').val();

                // AJAX isteği ile PHP API'ye bilgileri gönder
                $.ajax({
                    type: 'POST',
                    url: './php/giris-yap.php', // API'nin yolunu düzeltin
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Giriş başarılıysa kullanıcı bilgilerini alabilirsiniz
                            var username = response.data.username;

                            window.location.href = "./index.php";
                        } else {
                            // Giriş başarısızsa hata mesajını kullanıcıya gösterebilirsiniz
                            alert('Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
                        }
                    },
                    error: function (error) {
                        console.log('Error:', error.responseText);
                    }
                });
            });
        });

    </script>
