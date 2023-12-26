</div>
</div>
</section>
<!-- END SECTION USER PROFILE -->

<div class="second-footer ad mt-3">
    <div class="">
        <div class="col-12 row" style="margin: auto;">
            <div class="col-3" style="max-width: 280px;width: 280px;"></div>
            <div class="col-9 row">
                <div class="col-9"> <p>2023 © Copyright - Tüm Hakları Saklıdır.</p></div>
                <div class="col-3" style="text-align: right"><p>Sevgi ile <i aria-hidden="true" class="fa fa-heart"></i> Kodlandı</p></div>
            </div>
        </div>

    </div>
</div>

<!-- START PRELOADER -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
<!-- END PRELOADER -->

<!-- region -->
<!-- ARCHIVES JS -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/mmenu.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/slick2.js"></script>
<script src="js/fitvids.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/smooth-scroll.min.js"></script>
<script src="js/lightcase.js"></script>
<script src="js/search.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/ajaxchimp.min.js"></script>
<script src="js/newsletter.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/searched.js"></script>
<script src="js/dashbord-mobile-menu.js"></script>
<script src="js/forms-2.js"></script>
<script src="js/color-switcher.js"></script>
<script src="js/dropzone.js"></script>

<!-- MAIN JS -->
<!-- endregion -->

<script src="js/script.js"></script>

<script>
    $(".header-user-name").on("click", function () {
        $(".header-user-menu ul").toggleClass("hu-menu-vis");
        $(this).toggleClass("hu-menu-visdec");
    });

</script>

</div>
<!-- Wrapper / End -->
</body>

</html>
<script>
    // Sayfa yüklendiğinde çalışacak kod
    // navbarın active işaretlenmesi için
    $(document).ready(function () {
        // Mevcut sayfanın URL'ini al
        var currentPageUrl = window.location.href;

        // Menü öğelerini dön
        $('#myDropdown li a').each(function () {
            // Her menü öğesinin URL'sini al
            var menuPageUrl = $(this).attr('href');

            // Mevcut sayfanın URL'si ile menü öğesinin URL'si eşleşiyorsa
            if (currentPageUrl.includes(menuPageUrl)) {
                // Active class'ını ekle
                $(this).addClass('active');
            }
        });

        // Menü öğelerini dön
        $('#userMiniNav li a').each(function () {
            // Her menü öğesinin URL'sini al
            var menuPageUrlMiniNav = $(this).attr('href');

            // Mevcut sayfanın URL'si ile menü öğesinin URL'si eşleşiyorsa
            if (currentPageUrl.includes(menuPageUrlMiniNav)) {
                // Active class'ını ekle
                $(this).addClass('active');
            }
        });
    });
</script>