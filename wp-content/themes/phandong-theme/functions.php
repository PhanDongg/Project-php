<?php

//phần tiêu đề
function followandrew_theme_support() {
    //add dymatic title tag support//này nó nằm trong general setting/tagline
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');//này chạy nó sẽ tạo 1 chỗ Featured image trong post
}

add_action( 'after_setup_theme',  'followandrew_theme_support' );

//phần menu Sidebar
function followandrew_menus() {
    
    $location = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
        
    );
    register_nav_menus($location);
}

add_action( 'init', 'followandrew_menus');

function followandrew_resgiter_style() {

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('followandrew-style', get_template_directory_uri() . "/style.css", array(), '1.0', 'all');
    wp_enqueue_style('followandrew-boostrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('followandrew-frontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'followandrew_resgiter_style');

function followandrew_resgiter_scripts() {

    wp_enqueue_script('followandrew-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('followandrew-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '3.4.1', true);
    wp_enqueue_script('followandrew-boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '3.4.1', true);
    wp_enqueue_script('followandrew-main', get_template_directory_uri() . "/assets/js/main.js", array(), '3.4.1', true);
}

add_action('wp_enqueue_scripts', 'followandrew_resgiter_scripts');


//này để hiển thị cái tiêu đề của trang phía trên(như contact us, about page)
//sidebar trái
function followandrew_widget_areas() {
    
    register_sidebar(
            array(
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
                'after_widget' => '</ul>',
                'name' => 'Sidebar Area',
                'id' => 'sidebar-1',
                'description' => 'Sidebar Widget Area'
            )
    );
    
        register_sidebar(
            array(
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
                'after_widget' => '</ul>',
                'name' => 'Footer Area',
                'id' => 'footer-1',
                'description' => 'Footer Widget Area'
            )
    );
        
}

add_action( 'widgets_init', 'followandrew_widget_areas');
?>
