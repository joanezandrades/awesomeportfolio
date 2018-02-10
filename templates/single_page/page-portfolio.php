<?php

   // Meta    
    $subtitle = get_post_meta($post->ID, 'subtitle_id', true);

    $argsSection = array(
        'post_type'     => 'secoes',
        'paginas'       => 'portfolio'
    );

    $getSection = get_posts( $argsSection );

    if( $getSection ) : 
        foreach( $getSection as $post ) : 
?>
<div class="section-wrap container_one">
    <header class="header-section-secondary">
        <h2 class="title" title="<?php the_title(); ?>"><?php the_title(); ?></h2>
        <h1 class="subtitle"><?php echo get_post_meta( $post->ID, 'cb_subtitle_id', true ); ?></h1>
    </header> <!-- /End header section -->

    <?php
            endforeach;
        endif;
    ?>
    <div class="slider-container">
        
        
        <div class="portfolio-wrap">
            
            <?php

                $args = array(
                    'post_type'     => 'portfolio',
                    'numberposts'   => 3
                );

                $getPortfolio = get_posts( $args );

                if( $getPortfolio ) : 
                    foreach( $getPortfolio as $post ) :

            ?>

            <article class="portfolio-item">
                <?php the_post_thumbnail('awp-pic-portfolio') ?>


                <div class="mask">
                    <h3 class="title" title="<?= the_title(); ?>"><?php the_title(); ?></h3>

                    <div class="wrap-tags">
                        <?php the_tags(); ?>
                    </div>

                    <a class="btn-medium link" href="<?php echo get_post_meta( $post->ID, 'cb_link_id', true ); ?>" target="_blank"><i class="fa fa-link"></i></a>
                </div>
                
            </article>


            <?php
                    endforeach;
                endif;
            ?>

        </div>
        <!-- Botões de controle dos sliders -->
        <ul class="slider-nav nav-portfolio">
            <?php
            if( $getPortfolio > 1 ) :
                foreach( $getPortfolio as $post ) :
            ?>

            <li class="slide-button"></li>

            <?php
                endforeach;
            endif;
            ?>
        </ul>
    </div>
</div> <!-- /End section Portfólio -->