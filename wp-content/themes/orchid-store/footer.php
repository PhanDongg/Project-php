<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Orchid_Store
 */
?>
</div><!-- #content.site-title -->

<footer class="footer secondary-widget-area">
    <div class="footer-inner">
        <div class="footer-mask">
            <div class="__os-container__">
                <div class="footer-entry">
                    <?php
                    if (orchid_store_get_option('display_footer_widget_area') == true) {

                        $orchid_store_footer_widget_area_no = orchid_store_get_option('footer_widgets_area_columns');
                        ?>
                        <div class="footer-top columns-<?php echo esc_attr($orchid_store_footer_widget_area_no); ?>">
                            <div class="row">
                                <?php
                                if (!empty($orchid_store_footer_widget_area_no)) {

                                    for ($orchid_store_count = 1; $orchid_store_count <= $orchid_store_footer_widget_area_no; $orchid_store_count++) {
                                        $orchid_store_sidebar_id = 'footer-' . $orchid_store_count;
                                        ?>
                                        <div class="os-col column">
                                            <?php
                                            if (is_active_sidebar($orchid_store_sidebar_id)) {
                                                dynamic_sidebar($orchid_store_sidebar_id);
                                            }
                                            ?>
                                        </div><!-- .col -->
                                        <?php
                                    }
                                }
                                ?>
                            </div><!-- .row -->
                        </div><!-- .footer-top -->
                        <?php
                    }
                    ?>
                    <div class="footer-bottom">
                        <div class="os-row">
                            <div class="os-col copyrights-col">
                                <?php
                                /**
                                 * Hook - orchid_store_footer_left.
                                 *
                                 * @hooked orchid_store_footer_left_action - 10
                                 */
                                do_action('orchid_store_footer_left');
                                ?>
                            </div><!-- .os-col -->
                            <div class="os-col">
                                <?php
                                /**
                                 * Hook - orchid_store_footer_right.
                                 *
                                 * @hooked orchid_store_footer_right_action - 10
                                 */
                                do_action('orchid_store_footer_right');
                                ?>
                            </div><!-- .os-col -->
                        </div><!-- .os-row -->
                    </div><!-- .footer-bottom -->
                </div><!-- .footer-entry -->
            </div><!-- .__os-container__ -->
        </div><!-- .footer-mask -->
    </div><!-- .footer-inner -->

    <!-- Thong bao luu cookie tren trinh duyet -->
    <div id="cookieNotice" class="light display-right" style="display: none;">
        <div id="closeIcon" style="display: none;">
        </div>
        <!--<div class="titcoo">Lưu nội dung Cookie</div>-->
        <div class="boxcoo">
            <div class="ndcoo">
                <p> Thử nghiệm cookie </p>
                <div class="dongycoo">
                    <button class="cookok" onclick="acceptCookieConsent();">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Create cookie
        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

    // Delete cookie
        function deleteCookie(cname) {
            const d = new Date();
            d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=;" + expires + ";path=/";
        }

    // Read cookie
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

    // Set cookie consent
        function acceptCookieConsent() {
            deleteCookie('dong_cookie');
            setCookie('dong_cookie', 1, 30);
            document.getElementById("cookieNotice").style.display = "none";
        }
        let cookie_consent = getCookie("dong_cookie");
        if (cookie_consent != "") {
            document.getElementById("cookieNotice").style.display = "none";
        } else {
            document.getElementById("cookieNotice").style.display = "block";
        }
    </script>
    <style>
        #cookieNotice.light {
            background-color: #fff;
            color: #555;
            font-size:14px;
        }
        #cookieNotice.display-right {
            left: 600px;
            bottom: 250px;
            max-width: 395px;
        }
        #cookieNotice {
            position: fixed;
            padding: 100px;
            border-radius: 10px;
            z-index: 999997;
            box-shadow:1px 2px 10px #999;
            background-color: red !important;
            color: white !important;
        }
        button.cookok{
            background:#7F3EAE;
            padding:10px;
            width:100%;
            border:none;
            border-radius:10px;
            color:#fff;
            font-weight:bold;
            font-size:16px;
            box-shadow:1px 2px 5px #f1f1f1;
        }
        .ndcoo a{
            color:#2E56BA;
        }
        .titcoo{
            font-size:18px;
            font-weight:bold
        }
    </style>
    <!-- Thong bao luu cookie tren trinh duyet -->

</footer><!-- .footer -->

<?php
if (orchid_store_get_option('display_scroll_top_button') == true) {
    ?>
    <div class="orchid-backtotop"><span><i class="bx bx-chevron-up"></i></span></div>
                <?php
            }
            ?>

</div><!-- .__os-page-wrap__ -->

<?php wp_footer(); ?>

</body>
</html>
