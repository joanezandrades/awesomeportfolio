<?php

    // Meta

    $subtitle = get_post_meta($post->ID, 'cb_subtitle_id', true);


    $argSection = array(
        'post_type'     => 'secoes',
        'paginas'       => 'servicos'
    );

    $getSection = get_posts( $argSection );
    
    if( $getSection ) :
        foreach( $getSection as $post ) :
?>

<div class="section-wrap container_one">
    <header class="header-section-primary">
        <h2 class="title" title="<?= get_post_meta($post->ID, 'cb_subtitle_id', true); ?>"><?= get_post_meta($post->ID, 'cb_subtitle_id', true); ?></h2>
    </header> 


<?php
        endforeach;
    endif;
?> <!-- /End header section -->
    <div class="container-slider">
        
        <div class="services-wrap slider-services">
            <?php


                $args = array(
                    'post_type'     => 'servicos',
                    'numberposts'   => 6
                );

                $getServices = get_posts( $args );

                if( $getServices ) :
                    foreach( $getServices as $post ) : 
            ?>           
            
            <article class="service-item">
                
                <div class="wrap">
                    <?php the_post_thumbnail('awp-icon'); ?>

                    <h4 class="title-service" title="<?= the_title(); ?>"><?= the_title(); ?></h4>
                </div>
                

                <div class="excerpt">
                    <?= the_excerpt(); ?>
                </div>

            </article>

            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>

    <!-- Botões de controle dos sliders -->
    <ul class="slider-nav nav-servicos">
        <?php
        if( $getServices > 1 ) :
            foreach( $getServices as $post ) :
        ?>

        <li class="slide-button"></li>

        <?php
            endforeach;
        endif;
        ?>
    </ul>
</div> <!-- /End section -->