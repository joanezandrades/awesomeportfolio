
<div class="slider-inner">
    
    <?php

        $argsBlog = array(
            'post_type'     => 'blog',
            'categorias'    => 'destaque',
            'post_status'   => 'publish',
            'numberposts'   => 2
        );

        $argsProdutos = array(
            'post_type'         => 'produtos',
            'categorias'        => 'destaque',
            'post_status'       => 'publish',
            'numberposts'       => 2
        );

        $blogDestaques = get_posts($argsBlog);

        $produtosDestaques = get_posts($argsProdutos);
        
        $allPosts = array_merge( $blogDestaques, $produtosDestaques );

        if($blogDestaques):
            foreach($blogDestaques as $post): 
                setup_postdata($post);
    ?>
        <div class="post-wrap slide">        
             <?php the_post_thumbnail('awp-full');?> 

            <article class="post-content-blog container_one">

                <span class="date-post"><?php the_date() ?></span>

                <h1 class="title" title="<?php the_title(); ?>"><?php the_title(); ?></h1>
                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div>

                <div class="container-tags">
                    <!-- Adicionar tags - v2.1 -->
                </div>
                
                <ul class="social-share">
                    <li class="social-item">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a>
                    </li>
                    <li class="social-item">
                       <a href="<?= the_permalink() ?>" class="container-share">
                            <i class="icon fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="social-item">
                        
                            <i class="icon fa fa-envelope"></i>
                        </a>
                    </li> 
                </ul> <!-- /End social-share -->

            </article> <!-- /.End Post blog -->
        </div>
    <?php
            endforeach;
        endif; // Fim do Blog destaque
        
        if( $produtosDestaques ) :
            foreach( $produtosDestaques as $post ) :
    ?>


        <div class="post-wrap cover-produto slide">         
            
            <article class="post-content-produto container_one">
                <?php the_post_thumbnail('awp-full');?>

                <div class="wrap-infos">
                    <h3 class="title" title="<?= the_title(); ?>"><?= the_title(); ?></h3>
                    <div class="excerpt">
                        <?= the_excerpt() ?>
                    </div>

                    <a class="btn-link" href="<?= the_permalink(); ?>">Comprar</a>
                </div>
                
            </article> <!-- /.End Post blog -->
        </div>
    <?php
            endforeach;
        endif;

    ?>
</div>
<!-- Botões de controle dos sliders -->
<ul class="slider-nav nav-home">
    <?php
    if( $allPosts > 1 ) :
        foreach( $allPosts as $post ) :
    ?>

    <li class="slide-button"></li>

    <?php
        endforeach;
    endif;
    ?>
</ul>

<!-- Botão Scroll Down  -->
<a class="scroll-down" href="#servicos">
    <span class="">Explore</span>
    <i class="fa fa-angle-down bounce-down"></i>
</a>