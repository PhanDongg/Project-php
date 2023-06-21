<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Orchid_Store
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php
        if (function_exists('wp_body_open')) {
            wp_body_open();
        }
        ?>
        <!--    <button type="button" class="btn">demo button</button>
            <button>demo button2</button>
            <button>demo button3</button>-->
        <div id="page" class="site __os-page-wrap__">

            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'orchid-store'); ?></a>

            <?php
            /**
             * Hook - orchid_store_header.
             *
             * @hooked orchid_store_header_action - 10
             */
            do_action('orchid_store_header');
            ?>

            <div id="content" class="site-content">

                <script>

//thiết lập cookie 
//                    function setCookie(cname, cvalue, exdays) {
//                        var d = new Date();
//                        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//                        var expires = "expires=" + d.toUTCString();
//                        document.cookie = cname + "=" + cvalue + "; " + expires;
//                    }
////call với tham số đặt vào
//                    setCookie('dongdong', 'abc', 1);
////Kiểm tra xem có tồn tại cookie có tên là cookie_popup hay không.
////Nếu không tồn tại cookie cookie_popup (trả về giá trị undefined) thì cho hiện Pop-Up và tạo cookie cookie_popup có giá trị là true.
////Nếu đã có cookie cookie_popup thì cho qua vì Pop-Up mặc định là ẩn đi.
//                    var cookie_popup = (function () {
//                        if ($.cookie('dong_cookie_popup') == undefined) {
//                            $('.alignnone').fadeIn(600);
//                            $.cookie('dong_cookie_popup', true, {expires: 30});
//                        };
////Khi Pop-Up xuất hiện click vào close popup sẽ ẩn Pop-Up đi.
//                        $('.spu-close').click(function (e) {
//                            e.preventDefault();
//                            $('.alignnone').fadeOut(600);
//                        });
//                    });
////đặt time 10s khi vào web thì popup mới load
//                    setTimeout(function () {
//                        cookie_popup();
//                    }, 10000);

                </script>
    <!--            <script>
    //                $(document).ready(function() {
    //                $(".btn").click(function() {
    //                $('button').css('background', 'black');
    //                $('button').css('background', 'pink');
    //                 });
    //                });
    //            </script>-->