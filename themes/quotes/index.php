<?php get_header(); ?>

<?php if( have_posts() ) :?>

<section id="quotes-content">

<?php
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
    
    <i class="fas fa-quote-left"></i>
    
    <div>

    <?php the_content(); ?>
    <h2><?php echo the_title();?>
        <?php foreach ( get_the_category() as $category ):?> 
            <span><?php echo $category->name;?></span>
        <?php endforeach;?>
    </h2>

    </div>
    
    <i class="fas fa-quote-right"></i>

    <!-- Loop ends -->
    <?php endwhile;?>

</section>

    <button id="quote-button">Show Me Another!</button>


<?php else : ?>
        <p>No posts found</p>
<?php endif;?>


<?php get_footer();?>