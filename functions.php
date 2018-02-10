<?php
/**
 * Awesome Portfolio functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if( ! function_exists( 'awesome_setup' ) ) :
    /**
    * Define os padrões do tema e registra o suporte para vários recursos do wordpress.
    * 
    */
    add_action( 'after_setup_theme', 'awesome_setup' );
    function awesome_setup() {


        $themeName = 'Awesome Portfólio';
        $themeVersion = '2.0.0';


        /**
        * Registrando o menu
        */
        $arrayMenu = array(
            'primary'   => esc_html__( 'awp-primary', 'awp' )
        );

        register_nav_menus( $arrayMenu );

        /**
        * Add suporte para logo custom
        */ 
        $logoCustom = array(
            'default-image'     => '', //Setar imagem padrão
            'width'             => 150,
            'height'            => 80,
            'flex-height'       => true,
            'flex-width'        => true,
            'uploads'           => true,
            'ramdon-default'    => false,
            'header-text'       => false
        );
        add_theme_support( 'custom-logo', $logoCustom );


        /**
        * Add suporte HTML5
        */ 

        $html5Support = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        );
        add_theme_support( 'html5', $html5Support );

        /**
        * Add suporte para os tipos de post
        */
        $supportTypes = array(
            'produtos',
            'portfolio',
            'blog',
            'servicos',
            'page',
            'secoes'
        );
        add_theme_support( 'post-thumbnails', $supportTypes );

        /**
        * Add image-size
        * - awp = abrev. Awesome Portfólio
        */
        // add_image_size( 'awp-cover', 'auto', 590, true );
        add_image_size( 'awp-portrait-big', 960, 480, true );
        add_image_size( 'awp-thumb-loja', 520, 330, true );
        add_image_size( 'awp-portrait-small', 580, 480, true );
        add_image_size( 'awp-pic-big', 450, 225, true );
        add_image_size( 'awp-pic-portfolio', 300, 250, true );
        add_image_size( 'awp-pic-small', 325, 220, true );
        add_image_size( 'awp-icon', 128, 128, true );

}
endif;


function make_title(){
    if(is_home()) {
        return bloginfo('name');
    }
    else{
        return bloginfo('name ') . ' | ' . the_title();
    }
}

/** 
*   Criação de Meta-Box para tipos de posts
*       @link https://developer.wordpress.org/reference/functions/add_meta_box/
*/

/*   @Subtitle: Função que registra um novo campo-meta para subtitle nos posts do tipo 'secoes'
*       #Callback: renderização do html
*/
function render_subtitle( $post ){
    $metaID = get_post_meta( $post->ID );

    $sectionSubtitle    = $metaID['cb_subtitle_id'][0];
    ?>

    <div class="">

        <div class="input_wrapper">
            <input id="cb_subtitle_id" class="" type="text" name="cb_subtitle_id" value="<?= $sectionSubtitle ?>">
        </div>

    </div>

    <?php
}

/*  @Subtitle
*       #Save
*/
function save_subtitle( $post_id ){
    if( isset( $_POST['cb_subtitle_id'] ) ){
        update_post_meta( $post_id, 'cb_subtitle_id', sanitize_text_field( $_POST['cb_subtitle_id'] ) );
    } else {
        return false;
    }
}
add_action('save_post', 'save_subtitle');


/*  @Subtitle
*       #Register
*/
function reg_subtitle_pages(){

    $argsContentScreen = array(
        'secoes',
        'page',
        'post',
        'blog'
    );
    add_meta_box(
        'subtitle-post',
        'Adicionar subtitulo',
        'render_subtitle',
        $argsContentScreen,
        'advanced',
        'default'
    );
}
add_action('add_meta_boxes', 'reg_subtitle_pages');


