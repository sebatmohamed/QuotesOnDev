<?php get_header(); ?>

<?php if( have_posts() ) :?>

<section id="quotes-content">

<?php
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
    
    <i class="fas fa-quote-right"></i>
    <?php the_content(); ?>
    <h2><?php the_title(); ?></h2>
    <i class="fas fa-quote-left"></i>

    
    <!-- Loop ends -->
    <?php endwhile;?>

    </section>

    <button id="quote-button">Generate New Quote</button>


<?php else : ?>
        <p>No posts found</p>
<?php endif;?>


<?php get_footer();?>