<!-- ARCHIVES JS -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/mmenu.js"></script>
<script src="js/aos.js"></script>
<script src="js/aos2.js"></script>
<script src="js/nice-select.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/slick.js"></script>
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
<script src="js/forms-2.js"></script>
<script src="js/range.js"></script>
<script src="js/color-switcher.js"></script>
<script>
    $(window).on('scroll load', function () {
        $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
    });

</script>

<!-- Slider Revolution scripts -->
<script src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

<script>
    $('.home5-right-slider').owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        nav: true,
        rtl: false,
        autoplayHoverPause: false,
        autoplay: false,
        singleItem: true,
        smartSpeed: 1200,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480: {
                items: 1,
                center: false
            },
            520: {
                items: 2,
                center: false
            },
            600: {
                items: 2,
                center: false
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 5
            },
            1366: {
                items: 5
            },
            1400: {
                items: 5
            }
        }
    });

</script>

<script>
    $(".dropdown-filter").on('click', function () {

        $(".explore__form-checkbox-list").toggleClass("filter-block");

    });

</script>

<!-- MAIN JS -->
<script src="js/script.js"></script>