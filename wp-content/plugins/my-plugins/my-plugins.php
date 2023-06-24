<?php
/*
  plugin Name: phandong-plugin
  Plugin URI: https://shopping.test
  Decreption: cookie, call-phone, list table...
 */

//TÍNH NĂNG COOKIE

add_action('wp_footer', 'phandong_cookie');

function phandong_cookie() {
    ?>

    <?php include __DIR__ . '/views/cookie-footer.php'; ?>

    <style> <?php include __DIR__ . '/scripts/css/cookie.css'; ?> </style>

    <script> <?php include __DIR__ . '/scripts/js/cookie.js'; ?> </script>

    <?php
}

//TÍNH NĂNG NÚT GỌI
add_action("admin_menu", "phandong_show_setting_page");

function phandong_show_setting_page() {
    add_menu_page(
            "Nút Gọi",
            "Nút Gọi",
            "manage_options",
            "nut-goi",
            "phandong_setting_page",
            '',
            5
    );
}
//cài đặt cho page show
function phandong_setting_page() {

    if (isset($_POST["so_dien_thoai"])) {
        update_option("so_dien_thoai", $_POST["so_dien_thoai"]);
    }
    $so_dien_thoai = get_option("so_dien_thoai");
    ?>
    <h2>CẤU HÌNH NÚT GỌI</h2>
    <form method="POST">
        <input type="text" name="so_dien_thoai" value="<?php echo $so_dien_thoai ?>"/>
        <input type="submit" value="save"/>   
    </form>
    <?php
}

add_action("wp_footer", "phandong_nut_goi");

function phandong_nut_goi() {
    $so_dien_thoai = get_option("so_dien_thoai");
    ?>
    <?php include __DIR__ . '/views/call-phone.php'; ?>

    <style> <?php include __DIR__ . '/scripts/css/call-phone.css'; ?> </style>

    <?php
}

//LIST TABLE
add_action("admin_menu", "wpl_Out_list_table_menu");

function wpl_Out_list_table_menu() {

    add_menu_page("Quản Lí Thông Báo", "Quản Lí Thông Báo", "manage_options", "owt-list-table", "wpl_owt_list_table_fn");
}

function wpl_owt_list_table_fn() {

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";

    if ($action == "owt-edit") {

        $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : "";
        
        ob_start();

        include_once plugin_dir_path(__FILE__) . 'views/owt-edit-fn.php';

        $template = ob_get_contents();

        ob_end_clean();
        echo $template;
    } else {

        ob_start();

        include_once plugin_dir_path(__FILE__) . '/views/owt-table-list.php';

        $template = ob_get_contents();

        ob_end_clean();
        echo $template;
    }
}
