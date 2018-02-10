<?php
/**
 * Awesome Portfolio Header.
 *
 */
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> <?php make_title(); ?> </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
       

        
        <!-- Font-awesome -->
	    <script src="https://use.fontawesome.com/2192a1d789.js"></script>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,900|Roboto:300,400" rel="stylesheet">

        <!-- Open Graph	- SEO Facebook -->
        <meta property="og:locale" content="pt_BR"> <!-- /Localização e linguagem -->
        <meta property="og:url" content="<?php site_url() ?>"> <!-- /Url do site -->
        <meta property="og:site_name" content="<?= make_title(); ?>"> <!-- /Nome do Site/Página -->
        <meta property="og:description" content="<?php bloginfo('description') ?>"> <!-- /Descrição -->
        <meta property="og:type" content="website"> <!-- /Tipo da aplicação -->
        <?php
            load_style_scripts();
            wp_head(); 
        ?>

    </head>
    <body>
        <!-- APK Facebook  -->
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        
        <!-- Header -->
        <header id="" class="main-header">
            <div class="container_one">
                <div class="logo_container">
                    <img class="awp-logo" src="wp-content/themes/awesomeportfolio/img/logotipo.png" alt="logotipo">
                </div> <!-- end logo --> 
                <div class="wrapper_menu">
                    <span class="menu-close">
                        <i class="line-top"></i>
                        <i class="line-middle"></i>
                        <i class="line-bottom"></i>
                        <span class="name">menu</span>
                    </span>
                    
                    <?php
                        $args = array(
                            'menu'      => 'awp-primary',
                            'menu_class'    => 'main-menu',
                            'echo'          => true,
                        );
                        wp_nav_menu( $args );
                    ?>
                </div> <!-- end menu -->
            </div>
        </header>