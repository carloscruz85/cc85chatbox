<?php

//Add the necessary scripts to show the media uploader:
add_action('admin_footer', function() {

    /*
    if possible try not to queue this all over the admin by adding your settings GET page val into next
    if( empty( $_GET['page'] ) || "my-settings-page" !== $_GET['page'] ) { return; }
    */

    $imageAux = array(
        "user_chat_bot",
        "chat_bot_image",
        "machine_avatar"
    );

    foreach ($imageAux as $key => $field) {
      ?>
      <script>
          jQuery(document).ready(function($){

              var custom_uploader
                , click_elem = jQuery('.cc85chatbot_upload_<?php echo $field ?>')
                , target = jQuery('.wrap input[name="cc85chatbot_options[<?php echo $field ?>]"]')

              click_elem.click(function(e) {
                  e.preventDefault();
                  //If the uploader object has already been created, reopen the dialog
                  if (custom_uploader) {
                      custom_uploader.open();
                      return;
                  }
                  //Extend the wp.media object
                  custom_uploader = wp.media.frames.file_frame = wp.media({
                      title: 'Choose Image',
                      button: {
                          text: 'Choose Image'
                      },
                      multiple: false
                  });
                  //When a file is selected, grab the URL and set it as the text field's value
                  custom_uploader.on('select', function() {
                      attachment = custom_uploader.state().get('selection').first().toJSON();
                      target.val(attachment.url);
                  });
                  //Open the uploader dialog
                  custom_uploader.open();
              });
          });
      </script>

      <?php
    }

    ?>




    <?php
    });

    //Embed the media uploader necessary scripts:
    add_action('admin_enqueue_scripts', function(){
    /*
    if possible try not to queue this all over the admin by adding your settings GET page val into next
    if( empty( $_GET['page'] ) || "my-settings-page" !== $_GET['page'] ) { return; }
    */
    wp_enqueue_media();
});
 ?>
