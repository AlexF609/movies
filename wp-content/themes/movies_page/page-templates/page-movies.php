<?php
/*
Template Name: Movies
Template Post Type: movies, page
*/

add_action( 'genesis_before_content', 'movie_all_data' );
function movie_all_data(){
   
   ?>
<div class="wrapper movies-page">
   <div class="content-left">
      <?php the_post_thumbnail() ?>

   </div>
   <div class="content-right">
      <?php 
      
      echo '<h4> Genres : <span>'; 
      echo get_the_term_list( $post->ID, 'Genre', '<ul class="list-movies"><li> ', '  </li> , <li> ', '</li></ul>' );
      echo '</span></h4>';

      echo '<h4>Premiere : <span>'; 
      $timestamp = get_post_meta(get_the_ID(), 'premiere', true);
      $date = new DateTime();
      if( empty($timestamp) ) : 
      else:
         $date->setTimestamp($timestamp);
         echo $date->format('d-m-Y');
      endif;
      echo '</span></h4>';

      echo '<h4> Run Time : <span>'; 
      echo get_post_meta(get_the_ID(), 'run_time', true);
      echo '</span></h4>';

      echo '<h4> Director : <span>'; 
      echo get_post_meta(get_the_ID(), 'director', true);
      echo '</span></h4>';

      echo '<h4> Languages : <span>'; 
      echo get_the_term_list( $post->ID, 'Language', '<ul class="list-movies"><li>', '</li> , <li>', '</li></ul>' );
      echo '</span></h4>';
         ?>
         
   </div>
</div>
<?php

}
/*------------------------------------  remove entry footer  */
add_filter( 'genesis_entry_footer', 'remove_entry_footer', 2 );
function remove_entry_footer() {
if ( is_front_page() )
    return;
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

}
add_action("genesis_after_entry_content", "video_trailers");
function video_trailers(){
   ?>
      <h3>Trailers</h3>
   <div class="content-iframes">
               <?php
            $rows = get_field('trailers');
            if($rows)
            {
               foreach($rows as $row)
               {
                  $my_url = $row['trailer_url'];
                  $id_youtube = substr($my_url, strrpos($my_url, '/' )+1);
                  ?>
                     <iframe width="32%" height="200" src="https://www.youtube.com/embed/<?php echo $id_youtube;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <?php 
               }
            }
               ?>
         </div>
   <?php
}
remove_filter( 'genesis_before_post_content', 'genesis_post_info' );
genesis();