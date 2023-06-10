<?php
/*
  Plugin Name: PhanDong
  Plugin URI: https://kenh14.vn/
  Description: Plugin tạo nút gọi
  Author: David Dong
  Version: 1.0
  Author URI: facebook.com/phan.dong.144
 */
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

//
function phandong_setting_page() {
    
    if(isset( $_POST["so_dien_thoai"] ) ) {
        update_option("so_dien_thoai", $_POST["so_dien_thoai"]);
    }
    $so_dien_thoai = get_option("so_dien_thoai");
    
    ?>
<h2>cấu hình nút gọi</h2>
<form method="POST">
    <input type="text" name="so_dien_thoai" value="<?php echo  $so_dien_thoai ?>"/>
    <input type="submit" value="save"/>   
</form>
    <?php
}

add_action("wp_footer", "phandong_nut_goi");

function phandong_nut_goi() {
    $so_dien_thoai = get_option("so_dien_thoai");
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <a id="alo-phoneIcon" href="https://mbongda88.vip/" data-toggle="modal" data-target="#callme-modal" class="alo-phone alo-green alo-show">
        <div class="alo-ph-circle"></div>
        <div class="alo-ph-circle-fill"></div>
        <div class="alo-ph-img-circle"><i class="fa fa-phone"></i></div>
        <span class="alo-ph-text"> <?php echo $so_dien_thoai; ?> </span>
    </a>
    <style>
        .alo-phone {
            background-color: transparent;
            cursor: pointer;
            height: 130px;
            position: fixed;
            left: -20px;
            bottom: -20px;
            -webkit-transition: visibility 0.5s ease 0s;
            transition: visibility 0.5s ease 0s;
            visibility: hidden;
            width: 150px;
            z-index: 20;
        }
        .alo-phone.alo-show {
            visibility: visible;
        }
        .fadeOutRight {
            -webkit-animation-name: fadeOutRight;
            animation-name: fadeOutRight;
        }
        .alo-phone.alo-static {
            opacity: 0.6;
        }
        .alo-phone.alo-hover,
        .alo-phone:hover {
            opacity: 1;
        }
        .alo-phone.alo-hover .alo-ph-text,
        .alo-phone:hover .alo-ph-text {
            background-color: #141414;
        }
        .alo-ph-circle {
            -webkit-animation: 1.2s ease-in-out 0s normal none infinite running
                alo-circle-anim;
            animation: 1.2s ease-in-out 0s normal none infinite running alo-circle-anim;
            background-color: transparent;
            border: 2px solid rgba(30, 30, 30, 0.4);
            border-radius: 100%;
            height: 100px;
            left: 30px;
            opacity: 0.1;
            position: absolute;
            top: -10px;
            -webkit-transform-origin: 50% 50% 0;
            transform-origin: 50% 50% 0;
            -webkit-transition: all 0.5s ease 0s;
            transition: all 0.5s ease 0s;
            width: 100px;
        }
        .alo-phone.alo-active .alo-ph-circle {
            -webkit-animation: 1.1s ease-in-out 0s normal none infinite running
                alo-circle-anim !important;
            animation: 1.1s ease-in-out 0s normal none infinite running alo-circle-anim !important;
        }
        .alo-phone.alo-static .alo-ph-circle {
            -webkit-animation: 2.2s ease-in-out 0s normal none infinite running
                alo-circle-anim !important;
            animation: 2.2s ease-in-out 0s normal none infinite running alo-circle-anim !important;
        }
        .alo-phone.alo-hover .alo-ph-circle,
        .alo-phone:hover .alo-ph-circle {
            border-color: #cd3121;
            opacity: 0.5;
        }
        .alo-phone.alo-green.alo-hover .alo-ph-circle,
        .alo-phone.alo-green:hover .alo-ph-circle {
            border-color: #141414;
            opacity: 0.5;
        }
        .alo-phone.alo-green .alo-ph-circle {
            border-color: #d71149;
            opacity: 0.5;
        }
        .alo-phone.alo-gray.alo-hover .alo-ph-circle,
        .alo-phone.alo-gray:hover .alo-ph-circle {
            border-color: #ccc;
            opacity: 0.5;
        }
        .alo-phone.alo-gray .alo-ph-circle {
            border-color: #141414;
            opacity: 0.5;
        }
        .alo-ph-circle-fill {
            -webkit-animation: 2.3s ease-in-out 0s normal none infinite running
                alo-circle-fill-anim;
            animation: 2.3s ease-in-out 0s normal none infinite running
                alo-circle-fill-anim;
            background-color: #000;
            border: 2px solid transparent;
            border-radius: 100%;
            height: 70px;
            left: 45px;
            opacity: 0.1;
            position: absolute;
            top: 4px;
            -webkit-transform-origin: 50% 50% 0;
            transform-origin: 50% 50% 0;
            -webkit-transition: all 0.5s ease 0s;
            transition: all 0.5s ease 0s;
            width: 70px;
        }
        .alo-phone.alo-active .alo-ph-circle-fill {
            -webkit-animation: 1.7s ease-in-out 0s normal none infinite running
                alo-circle-fill-anim !important;
            animation: 1.7s ease-in-out 0s normal none infinite running
                alo-circle-fill-anim !important;
        }
        .alo-phone.alo-static .alo-ph-circle-fill {
            -webkit-animation: 2.3s ease-in-out 0s normal none infinite running
                alo-circle-fill-anim !important;
            animation: 2.3s ease-in-out 0s normal none infinite running
                alo-circle-fill-anim !important;
            opacity: 0 !important;
        }
        .alo-phone.alo-hover .alo-ph-circle-fill,
        .alo-phone:hover .alo-ph-circle-fill {
            background-color: rgba(233, 59, 53, 0.5);
            opacity: 0.75 !important;
        }
        .alo-phone.alo-green.alo-hover .alo-ph-circle-fill,
        .alo-phone.alo-green:hover .alo-ph-circle-fill {
            background-color: rgba(0, 0, 8, 0.5);
            opacity: 0.75 !important;
        }
        .alo-phone.alo-green .alo-ph-circle-fill {
            background-color: rgba(233, 59, 53, 0.5);
            opacity: 0.75 !important;
        }
        .alo-phone.alo-gray.alo-hover .alo-ph-circle-fill,
        .alo-phone.alo-gray:hover .alo-ph-circle-fill {
            background-color: rgba(20, 20, 20, 0.5);
            opacity: 0.75 !important;
        }
        .alo-phone.alo-gray .alo-ph-circle-fill {
            background-color: rgba(0, 0, 8, 0.5);
            opacity: 0.75 !important;
        }
        .alo-ph-img-circle {
            -webkit-animation: 1s ease-in-out 0s normal none infinite running
                alo-circle-img-anim;
            animation: 1s ease-in-out 0s normal none infinite running alo-circle-img-anim;
            border: 2px solid transparent;
            color: #fff;
            font-size: 25px;
            line-height: 40px;
            text-align: center;
            border-radius: 100%;
            height: 40px;
            left: 60px;
            opacity: 0.7;
            position: absolute;
            top: 020px;
            -webkit-transform-origin: 50% 50% 0;
            transform-origin: 50% 50% 0;
            width: 40px;
        }
        .alo-ph-text {
            background-color: #d2243d;
            color: #fff;
            border-radius: 4px;
            padding: 10px 10px;
            bottom: 30px;
            display: block;
            font-size: 0.875rem;
            margin-right: -300px;
            position: absolute;
            left: 20%;
            text-align: center;
            text-transform: uppercase;
            width: 100px;
            font-size: 20px;
            margin-bottom: 30px;
            margin-left: 100px;
        }
        .alo-phone.alo-active .alo-ph-img-circle {
            -webkit-animation: 1s ease-in-out 0s normal none infinite running
                alo-circle-img-anim !important;
            animation: 1s ease-in-out 0s normal none infinite running alo-circle-img-anim !important;
        }
        .alo-phone.alo-static .alo-ph-img-circle {
            -webkit-animation: 0s ease-in-out 0s normal none infinite running
                alo-circle-img-anim !important;
            animation: 0s ease-in-out 0s normal none infinite running alo-circle-img-anim !important;
        }
        .alo-phone.alo-hover .alo-ph-img-circle,
        .alo-phone:hover .alo-ph-img-circle {
            background-color: #cd3121;
        }
        .alo-phone.alo-green.alo-hover .alo-ph-img-circle,
        .alo-phone.alo-green:hover .alo-ph-img-circle {
            background-color: #141414;
        }
        .alo-phone.alo-green .alo-ph-img-circle {
            background-color: green;
        }
        .alo-phone.alo-gray.alo-hover .alo-ph-img-circle,
        .alo-phone.alo-gray:hover .alo-ph-img-circle {
            background-color: #ccc;
        }
        .alo-phone.alo-gray .alo-ph-img-circle {
            background-color: #141414;
        }
        .bg-eee {
            padding-bottom: 20px;
            margin-bottom: 20px;
            font-size: 15px;
        }
        .bg-eee .row {
            margin: 0px;
            background: #f5f5f5;
        }
        .bg-eee .row:last-child {
            padding-bottom: 30px;
        }
        .bg-eee .title {
            background: #46be8a;
            color: #fff;
            margin: 0px -15px 15px -15px;
            padding: 15px 15px;
        }
        .panel-title i {
            margin-right: 10px;
        }
        .panel-body {
            font-size: 15px;
            line-height: 25px;
        }
        @-webkit-keyframes "alo-circle-anim" {
            0% {
                opacity: 0.1;
                -webkit-transform: rotate(0deg) scale(0.5) skew(1deg);
                transform: rotate(0deg) scale(0.5) skew(1deg);
            }
            30% {
                opacity: 0.5;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            100% {
                opacity: 0.6;
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
        @keyframes "alo-circle-anim" {
            0% {
                opacity: 0.1;
                -webkit-transform: rotate(0deg) scale(0.5) skew(1deg);
                transform: rotate(0deg) scale(0.5) skew(1deg);
            }
            30% {
                opacity: 0.5;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            100% {
                opacity: 0.6;
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
        @-webkit-keyframes "alo-circle-fill-anim" {
            0% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            50% {
                opacity: 0.2;
            }
            100% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
        }
        @keyframes "alo-circle-fill-anim" {
            0% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            50% {
                opacity: 0.2;
            }
            100% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
        }
        @-webkit-keyframes "alo-circle-img-anim" {
            0% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            10% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
        @keyframes "alo-circle-img-anim" {
            0% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            10% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
        @keyframes "fadeInRight" {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(100%, 0px, 0px);
                transform: translate3d(100%, 0px, 0px);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
        @keyframes "fadeInRight" {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(100%, 0px, 0px);
                transform: translate3d(100%, 0px, 0px);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
        @keyframes "fadeOutRight" {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                -webkit-transform: translate3d(100%, 0px, 0px);
                transform: translate3d(100%, 0px, 0px);
            }
        }
        @keyframes "fadeOutRight" {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                -webkit-transform: translate3d(100%, 0px, 0px);
                transform: translate3d(100%, 0px, 0px);
            }
        }
        @keyframes "alo-circle-anim" {
            0% {
                opacity: 0.1;
                -webkit-transform: rotate(0deg) scale(0.5) skew(1deg);
                transform: rotate(0deg) scale(0.5) skew(1deg);
            }
            30% {
                opacity: 0.5;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            100% {
                opacity: 0.1;
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
        @keyframes "alo-circle-anim" {
            0% {
                opacity: 0.1;
                -webkit-transform: rotate(0deg) scale(0.5) skew(1deg);
                transform: rotate(0deg) scale(0.5) skew(1deg);
            }
            30% {
                opacity: 0.5;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            100% {
                opacity: 0.1;
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
        @keyframes "alo-circle-fill-anim" {
            0% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            50% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
        }
        @keyframes "alo-circle-fill-anim" {
            0% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            50% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                opacity: 0.2;
                -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
        }
        @keyframes "alo-circle-img-anim" {
            0% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            10% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
        @keyframes "alo-circle-img-anim" {
            0% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            10% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                -webkit-transform: rotate(0deg) scale(1) skew(1deg);
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }

    </style>

    <?php
}