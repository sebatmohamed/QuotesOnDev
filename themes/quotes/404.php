<?php get_header(); ?>

<section class="error-page">

<i class="fas fa-quote-left"></i>

<div class="error-content">
<h1>Oops!</h1>
<p>It looks like nothing was found at this location. Maybe try a search?</p>
</div>

<i class="fas fa-quote-right"></i>

<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>

</section>


<?php get_footer();?>