<?php

/* 
    Plugin Name: Shortcode Tutorial
    Plugin Author: PhanDong
 */

add_shortcode('shortcode1', 'create_shortcode1');

//chèn đơn giản
//function create_shortcode1() {
//    echo "hello shortcode";
//}

//chèn html
//function create_shortcode1() {
//    return "<div class='abc'>noi dung trong div</div>";
//}

//chèn theo kiểu có tham số
//function create_shortcode1($ts) {
//    //cách viết 1
////    $tong = $ts['thamso1'] + $ts['thamso2'];
//    
//    //cách viết 2
//    extract($ts);
//    $tong = $thamso1 + $thamso2;
//    return $tong;
//}

//nếu ko có giá trị thì sẽ nhận giá trị mặc định
//function create_shortcode1($ts) {
//    extract( shortcode_atts(array(
//        'thamso1' => '600',
//        'thamso2' => '300'
//    ), $ts));
//            $tong = $thamso1 + $thamso2;
//    return $tong;
//}

//ví dụ chèn mã nhứng trên youtobe
add_shortcode('youtobe_video', 'create_youtobe_video');
function create_youtobe_video($ts) {
    extract( shortcode_atts(array(
        'width' => '900',
        'hight' => '900',
        'id' => '3HGvrZTw2I8'
    ), $ts));
    return '<iframe width=".$width." height=".$hight." src="https://www.youtube.com/embed/'.$id.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
}
