<?php
/**
* Awesome Portfolio single-servicos.
*
* @package Awesome Portfolio
*/
get_header();
?>

<?php
    if( have_posts() ) :
        while( have_posts() ) : 
            the_post();
?>
<article class"">
    <?php the_post_thumbnail(); ?>
    <h1 class="title-primary" title="<?= the_title(); ?>"><?= the_title(); ?></h1>

    <div class""><?php the_content(); ?></div>
    <div class""><?php the_excerpt(); ?></div>
</article> <!-- /End serviço -->

<?php 
        endwhile; 
    endif;
?>

<?php 
    get_footer();
?>