<?php

/* 
    Plugin Name: Demo Meta Box
    Plugin Author: PhanDong
    Description: Thu su dung Meta Box
 */

function phandong_meta_box() {
    add_meta_box( 'thong-tin', 'Thử nghiệm meta box ở đây', 'phandong_thongtin_output', 'post' );
}

add_action('add_meta_boxes', 'phandong_meta_box');

function phandong_thongtin_output($post) {
    
    $link_download = get_post_meta( $post->ID, '_link_download', true );
    wp_nonce_field('save_thongtin', 'thongtin_nonce');
    
    //tạo trường link download
    echo( '<label for ="link_download">Link download: </label>' );
    echo( '<input type="text" id="link_download" name="link_download" value="'.$link_download.'"/>' );
    
}

function phandong_thongtin_save( $post_id) {
    
    $thongtin_nonce = $_POST['thongtin_nonce'];
    if( !isset( $thongtin_nonce ) ) {
        return;
    }
    if( !wp_verify_nonce( $thongtin_nonce, 'save_thongtin' ) ) {
        return;
    }
    
    $link_download = sanitize_text_field($_POST['link_download']);
    update_post_meta( $post_id, '_link_download', $link_download );
}

add_action('save_post', 'phandong_thongtin_save');

//form bảo mật
//tạo ra 1 đoạn mã sau khi sửa dữ liệu, thông qua nonce