<?php
/**
 * Genesis Sample.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Homepage
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Removes the entry header markup and page title.
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

// Forces full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Removes the breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_before_content', 'movies_slider' );
function movies_slider(){
   //displaying
   $args = array(
  'post_type'   => 'movies',
  'post_status' => 'publish',
  'tax_query'   => array(
      array(
         'taxonomy' => 'Genre',
         'field' => 'slug',
         'terms' => 'action',
      )
   )
   );
   
   $movie_tittle = new WP_Query( $args );
   if( $movie_tittle->have_posts() ) :
            ?>
            
   <section class="hero-bg">
      <div class="wrapper hero-slider">
         <?php  while( $movie_tittle->have_posts() ) :$movie_tittle->the_post(); ?>
         <div class="card">
            <?php the_post_thumbnail() ?>
            <div class="card-content">
               <div class="movie-genres">
                  <a href="#">
                     <span class="genre-0"> </span>
                  </a>
                  <a href="#">
                     <span class="genre-1">adventure</span>
                  </a>
                  <a href="#">
                     <span class="genre-0">acio</span>
                  </a> 
               </div>
               <?php echo get_post_meta( get_the_ID(), 'trailer', true ); ?>
               <h6><?php the_title() ?></h6>
            </div>
         </div>
         <?php endwhile; ?>
      </div>
   </section>
<?php
   wp_reset_postdata();
   else :
      esc_html_e( 'No movie_tittle in the diving taxonomy!', 'text-domain' );
   endif;
}
// Runs the Genesis loop.
wp_reset_query();
add_action( 'genesis_before_content', 'movies_slider_premiere' );

function movies_slider_premiere(){
   ?>
   <section class="premiere-section">
      <div class="wrapper">
         <div class="main-container">
         <div class="slider slider-main">
            <div>
               <?php 
               $args = array(
               'post_type'   => 'movies',
               'post_status' => 'publish',);
   
               $movie_tittle = new WP_Query( $args );
               if( $movie_tittle->have_posts() ) :
                  while( $movie_tittle->have_posts() ) :$movie_tittle->the_post();
                  //Get id iframe by url youtube
                  $data = get_post_meta( get_the_ID(), 'trailer', true );  
                  $get_id_youtube = substr($data, strpos($data, "=") + 1);    
               ?>
               <iframe width="100%" height="436" src="https://www.youtube.com/embed/<?php echo $get_id_youtube; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               <?php
                  endwhile; 
               wp_reset_postdata();
               else :
                  esc_html_e( 'No movie_tittle in the diving taxonomy!', 'text-domain' );
               endif;
                  ?>
            </div>
         </div>
      </div>
      <div class="nav-container">
         <div class="slider-nav">
            <div class="vt-it">
               <a href="#">
                  <img src="http://img.youtube.com/vi/8hYlB38asDY/0.jpg">
               </a>
               <span>Iron - Man - Trailer [HD] </span>
            </div>
            <div class="vt-it">
               <a href="#">
                  <img src="http://img.youtube.com/vi/10FEq8KO5M0/0.jpg">
               </a>
            </div>
            <div class="vt-it">
               <a href="#">
                  <img src="http://img.youtube.com/vi/BoohRoVA9WQ/0.jpg">
               </a>
            </div>
            <div class="vt-it">
               <a href="#">
                  <img src="http://img.youtube.com/vi/uHBnrJowBZE/0.jpg">
               </a>
            </div>
            <div class="vt-it">
               <a href="#">
                  <img src="http://img.youtube.com/vi/uHBnrJowBZE/0.jpg">
               </a>
            </div>
            <div class="vt-it">
               <a href="#">
                  <img src="http://img.youtube.com/vi/uHBnrJowBZE/0.jpg">
               </a>
            </div>
         </div>
      </div>
      </div>
   </section>
<?php
   
}
// Runs the Genesis loop.
wp_reset_query();

genesis();