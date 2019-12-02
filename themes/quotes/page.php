<?php get_header(); ?>

<section id="about-content">

<?php if( have_posts() ) :
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>

    <div>
        <h2><?php the_title(); ?></h2>
        <main>
            <?php the_content(); ?>
        </main>
    </div>
    
    <!-- Loop ends -->
    <?php endwhile;?>

</section>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>