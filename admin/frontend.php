<?php
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

    #cc85-chatbox-container table{
      width: 100% !important;

    }

    #cc85-chatbox-container table tr td{
      width: auto !important;
      padding: 0;
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

    .fWjGvK{
      bottom: 5rem !important;
      right: 1rem !important;
    }

    .rsc-content{
      padding: 1rem;
    }

    .rsc-os-option-element{
      margin: 0 !important;
    }
    </style>
    <div id="cc85-chatbox-container"></div>
    <link rel="stylesheet" href="'.plugin_dir_url( __FILE__ ).'chat/static/css/main.bd76f6a3.chunk.css">

    <script src="'.plugin_dir_url( __FILE__ ).'chat/static/js/2.fc3638b0.chunk.js"></script>
    <script src="'.plugin_dir_url( __FILE__ ).'chat/static/js/main.d4c40001.chunk.js"></script>
    <script src="'.plugin_dir_url( __FILE__ ).'chat/static/js/runtime-main.f2fb2dad.js"></script>


    ';
}
