<?php get_header(); ?>

<?php if( have_posts() ) :?>

<section id="quotes-content">

<?php
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
        
    <div>

    <?php the_content(); ?>
    <h2>&mdash; <?php echo the_title();?>&comma;
        <a class="source" href="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>"><span><?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></span></a>
    </h2>

    </div>
    
    <!-- Loop ends -->
    <?php endwhile;?>

    </section>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>


<?php get_footer();?>