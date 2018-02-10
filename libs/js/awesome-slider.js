
// Configs
var widthScreen     = $(window).width();
var heightScreen    = $(window).height();

var mobileScreen    = '415';
var desktopScreen   = '1280';

// Slider Home
function sliderHome () {

    var sliderInner     = $('#homepage > .slider-inner');                   // .slider-inner
    var slideHomepage   = $('#homepage > .slider-inner > .slide');          // .slide
    var childrenNo      = sliderInner.children().length;                    // length .slide

    // Definir o tamanho do container
    sliderInner.width( widthScreen * childrenNo );

    // Resize $(window)
    $(window).resize( function () {
        widthScreen = $(window).width();
    })

    // Seta a largura de cada slide-item
    function setWidth () {
        slideHomepage.each( function () {
            $(this).width(widthScreen);
            $(this).css(
                'left', widthScreen * $(this).index()
            )
        })
    }

    // Posicionando o slider na tela
    function setActiveHomepage (element) {
        // - Captura o índice do elemento clicado
        var clickIndex = element.index();

        // - Transição do .slider-inner
        sliderInner.css(
            'transform',    'translateX(-' + clickIndex * widthScreen + 'px)'
        )

        // - Remove .active-slide
        $('.slider-inner .slide').removeClass('.active-slide')

        // - Adiciona .active-slide
        $('.slider-inner .slide').eq(clickIndex).addClass('active-slide')
    }

    // Setando o serviço destaque
    function setNavActive ( element ) {
        // - Captura o índice do elemento clicado
        var clickIndex = element.index();

        // - Remove .active
        element.siblings().removeClass('active');

        // - Add .active no elemento
        element.addClass('active');


    }
    
    // Largura do .slide
    setWidth();
   
    // - Setando menu e slider ative na homepage
    $('.nav-home > .slide-button').on('click', function() {

        setNavActive($(this));
        setActiveHomepage($(this));
    })

    // - Largura da tela
    $(window).resize( function () {
        setWidth();
    })

    setTimeout( function () {
        $('.slide').fadeIn(500);
    }, 2000)
}

// Slider serviços
function sliderServicos() {
   
    var serviceInner            = $('.slider-services');
    var serviceItem             = $('.slider-services > .service-item')
    
    var childrenNo              = serviceInner.children().length;
    
    // Definindo a largura
    var serviceInnerWidth           = serviceInner.width() * childrenNo; // Largura .slider-services-wrap
    var serviceItemWidth            = serviceInnerWidth / childrenNo; // Largura .slide-service-item

    // Setando a largura
    serviceInner.width( serviceInnerWidth );

    // Setando a largura de cada item
    (function setWidthServiceItem () {

        serviceItem.each( function () {

            $(this).width( serviceItemWidth );
            $(this).css(
                'left', serviceItemWidth * $(this).index()
            )
        })
    }) ();

    // Setando o slider
    function setActiveService (element) {
        // - Captura o índice do elemento clicado
        var clickIndex = element.index();

        // - Transição do .slider-inner
        serviceInner.css(
            'transform',    'translateX(-' + clickIndex * serviceItemWidth + 'px)'
        )
    }

    // Setando o 
    function setNavActive ( element ) {
        // - Captura o índice do elemento clicado
        var clickIndex = element.index();

        // - Remove .active
        element.siblings().removeClass('active');

        // - Add .active no elemento
        element.addClass('active');


    }
    // - Setando menu e slide ativo na seção #servicos
    $('.nav-servicos > .slide-button').on('click', function() {
        setActiveService($(this));
        setNavActive($(this));
    })
}

// Slider Portfolio mobile
function sliderPortfolio() {

    if( mobileScreen >= widthScreen ){

        var portfolioInner          = $('.portfolio-wrap');
        var portfolioItem           = $('.slider-container > .portfolio-wrap > .portfolio-item');
        
        var childrenNo              = portfolioInner.children().length;

        // -
        var portfolioInnerWidth     = portfolioInner.width() * childrenNo;
        var portfolioItemWidth      = portfolioInnerWidth / childrenNo;

        // - Setando a largura do wrap e dos items
        portfolioInner.width( portfolioInnerWidth );

        (function setWidthItem () {

            portfolioItem.each( function () {

                $(this).width( portfolioItemWidth ).css(
                    'left', portfolioItemWidth * $(this).index() 
                )
            })
        }) ();

        // Trocando os slides
        function setSliderActive (element) {

            var clickedIndex = element.index();

            portfolioInner.css(
                'transform', 'translateX(-' + clickedIndex * portfolioItemWidth + 'px)'
            )
        }

        function setNavItemActive (element) {
            
            var clickedIndex = element.index();

            element.siblings().removeClass('active');

            element.addClass('active');
        }

        $('.nav-portfolio > .slide-button').on('click', function() {
            
            setSliderActive( $(this) );
            setNavItemActive( $(this) );
        })
    } else {
        return false;
    }

    
}

// Slider blog mobile
function slideBlog () {
    
    if( mobileScreen >= widthScreen ) {

        blogWrap            = $('.blog-wrap');
        blogPost            = $('.blog-post');

        childrenNo          = blogWrap.children().length;

        blogWrapWidth       = blogWrap.width() * childrenNo;
        blogPostWidth       = blogWrapWidth / childrenNo;

        // Largura do container
        blogWrap.width( blogWrapWidth );

        (function setWidthPost () {
            
            blogPost.each( function () {

                $(this).width( blogPostWidth ).css(
                    'left', blogPostWidth * $(this).index()
                )
            })
        }) ();

        function slider (element) {
            
            var clickedIndex = element.index();

            blogWrap.css(
                'transform', 'translateX(-' + clickedIndex * blogPostWidth + 'px)'
            )
        }

        function setNavItemActive (element) {
            
            var clickedIndex = element.index();

            element.siblings().removeClass('active');

            element.addClass('active');
        }


        $( '.nav-blog > .slide-button' ).on( 'click', function () {

            slider( $(this) ),
            setNavItemActive( $(this) )
        })

    } else {
        
        return false;
    }
}
$(document).ready( 

    sliderHome(), 
    sliderServicos(),
    sliderPortfolio(),
    slideBlog() 
);