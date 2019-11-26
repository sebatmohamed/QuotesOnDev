<?php get_header(); ?>

<?php if( have_posts() ) :?>

<section id="submit-quote">

<?php
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
    
    <div>
        <?php the_content(); ?>
    </div>
    
    <!-- Loop ends -->
    <?php endwhile;?>

    </section>


    <form>
        <input id="quote-title" type="text"/>
    </form>
        
    <section>
        <button id="submit-button">Submit a Quote</button>
    </section>


<?php else : ?>
        <p>No posts found</p>
<?php endif;?>


<?php get_footer();?>