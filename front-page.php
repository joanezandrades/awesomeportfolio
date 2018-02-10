<?php
/**
 * Awesome Portfolio front-page.
 *
 * @package Awesome Portfolio
 */

get_header();

// Sections path
$sct_home           = '/templates/single_page/page-home';
$sct_servicos       = '/templates/single_page/page-servicos';
$sct_portfolio      = '/templates/single_page/page-portfolio';
$sct_loja           = '/templates/single_page/page-loja';
$sct_blog           = '/templates/single_page/page-blog';
$sct_contato        = '/templates/single_page/page-contato';
?>

<section id="homepage" class="bg-parallax" data-speed="100">

    <?php 
        // Chama para page_home.php 
        get_template_part( $sct_home, home );
    ?>

</section> <!-- /.end homepage -->

<section id="servicos" class="bg-parallax" data-speed="100">
    <?php 
        // Chama para page_home.php 
        get_template_part( $sct_servicos, servicos );
    ?>
</section> <!-- /.end servicos -->

<section id="portfolio" class="bg-parallax" data-speed="100">
    <?php
        // Chamada page-portfolio.php
        get_template_part( $sct_portfolio, portfolio );
    ?>
</section> <!-- /.end portfolio -->

<section id="contato" class="bg-parallax" data-speed="100">
    <?php 
        // chamada page-contato.php
        get_template_part( $sct_contato, contato );
    ?>
</section>

<?php get_footer(); ?>