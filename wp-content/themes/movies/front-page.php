<?php
/**
 * Theme customizations
 *
 * @package      Movies
 * @author       Alex Avz
 * @copyright    Copyright (c) 2018, Alex Avz
 * @license      GPL-2.0+
 */
add_action( 'genesis_before_entry_content', 'slider_slick' );
function slider_slick() {
    ?>
<section class="section-blog">
    <h3 class="text-center pb-5">Latest Blog Posts</h3>
    <div class="blog-post">
        <div class="blog">
            <img class="" src="images/hulk.jpg" alt="blog">
            <div class="content-blog">
                <h5 class="">Sed Ut Perspiciatis</h5>
                <p class="">Lorem ipsum dolor sit amet, dolor quam tempor, nulla eu enim aliquam odio sed.
                </p>
            </div>
        </div>
        <div class="blog">
            <img class="" src="images/hulk.jpg" alt="blog">
            <div class="content-blog">
                <h5 class="">Sed Ut Perspiciatis</h5>
                <p class="">Lorem ipsum dolor sit amet, dolor quam tempor, nulla eu enim aliquam odio sed.
                </p>
            </div>
        </div>
        <div class="blog">
            <img class="" src="images/hulk.jpg" alt="blog">
            <div class="content-blog">
                <h5 class="">Sed Ut Perspiciatis</h5>
                <p class="">Lorem ipsum dolor sit amet, dolor quam tempor, nulla eu enim aliquam odio sed.
                </p>
            </div>
        </div>
        <div class="blog">
            <img class="" src="images/hulk.jpg" alt="blog">
            <div class="content-blog">
                <h5 class="">Sed Ut Perspiciatis</h5>
                <p class="">Lorem ipsum dolor sit amet, dolor quam tempor, nulla eu enim aliquam odio sed.
                </p>
            </div>
        </div>
        <div class="blog">
            <img class="" src="images/hulk.jpg" alt="blog">
            <div class="content-blog">
                <h5 class="">Sed Ut Perspiciatis</h5>
                <p class="">Lorem ipsum dolor sit amet, dolor quam tempor, nulla eu enim aliquam odio sed.
                </p>
            </div>
        </div>
    </div>
    </div>
</section>
<?php 
}
genesis();

?>