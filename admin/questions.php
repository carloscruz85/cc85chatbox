<?php
// post type
function add_questions_post_type() {
  $args = array(
    'public' => true,
    'label'  => 'Preguntas',
    'labels' => array('add_new' => 'Crear Nueva pregunta'),
    'description'        => __( 'Description.', 'Pregunta' ),
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor'),
    'menu_icon'          => 'dashicons-tag',

  );
  register_post_type( 'questions', $args );
}

add_action( 'init', 'add_questions_post_type' );

//tax

add_action( 'init', 'create_question_tax' );

function create_question_tax() {
  register_taxonomy(
    'question_tax',
    array('questions'),
    array(
      'show_in_nav_menus' => true,
      'label' => __( 'Categorías' ),
      // 'rewrite' => array('slug'=>'discover'),
      'hierarchical' => true,
      'show_admin_column' =>true
    )
  );
}
?>
