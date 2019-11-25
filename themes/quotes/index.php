<?php get_header(); ?>

<?php if( have_posts() ) :?>

<section id="quotes-content">

<?php
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
    
    <?php the_content(); ?>
    <h2><?php the_title(); ?></h2>

    
    <!-- Loop ends -->
    <?php endwhile;?>

    <section>
        <button id="quote-button">Generate New Quote</button>
    </section>


<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

</section>

<?php get_footer();?>