<?php
/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * custom option and settings
 */
function cc85chatbot_settings_init() {
    // Register a new setting for "cc85chatbot" page.
    register_setting( 'cc85chatbot', 'cc85chatbot_options' );

    add_settings_section(
        'cc85chatbot_color_section',
        __( 'Colors', 'cc85chatbot' ),
        'cc85chatbot_section_description_callback',
        'cc85chatbot'
    );

    //preview
    add_settings_section(
        'cc85chatbot_preview_section',
        __( 'Preview', 'cc85chatbot' ),
        'cc85chatbot_section_preview_description_callback',
        'cc85chatbot'
    );
    //preview

    add_settings_field(
        'bg_header_color', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Header', 'cc85chatbot' ),
        'color_section_callback',
        'cc85chatbot',
        'cc85chatbot_color_section',
        array(
            'label_for'         => 'bg_header_color',
            'class'             => 'cc85chatbot_row_bg_header',
            'cc85chatbot_custom_data' => 'custom_bg_header',
        )
    );

    add_settings_field(
        'bot_chat_color', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Bot bubble answer', 'cc85chatbot' ),
        'color_section_callback',
        'cc85chatbot',
        'cc85chatbot_color_section',
        array(
            'label_for'         => 'bot_chat_color',
            'class'             => 'bot_chat_color',
            'cc85chatbot_custom_data' => 'bot_chat_color',
        )
    );

    add_settings_field(
        'user_chat_color', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'User bubble answer', 'cc85chatbot' ),
        'color_section_callback',
        'cc85chatbot',
        'cc85chatbot_color_section',
        array(
            'label_for'         => 'user_chat_color',
            'class'             => 'user_chat_color',
            'cc85chatbot_custom_data' => 'user_chat_color',
        )
    );

    add_settings_field(
        'bg_chat_color', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Chat background color', 'cc85chatbot' ),
        'color_section_callback',
        'cc85chatbot',
        'cc85chatbot_color_section',
        array(
            'label_for'         => 'bg_chat_color',
            'class'             => 'bg_chat_color',
            'cc85chatbot_custom_data' => 'bg_chat_color',
        )
    );

    add_settings_field(
        'user_chat_bot', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'User Avatar', 'cc85chatbot' ),
        'img_chat_bot_callback',
        'cc85chatbot',
        'cc85chatbot_color_section',
        array(
            'label_for'         => 'user_chat_bot',
            'class'             => 'user_chat_bot',
            'cc85chatbot_custom_data' => 'user_chat_bot',
        )
    );

    add_settings_field(
        'chat_bot_image', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Chat icon', 'cc85chatbot' ),
        'img_chat_bot_callback',
        'cc85chatbot',
        'cc85chatbot_color_section',
        array(
            'label_for'         => 'chat_bot_image',
            'class'             => 'chat_bot_image',
            'cc85chatbot_custom_data' => 'chat_bot_image',
        )
    );

    add_settings_field(
        'machine_avatar', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Bot icon', 'cc85chatbot' ),
        'img_chat_bot_callback',
        'cc85chatbot',
        'cc85chatbot_color_section',
        array(
            'label_for'         => 'machine_avatar',
            'class'             => 'machine_avatar',
            'cc85chatbot_custom_data' => 'machine_avatar',
        )
    );




}


/**
 * Register our cc85chatbot_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'cc85chatbot_settings_init' );


/**
 * Custom option and settings:
 *  - callback functions
 */


