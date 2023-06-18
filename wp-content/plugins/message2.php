<?php
/*
  Plugin Name: WP_List_Table Class Example2
  Plugin URI: https://www.sitepoint.com/using-wp_list_table-to-create-wordpress-admin-tables/
 */

//chèn file của wordpress vào
if (!class_exists('WP_List_Table')) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

//tạo class con kế thừa class cha
class TableDemo_List extends WP_List_Table {

    /** Class constructor */
    public function __construct() {

        parent::__construct([
            'singular' => __('TableDemo', 'sp'), //singular name of the listed records//số ít
            'plural' => __('TableDemos', 'sp'), //plural name of the listed records//số nhiều
            'ajax' => false //does this table support ajax?
        ]);
    }

    /**
     * Retrieve customers data from the database
     *
     * @param int $per_page//giới hạn SQL
     * @param int $page_number//số trang
     *
     * @return mixed
     */
    //lấy data từ db
    public static function get_TableDemo($per_page = 5, $page_number = 1) {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}TableDemo";

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }

        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;

        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }

    //delete record từ db
    public static function delete_TableDemo($id) {
        global $wpdb;

        $wpdb->delete(
                "{$wpdb->prefix}TableDemo",
                ['ID' => $id],
                ['%d']
        );
    }

    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    //trả về số lượng bản ghi trong db
    public static function record_count() {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}TableDemo";

        return $wpdb->get_var($sql);
    }

    /** Text displayed when no customer data is available */
    public function no_items() {
        _e('No TableDemo avaliable.', 'sp');
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    //CHWUA HIỂU TÁC DỤNG NÓ
    function column_cb($item) {
        return sprintf(
                '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['ID']
        );
    }

    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    //tên cột chưa hiểu lắm
    function column_name($item) {

        $delete_nonce = wp_create_nonce('sp_delete_customer');

        $title = '<strong>' . $item['name'] . '</strong>';

        $actions = [
            'delete' => sprintf('<a href="?page=%s&action=%s&TableDemo=%s&_wpnonce=%s">Delete</a>', esc_attr($_REQUEST['page']), 'delete', absint($item['ID']), $delete_nonce)
        ];

        return $title . $this->row_actions($actions);
    }

    /**
     *  Associative array of columns//kết hợp mảng của các cột
     *
     * @return array
     */
    function get_columns() {
        $columns = [
//            'cb' => '<input type="checkbox" />',
            'Tiêu đề' => __('TIÊU ĐỀ', 'sp'),
            'Nội dung' => __('NỘI DUNG', 'sp'),
            'Ngày bắt đầu' => __('NGÀY BẮT ĐẦU', 'sp'),
            'Ngày kết thúc' => __('NGÀY KẾT THÚC', 'sp'),
            'Trạng thái' => __('TRẠNG THÁI', 'sp')
        ];

        return $columns;
    }

    /**
     * Columns to make sortable.//các cột để sắp xếp
     *
     * @return array
     */
    public function get_sortable_columns() {
        $sortable_columns = array(
            'Tiêu đề' => array('Tiêu đề', true),
            'Nội dung' => array('Nội dung', false),
            'Ngày bắt đầu' => array('Ngày bắt đầu', true),
            'Ngày kết thúc' => array('Ngày kết thúc', true),
            'Trạng thái' => array('Trạng thái', true)
        );

        return $sortable_columns;
    }

    /**
     * Returns an associative array containing the bulk action//Trả về một mảng kết hợp chứa hành động hàng loạt
     *
     * @return array
     */
    public function get_bulk_actions() {
        $actions = [
            'bulk-delete' => 'Delete'
        ];

        return $actions;
    }

    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

        $this->_column_headers = $this->get_column_info();

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page = $this->get_items_per_page('customers_per_page', 5);
        $current_page = $this->get_pagenum();
        $total_items = self::record_count();

        $this->set_pagination_args([
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page' => $per_page //WE have to determine how many items to show on a page
        ]);

        $this->items = self::get_customers($per_page, $current_page);
    }

    public function process_bulk_action() {

        //Detect when a bulk action is being triggered...
        if ('delete' === $this->current_action()) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr($_REQUEST['_wpnonce']);

            if (!wp_verify_nonce($nonce, 'sp_delete_customer')) {
                die('Go get a life script kiddies');
            } else {
                self::delete_TableDemo(absint($_GET['TableDemo']));

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url
                wp_redirect(esc_url_raw(add_query_arg()));
                exit;
            }
        }

        // If the delete bulk action is triggered
        if (( isset($_POST['action']) && $_POST['action'] == 'bulk-delete' ) || ( isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete' )
        ) {

            $delete_ids = esc_sql($_POST['bulk-delete']);

            // loop over the array of record IDs and delete them
            foreach ($delete_ids as $id) {
                self::delete_TableDemo($id);
            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            wp_redirect(esc_url_raw(add_query_arg()));
            exit;
        }
    }

}

//xây dựng trang cài đặt
class SP_Plugin {

    // class instance
    static $instance;
    // customer WP_List_Table object
    public $customers_obj;

    // class constructor
    public function __construct() {
        add_filter('set_screen_option', [__CLASS__, 'set_screen'], 10, 3);
        add_action('admin_menu', [$this, 'plugin_menu']);
    }

    public static function set_screen($status, $option, $value) {
        return $value;
    }

    public function plugin_menu() {

        $hook = add_menu_page(
                'Sitepoint WP_List_Table Example',
                'SP WP_List_Table',
                'manage_options',
                'wp_list_table_class',
                [$this, 'plugin_settings_page']
        );

        add_action("load-$hook", [$this, 'screen_option']);
    }

    /**
     * Plugin settings page
     */
    public function plugin_settings_page() {
        ?>
        <div class="wrap">
            <h2>Quản Lí Thông Báo</h2>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
        <?php
        $this->customers_obj->prepare_items();
        $this->customers_obj->display();
        ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
        <?php
    }

    /**
     * Screen options
     */
    public function screen_option() {

        $option = 'per_page';
        $args = [
            'label' => 'TableDemo',
            'default' => 5,
            'option' => 'customers_per_page'
        ];

        add_screen_option($option, $args);

        $this->customers_obj = new TableDemo_List();
    }

    /** Singleton instance */
    public static function get_instance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}

//hook action để móc
add_action('plugins_loaded', function () {
    SP_Plugin::get_instance();
});
