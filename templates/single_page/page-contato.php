<?php

    $argsSection = array(
        'post_type'     => 'secoes',
        'paginas'       => 'contato'
    );

    $getSection = get_posts( $argsSection );

    if( $getSection ) : 
        foreach( $getSection as $post ) :
?>

<div class="section-wrapper container_one">
    <header class="header-section-secondary">
        <h2 class="title" title="<?= the_title(); ?>"><?= the_title(); ?></h2>
    </header> <!-- /End header section -->

<?php 
        endforeach;
    endif;
?><!-- /End header section -->

<?php 
    // Registrar essas informações no functions.php*
    $endereco   = get_post_meta($post->ID, 'cb_meta_address_id', true);
    $mapa       = get_post_meta($post->ID, 'cb_meta_mapa_id', true);
    $phone      = get_post_meta($post->ID, 'cb_meta_phone_id', true);
    $email      = get_post_meta($post->ID, 'cb_meta_email_id', true);
?>

    <div class="wrapper-body">
        <div class="wrapper-btns">
            <span class="btn form active">
                <i class="fa fa-envelope"></i>
                Formulário
            </span>
            <span class="btn infos">
                <i class="fa fa-address-book"></i>
                Informações
            </span>
        </div> 

        <div class="wrapper infos">
            <!-- <h3 class="title-box">Informações de contato</h3> -->
            <ul class="list-of-infos">
            
                <?php 
                    render_address_html( $post );
                ?>
            </ul> <!-- /End infos -->

            <ul class="social-share" style="display: none">
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
        </div> <!-- /End wrapper informações -->
    

    </div>

</div>
