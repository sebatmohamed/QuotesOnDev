<?php get_header(); ?>

<div class="search-grid">

<section class="search-results">

<h5>Search results for:</h5>

<hr>

<?php if( have_posts() ) :
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
    
    <div>
        <h2><?php echo the_title();?></h2>
        <?php the_content(); ?>
        <br/>
    </div>
    <!-- Loop ends -->
    <?php endwhile;?>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

<section class="search-button">
    <p>1</p>
    <p>2</p>
    <p>Next  <i class="fas fa-long-arrow-alt-right"></i></p>
</section>


</section>

</div>

<?php get_footer();?>