/*  @Link: Cria o campo para adicionar o link do projeto cadastrado no portfólio
*
*       #Register
*/
function render_linkInput( $post ) {
    $metaID = get_post_meta( $post->ID );

    $linkPortfolio = $metaID['cb_link_id'][0];
    ?>

    <div class="">
        <label for="cb_link_id">Link do projeto:</label>
        <input id="cb_link_id" class="" type="text" name="cb_link_id" value="<?= $linkPortfolio ?>">
    </div>

    <?php 
}

/*  @Link
*
*       #Save
*/
function save_link_portfolio( $post_id ) {
    if( isset( $_POST['cb_link_id'] ) ) {
        update_post_meta( $post_id, 'cb_link_id', sanitize_text_field( $_POST['cb_link_id'] ) );
    }
    else{
        return 'Link inválido!';
    }
}
add_action( 'save_post', 'save_link_portfolio' );


/*  @Link
*
*       #Register
*/
function reg_portfolioLink() {
    add_meta_box(
        'mb-portfolio-link',
        'Link esse job',
        'render_linkInput',
        'portfolio',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'reg_portfolioLink' );

/*  @produtos: Meta-campos para registrar informações dos produtos cadastrados na loja
*
*       #Callback
*/
function render_metabox_produto( $post ) {
    $metaID = get_post_meta( $post->ID );

    $metaVersion        = $metaID['cb_meta_version'][0];
    $metaPrice          = $metaID['cb_meta_price'][0];
    $metaBgCustom       = $metaID['cb_meta_bgcustom'][0];
?>

<div class="cb_container">
    <div class="input_wrapper">
        <label for="cb_meta">Versão:</label>
        <input id="cb_meta_version" type="number" name="cb_meta_version" value="<?= $metaVersion ?>">
    </div>
    <div class="input_wrapper">
        <label for="cb_meta">Preço:</label>
        <input id="cb_meta_price" type="text" name="cb_meta_price" value="<?= $metaPrice ?>">
    </div>
    <div class="input_wrapper">
        <label for="cb_meta">Background:</label>
        <input type="file" accept=".jpg, .png" name="cb_meta_bgcustom" value="<?= $metaBgCustom ?>">
    </div>
</div>

<?php
}



/*  @produtos
*       #Save
*/
function save_metabox_produtos( $post_id ) {
    if( isset( $_POST['cb_meta_version'] ) ) {
        update_post_meta( $post_id, 'cb_meta_version', sanitize_text_field( $_POST['cb_meta_version'] ) );
    }
    if( isset( $_POST['cb_meta_price'] ) ) {
        update_post_meta( $post_id, 'cb_meta_price', sanitize_text_field( $_POST['cb_meta_price'] ) );
    }
    if( isset( $_POST['cb_meta_bgcustom'] ) ) {
        update_post_meta( $post_id, 'cb_meta_bgcustom', sanitize_text_field( $_POST['cb_meta_bgcustom'] ) );
    }
}
add_action( 'save_post', 'save_metabox_produtos' );


/*  @produtos
*       #Register
*/
function add_metabox_produto() {
    add_meta_box(
        'meta-produto',
        'Informações do produto',
        'render_metabox_produto',
        'produtos',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'add_metabox_produto' );


/*  @Contato: Meta-campos para registrar informações básicas de contato do profissional - Transformar isso em um widget
*       # Callback
*/
function cb_render_contact_infos( $post ){
    $metaID = get_post_meta( $post->ID );

    $metaAddress    = $metaID['cb_meta_address_id'][0];
    $metaMap        = $metaID['cb_meta_map_id'][0];
    $metaPhone      = $metaID['cb_meta_phone_id'][0];
    $metaEmail      = $metaID['cb_meta_email_id'][0];
?>

    <div class="cb_container">
        <div class="input_wrapper">
            <label for="cb_meta_address_id">Adicione o endereço:</label>
            <input id="cb_meta_address_id" class="cb_meta_address" type="text" name="cb_meta_address_id" value="<?= $metaAddress ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_meta_map">Mapa</label>
            <input id="cb_meta_map_id" class="cb_meta_map" type="text" name="cb_meta_map_id" value="<?= $metaMap ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_meta_phone_id">Telefone</label>
            <input id="cb_meta_phone_id" class="cb_meta_phone" type="text" name="cb_meta_phone_id" value="<?= $metaPhone ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_meta_email_id">E-mail:</label>
            <input id="cb_meta_email_id" class="cb_meta_email" type="email" name="cb_meta_email_id" value="<?= $metaEmail ?>">
        </div>
    </div>

<?php
}


/* Função para rendenizar as informações de contato cadastradas */
function render_address_html ( $post ) {

    $metaID = get_post_meta( $post->ID );

    $metaAddress    = $metaID['cb_meta_address_id'][0];
    $metaMap        = $metaID['cb_meta_map_id'][0];
    $metaPhone      = $metaID['cb_meta_phone_id'][0];
    $metaEmail      = $metaID['cb_meta_email_id'][0];
    ?>
    <?php 
        if ($metaAddress != '' ) {
    ?>

         <li class="item-info">
            <i class="icon fa fa-map-marker"></i>
            <span class="title-info">endereço</span>
            <span class="info"><?php echo $metaAddress; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php 
        if ($metaMap != '' ) {
    ?>

         <li class="item-info">
            <i class="icon fa fa-map"></i>
            <span class="title-info">Mapa</span>
            <span class="info"><?php echo $metaMap; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php 
        if ($metaPhone != '' ) {
    ?>

         <li class="item-info">
            <i class="icon fa fa-mobile-phone"></i>
            <span class="title-info">Telefone</span>
            <span class="info"><?php echo $metaPhone; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php 
        if ($metaEmail != '' ) {
    ?>

         <li class="item-info">
            <i class="icon fa fa-envelope"></i>
            <span class="title-info">E-mail</span>
            <span class="info"><?php echo $metaEmail; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php
}


/*  @contato
*       #Save
*/
function save_metabox_contato( $post_id ) {
    if( isset( $_POST['cb_meta_address_id'] ) ) {
        update_post_meta( $post_id, 'cb_meta_address_id', sanitize_text_field( $_POST['cb_meta_address_id'] ) );
    }

    if( isset( $_POST['cb_meta_map_id'] ) ) {
        update_post_meta( $post_id, 'cb_meta_map_id', sanitize_text_field( $_POST['cb_meta_map_id'] ) );
    }
    
    if( isset( $_POST['cb_meta_phone_id'] ) ) {
        update_post_meta( $post_id, 'cb_meta_phone_id', sanitize_text_field( $_POST['cb_meta_phone_id'] ) );
    }

    if( isset( $_POST['cb_meta_email_id'] ) ) {
        update_post_meta( $post_id, 'cb_meta_email_id', sanitize_text_field( $_POST['cb_meta_email_id'] ) );
    }
}
add_action( 'save_post', 'save_metabox_contato' );

/*  @Contato
*       #register
*/
function reg_infos_contact () {
    $argsContato = array(
        'post_type'     => 'secoes',
        'slug'       => 'contato'
    );
    
    $getContato = get_posts( $argsContato );

    $pageContato = $getContato->ID;
    

    add_meta_box(
        'meta-infos',
        'Informações de contato',
        'cb_render_contact_infos',
        $pageContato,
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'reg_infos_contact' );

/** 
*   Registro de novos tipos de posts
*       @link https://codex.wordpress.org/pt-br:Tipos_de_Posts_Personalizados
*/

/*
*   #Secoes: Seções que compõe a página inicial do website
*/ 

add_action( 'init', 'sections' );
function sections() {
    $pluralName = 'Seções';
    $singularName = 'Seção';

    $labels = array(
        'name'              => $pluralName,
        'singular_name'     => $singularName,
        'add_new'           => 'Nova ' . $singularName,
        'add_new_item'      => 'Adicionar ' . $singularName,
        'edit_item'         => 'Editar ' . $singularName,
        'featured_image'    => 'Selecione uma capa'
    );

    $supports = array(
        'title',
        'thumbnail',
        'excerpt',
        'page-attributes'
    );

    $args_section = array(
        'labels'         => $labels,
        'public'         => true,
        'supports'       => $supports,
        'menu_icon'      => 'dashicons-list-view'
    );
    register_post_type( 'secoes', $args_section );


    /*
    * - Taxonomia para seções
    */
    $nameTaxPlural = 'Páginas';
    $nameTaxSingular = 'Página';

    $labelsTax = array(
        'name'              => $nameTaxPlural,
        'singular_name'     => $nameTaxSingular,
        'edit_item'         => 'Editar ' . $nameTaxSingular,
        'add_new_item'      => 'Adicionar ' . $nameTaxSingular,
        'new_item_name'     > 'Nova ' . $nameTaxSingular
    );

    $argsTax = array(
        'labels'        => $labelsTax,
        'hierarchical'  => true,
        'public'        => true
    );
    register_taxonomy('paginas', 'secoes', $argsTax);
}


/*
*   #Produtos: Os temas, websites e sistemas que serão comercializados na loja
*/ 
add_action( 'init', 'post_type_produtos' );
function post_type_produtos() {
    $pluralName = 'Produtos';
    $singularName = 'Produto';

    $labels = array(
        'name'                  => $pluralName,
        'singular_name'         => $singularName,
        'add_new'               => 'Novo ' . $singularName,
        'add_new_item'          => 'Adicionar ' . $singularName,
        'edit_item'             => 'Editar ' . $singularName,
        'new_item'              => 'Adicionar novo ' . $singularName,
        'featured_image'        => 'Capa do produto'
    );

    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt'
    );

    $args_produtos = array(
        'labels'        => $labels,
        'public'        => true,
        'supports'      => $supports,
        'menu_icon'     => 'dashicons-cart'
    );
    register_post_type( 'produtos', $args_produtos );
}

/*
*   #Portfolio: Trabalhos feitos que serão postados no site
*/ 
add_action( 'init', 'post_type_portfolio' );
function post_type_portfolio() {
    $pluralName = 'Portfolio';
    $singularName = 'Trabalho';

    $labels = array(
        'name'              => $pluralName,
        'singular_name'     => $singularName,
        'add_new'           => 'Novo ' . $singularName,
        'add_new_item'      => 'Adicionar ' . $singularName,
        'edit_item'         => 'Editar ' . $singularName,
        'featured_image'    => 'Selecione uma imagem'
    );

    $supports = array(
        'title',
        'thumbnail',
        'link'
    );
    $args_portfolio = array(
        'labels'        => $labels,
        'public'        => true,
        'supports'      => $supports,
        'menu_icon'     => 'dashicons-images-alt'
    );
    register_post_type( 'portfolio', $args_portfolio );
}

/*
*   #Blog: Blog do profissioanl
*/ 
add_action( 'init', 'post_type_blog' );
function post_type_blog() {
    $pluralName = 'Blog';
    $singularName = 'Post';

    $labels = array(
        'name'              => $pluralName,
        'singular_name'     => $singularName,
        'add_new'           => 'Novo ' .  $singularName,
        'add_new_item'      => 'Adicionar ' .  $singularName,
        'edit_item'         => 'Editar ' . $singularName,
        'featured_image'    => 'Selecione uma imagem destacada'
    );

    $supports = array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt'
    );

    $args_blog = array(
        'labels'        => $labels,
        'public'        => true,
        'supports'      => $supports,
        'menu_icon'     => 'dashicons-align-left'
    );

    register_post_type( 'blog', $args_blog );
}

/*
*   #Serviços: Serviços que o profissional oferece
*/ 
add_action( 'init', 'post_type_servicos' );
function post_type_servicos() {
    $pluralName = 'Serviços';
    $singularName = 'Serviço';

    $labels = array(
        'name'              => $pluralName,
        'singular_name'     => $singularName,
        'add_new'           => 'Novo ' . $singularName,
        'add_new_item'      => 'Adicionar ' . $singularName,
        'edit_item'         => 'Editar ' . $singularName,
        'featured_image'    => 'Adicionar ícone'
    );

    $supports = array(
        'title',
        'excerpt',
        'thumbnail'
    );

    $args_services = array(
        'labels'    => $labels,
        'public'    => true,
        'supports'  => $supports,
        'menu_icon' => 'dashicons-editor-code'
    );
    register_post_type( 'servicos', $args_services );
}

/*
*   Registro de categorias e tags relacionadas aos posts
*       @link https://codex.wordpress.org/Function_Reference/register_taxonomy
*/
$forCategoriesAndTags = array(
    'produtos',
    'portfolio',
    'blog'
);

$nameCatPlural = 'Categorias';
$nameCatSingular = 'Categoria';

$labelsCat = array(
    'name'              => $nameCatPlural,
    'singular_name'     => $nameCatSingular,
    'add_new_item'      => 'Adicionar ' . $nameCatSingular,
    'edit_item'         => 'Editar ' . $nameCatSingular
);

$argssCat = array(
    'labels'        => $labelsCat,
    'hierarchical'  => true,
    'public'        => true
);
register_taxonomy('categorias', $forCategoriesAndTags, $argssCat);


/*
* Registro de tags
*/
$nameTagsPlural     = 'Tags';
$nameTagsSingular   = 'Tag';

$labelsTags = array(
    'name'          => $nameTagsPlural,
    'singular_name' => $nameTagsSingular,
    'add_new_item'  => 'Adicionar ' . $nameTagsSingular,
    'edit_item'     => 'Editar ' . $nameTagsSingular
);

$argsTags = array(
    'labels'        => $labelsTags,
    'hierarchical'  => false,
    'public'        => true
);
register_taxonomy('tags', $forCategoriesAndTags, $argsTags);




/**
* Criando uma area de widgets
*
*/
function widgets_novos_widgets_init() {

    register_sidebar( array(
        'name'              => 'Informacoes',
        'id'                => 'contact-widget',
        'before_widget'     => '<div>',
        'after_widget'      => '</div>',
        'before_title'      => '<h2>',
        'after_title'       => '</h2>',
    ) );
}
add_action( 'widgets_init', 'widgets_novos_widgets_init' );


/**
*    WP Enqueue stylesheet
*/
if ( !function_exists( 'load_style_scripts' ) ) {

    $path   = home_url();

    function load_style_scripts () {

        wp_enqueue_style( 'reset', $path . '/wp-content/themes/awesomeportfolio/libs/css/reset.min.css', array(), true );
        wp_enqueue_style( 'animations', $path . '/wp-content/themes/awesomeportfolio/libs/css/keyframes.min.css', array(), true );
        wp_enqueue_style( 'main', $path . '/wp-content/themes/awesomeportfolio/libs/css/style-theme.min.css', array(), true );
    }
    add_action( 'wp_enqueue_scripts', 'load_style_scripts' );
}


/**
*    WP Enqueue Javascript
*/
if ( ! function_exists( 'load_scripts_js' ) ) {

    function load_scripts_js() {
        
        // jQuery
        wp_enqueue_script( 'jquery-script', $path . '/wp-content/themes/awesomeportfolio/libs/js/jquery-3.1.0.min.js', array(), null, true );

        // jQuery easing
        wp_enqueue_script( 'jquery-easing', $path . '/wp-content/themes/awesomeportfolio/libs/js/jquery.easing.min.js', array(), null, true );

        // Main js
        wp_enqueue_script( 'main-js', $path . '/wp-content/themes/awesomeportfolio/libs/js/functions.js', array('jquery'), null, true );

        // Slider
        wp_enqueue_script( 'slider-awesome', $path . '/wp-content/themes/awesomeportfolio/libs/js/awesome-slider.js', array('jquery'), null, true );
        
    }
    add_action( 'wp_enqueue_scripts', 'load_scripts_js' );
}

?>