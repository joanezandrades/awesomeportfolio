<?php
/**
* Awesome Portfolio single-produtos.
*
* @package Awesome Portfolio
*/
get_header();

?>

<?php
    if( have_posts() ) : 
        while ( have_posts() ) : 
            the_post(); 
?>
<main id="post-produto">
    <header class="header-post cover">
        <div class="container_one">
            <?php
                the_post_thumbnail('awp-cover');
            ?>

            <div class="wrapper-right">
                <h1 class="title-product" title="<?= the_title(); ?>"><?= the_title(); ?></h1>
        
                <ul class="desc-list">
                    <li class="desc-item">
                        <i class="icon fa fa-sliders"></i>
                        <span class="title-big">Versão: <?= get_post_meta( $post->ID, 'cb_meta_version', true ); ?></span>
                    </li>
                   
                    <li class="desc-item">
                        <i class="icon fa fa-money"></i>
                        <span class="title-big">R$ <?= get_post_meta( $post->ID, 'cb_meta_price', true ); ?></span>
                        <span class="pag">Em 5x sem juros no cartão!</span>
                    </li>

                    <li class="desc-item">
                        <i class="icon fa fa-tags"></i>
                        <?= get_the_term_list( $post->ID, 'tags' ); ?>
                    </li>
                             
                </ul> <!-- /End meta information -->

                <a class="btn-big" href="#comocomprar" target="">Comprar</a>

                <ul class="social-share">
                    <li class="social-item">
                        <i class="icon fa fa-twitter"></i>
                    </li>
                    <li class="social-item">
                        <i class="icon fa fa-facebook"></i>
                    </li>
                    <li class="social-item">
                        <i class="icon fa fa-instagram"></i>
                    </li> 
                </ul> <!-- /End social-share -->
            </div>

            <div class="btn-more-container">
                <span class="title">Detalhes do produto</span>
                <i class="icon fa fa-chevron-down"></i>
            </div>
        </div>
            
        
    </header> <!-- /End header-produto  -->

    <section class="post-body container_one">

        <div class="wrapper-excerpt">
            <?= the_excerpt(); ?>
        </div>

        <div class="wrapper-content">
            <div class="wrap-infos">
                <h3>Informações</h3>
                <ul class="desc-list">
                    <li class="desc-item">
                        <i class="icon fa fa-sliders"></i>
                        <span class="title-big"><?= $metaVersao ?>Versão: 2.0</span>
                    </li>
                   
                    <li class="desc-item">
                        <i class="icon fa fa-money"></i>
                        <span class="title-big"><?= $metaPreco ?>R$ 1280,00</span>
                        <span class="pag">Em 5x sem juros no cartão!</span>
                    </li>

                    <li class="desc-item">
                        <i class="icon fa fa-tags"></i>
                        <?php $metaTags ?>  
                    </li>
                             
                </ul> <!-- /End meta information -->
                <a class="btn-big" href="#comocomprar" target="">Comprar</a>
            </div>
            <?php 
                the_content();
            ?>
        </div>

    </section>

<?php
        endwhile;
    endif;
?>

    <section id="como-comprar" class="">
        <div class="wrapper-section container_one">
            <h2 class="title-section">Comprar é simples, fácil e seguro!</h3>
            <p class="text">Após clicar em "comprar", no botão abaixo da caixa, você será enviado para o pagamento via <a href="#">Hotmart</a>.</p>
            <p class="text">Lá você realiza os seguintes passos:</p>
            
            <ul class="wrap-explanation">
                <li class="exp-item">
                    <span class="mini-square">1</span>
                    <p>Clique em comprar e preencha seus dados para contato.</p>
                </li>
                <li class="exp-item">
                    <span class="mini-square">2</span>
                    <p>Escolha entre cartão de crédito ou boleto bancário.</p>
                </li>
                <li class="exp-item">
                    <span class="mini-square">3</span>
                    <p>Em seguida ocorre a confirmação do pagamento.</p>
                </li>
                <li class="exp-item">
                    <span class="mini-square">4</span>
                    <p>Pronto! Eu entro em contato e faço a instalação.</p>
                </li>
            </ul>

            <a class="btn-medium" href="#">Comprar</a>
        </div>
        
    </section> <!-- /End section como_comprar -->
</main>

<?php
    get_footer();
?>