/**
 * Developers section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function cc85chatbot_section_developers_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'cc85chatbot' ); ?></p>
    <?php
}

function cc85chatbot_section_description_callback($args){
  ?>
    <strong>Type the HEX color, <span style="color: red">do not include the # symbol</span> </strong>
  <?php
}

function cc85chatbot_section_preview_description_callback($args){
  $options = get_option( 'cc85chatbot_options' );
  ?>
  <style>
    .bubble{
      display: flex;
      flex-direction: row;
      align-items: center;
      padding: 10px;
      border-radius: 25px;
      color: white;
      margin: 5px 0;
      /* justify-content: flex-end; */
    }



    .bubble:nth-child(even) {

      justify-content: flex-end;
    }
    .bubble span{
      margin: 0 0.5rem;
    }

    .bubble img{
      width: 25px;
      height: auto;
      background-color: #dedede;
      border-radius: : 50%;
    }

  </style>
  <div class="" style="background-color:#fff; width: 300px; height: 400px; border-radius: 20px; overflow: hidden;">
    <div style="background-color: #<?php echo $options['bg_header_color'] ?>; width: 295px; height: 50px; padding: 5px 0 0 5px;">
      <img src="<?php echo $options['chat_bot_image'] ?>" alt="chat icon" width="40px" height="auto" />
    </div>

    <div style="height: 300px; width: 290px; background-color: #<?php echo $options['bg_chat_color'] ?>; padding: 5px;">
        <div style=" background-color: #<?php echo $options['bot_chat_color'] ?>;  " class="bubble">

            <img src="<?php echo $options['machine_avatar'] ?>" alt="Bot icon" /> <span>Hi Human!</span>

        </div>
        <div style=" background-color: #<?php echo $options['user_chat_color'] ?>;  " class="bubble">

            <span>Hi Bot!</span> <img src="<?php echo $options['user_chat_bot'] ?>" alt="Bot icon" />

        </div>
    </div>
  </div>


  <?php
}


function color_section_callback($args){
      $options = get_option( 'cc85chatbot_options' );

  ?>
  <input
    id="<?php echo esc_attr( $args['label_for'] ); ?>"
    type="text"
    data-custom="<?php echo esc_attr( $args['cc85chatbot_custom_data'] ); ?>"
    name="cc85chatbot_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    value="<?php echo esc_attr($options[ $args['label_for'] ]) ?>"
    style="width: 90%; color: black; padding: 0.5rem;"
    >

  <?php
}


function img_chat_bot_callback($args){
      $options = get_option( 'cc85chatbot_options' );

  ?>
    <img src="<?php echo esc_attr($options[ $args['label_for'] ]) ?>" alt="<?php echo esc_attr( $args['label_for'] ); ?>" width="50px" height="auto"><br />
    <input type="hidden"
    data-custom="<?php echo esc_attr( $args['cc85chatbot_custom_data'] ); ?>"
    name="cc85chatbot_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    value="<?php echo esc_attr($options[ $args['label_for'] ]) ?>"

     />
    <button class="button cc85chatbot_upload_<?php echo esc_attr( $args['label_for'] ); ?>">Upload</button>

  <?php
}

/**
 * Add the top level menu page.
 */
function cc85chatbot_options_page() {
    add_menu_page(
        'Chatbot Settings',
        'Chatbot settings',
        'manage_options',
        'chatbot-settings',
        'chatbot_settings_functions',
        'dashicons-admin-generic'
    );
}


/**
 * Register our cc85chatbot_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'cc85chatbot_options_page' );

/**
 * Top level menu callback function
 */
function chatbot_settings_functions() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'cc85chatbot_messages', 'cc85chatbot_message', __( 'Settings Saved', 'cc85chatbot' ), 'updated' );
    }

    // show error/update messages
    settings_errors( 'cc85chatbot_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "cc85chatbot"
            settings_fields( 'cc85chatbot' );
            // settings_fields( 'cc85chatbot_header_color' );
            // output setting sections and their fields
            // (sections are registered for "cc85chatbot", each field is registered to a specific section)
            do_settings_sections( 'cc85chatbot' );
            // output save settings button
            submit_button( 'Save' );
            ?>
        </form>
    </div>
    <?php
}

// api rest custom settings
add_action( 'rest_api_init', function () {
   register_rest_route( 'ccruz85/v2', '/cc85chatbot/',
     array(
       'methods' => 'GET',
       'callback' => 'custom_cc85chatbox_setings'
     )
   );
  });

  function custom_cc85chatbox_setings($d){
    $options = get_option( 'cc85chatbot_options' );
    return $options;
  }

?>
