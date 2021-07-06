<?php
/*
Plugin Name: cc85 Chatbox
Plugin URI: https://github.com/carloscruz85/cc85chatbox
Description: chatbox made with react
Version: 1.0.0
Author: Carlos Cruz
Author URI: https://github.com/carloscruz85/cc85chatbox
License: GPLv2 or later
Text Domain: cc85
*/

include('admin/questions.php');

//adding code to footer
add_action('wp_footer', 'cc85_code_footer');
function cc85_code_footer() {
    echo '
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&amp;display=swap" rel="stylesheet">
    <style>
    #cc85-chatbox-container{
    position: fixed;
    bottom: 0;
    right:1rem;
    z-index: 9999;
    }

    button.eDBgHl {
    white-space: normal !important;
    }

    .dBweJU {
    background: none !important;
    transform: scale(3);
    box-shadow: none;
    }

    .rsc-ts-image{
      width: 40px;
      height: 40px;
    }
    </style>
    <div id="cc85-chatbox-container"></div>
    <link rel="stylesheet" href="'.plugin_dir_url( __FILE__ ).'chat/static/css/main.742db70e.chunk.css">

    <script src="'.plugin_dir_url( __FILE__ ).'chat/static/js/2.ed1c6cbc.chunk.js"></script>
    <script src="'.plugin_dir_url( __FILE__ ).'chat/static/js/main.4cce1cad.chunk.js"></script>
    <script src="'.plugin_dir_url( __FILE__ ).'chat/static/js/runtime-main.f2fb2dad.js"></script>


    ';
}
