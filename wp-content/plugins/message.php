<?php

/*
  Plugin Name: PhanDong_Message
  Plugin URI: https://kenh14.vn/
  Description: Plugin tạo thông báo ở MENU
  Author: David Dong

 */

add_action('admin_menu', 'message_menu');

function message_menu() {
    add_menu_page(
            "Thông báo",
            "Thông báo",
            "manage_options",
            "management-Message",
            "setting_message",
            '',
            5
    );
}

function setting_message() {
    ?>
    <style>
        table, th, td {
            border:1px solid black;
            border-collapse: collapse;
        }

        td {
            color: red;
        }
        table {
            margin: 0 auto;
        }
    </style>

    <h1>Quản Lý Thông Báo</h1>

    <table boder="1">
        <tr>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Trạng thái</th>
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
            <td>Germany</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
            <td>Germany</td>
            <td>Germany</td>
        </tr>
    </table>


    <?php

}
