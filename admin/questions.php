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
      'label' => __( 'Categorías de preguntas' ),
      // 'rewrite' => array('slug'=>'discover'),
      'hierarchical' => true,
      'show_admin_column' =>true
    )
  );
}

//api

add_action( 'rest_api_init', function () {
   register_rest_route( 'ccruz85/v2', '/questions/',
     array(
       'methods' => 'GET',
       'callback' => 'questions_constructor'
     )
   );
  });

  function questions_constructor($d){




  //init data
  	$data = array(
      array(
        "id"      => '1',
        "message" => 'Bienvenido',
        "trigger" => '2',
      )
  	);

//get the terms
  $cats = array();
  $terms = get_terms( 'question_tax', array(
    'hide_empty' => false,
) );

$i = 3;

$questions = array();
$answers = array();
$contQuestions = 0;
foreach ($terms as $key => $value) {
  //set options
  array_push( $cats,
  array(
    'value' => $key + 1,
    'label' => $value->name,
    'trigger' => "".$i++.""
  )
 );

 //set groups of questions
 $args = array (
   'post_type'     => 'questions',
   'posts_per_page'    => -1,
   'tax_query' => array(
   'relation' => 'AND',
     array(
     'taxonomy' => 'question_tax',
     'field' => 'term_id',
     'terms' => array(  $value->term_id ),
     'include_children' => true,
     'operator' => 'IN'
     )
   )
 );

$tempValue = 1;

 $the_query = new WP_Query( $args );
 if ( $the_query->have_posts() ) :
 while ( $the_query->have_posts() ) : $the_query->the_post();
   $id = get_the_ID();
   $post = get_post($id);

   if (!array_key_exists($value->term_id, $questions)) {
     $questions[$value->term_id] = array();
   }

   array_push($questions[$value->term_id],
   array(
     'value'    => $tempValue++,
     'message'  => get_the_title(),
     'trigger'  => "".(sizeof($terms) + 3 + $contQuestions++).""
   ));

   array_push( $answers, wpautop( $post->post_content ) );




 endwhile;
 endif;

}

//add end option
array_push( $cats,
array(
  'value' => 0,
  'label' => "Eso es todo, muchas gracias",
  'trigger' => "end"
)
 );

array_push($data, array(
        "id"      => '2',
        "options" => $cats,
      ));



$i = 3;
  //option by tax
  foreach ($questions as $key => $value) {
    array_push(
      $data,
      array(
        'id'      => "".$i++."",
        'options' => $value
      )
    );
  }

  //answers

  foreach ($answers as $key => $value) {
    array_push($data,
      array(
        'id'      => "".(sizeof($terms) + $key + 3)."",
        'message' => $value,
        'trigger'     => "2"
      )
    );
  }

  array_push(
    $data,
    array(
      'id' => "final",
      "message" => "Que tengas un buen día",
      "end" => true
    )
  );

	return $data;
}
?>
