
// Função hideLogoRollpage
function hideLogoRollPage() {
    var heightScreen    = $(window).height() - 50;

    var rollTop         = $(document).scrollTop();

    var logo            = $('.logo_container');

    var mainHeader      = $('.main-header')

    if(rollTop > heightScreen) {
        mainHeader.addClass('main-header-compact')
    } else {
        mainHeader.removeClass('main-header-compact')
    }
}

// Função setWidthMenuFixed
function setWidthMenuFixed () {
    var widthScreen    = $(window).width();

    $('#main-header').width(widthScreen);
}

// Função getMenu() / closeMenu()
function toggleMenu (element) {
    $('.menu-awp-primary-container').toggleClass('active-menu');
    element.toggleClass('menu-open');
}

// Função hoverDesc
function hoverDesc (element) {
    element.find($('.wrap-description')).toggleClass('active-description')
}

// Função add destaque no blog
function addDestaqueblog () {
    var blogPost =  $('.blog-wrap > .blog-post');

    blogPost.eq(0).addClass('destaque');
}

// Função hoverThumb
function hoverThumb (element) {
    element.find($('.wp-post-image')).toggleClass('attachment-hover');
}

// Função bgParallax
function bgParallax () {
    $('.bg-parallax').each( function () {
        var $obj    = $(this);
        var yPos    = -($(window).scrollTop() / $obj.data('speed'));
        var bgPos   = '50%' + yPos + 'px';

        $obj.css(
            'background-position', bgPos
        );
    })
}

// Função smoothScroll jQuery for page scrolling feature - requires jQuery Easing plugin
function removeActiveMenu () {

    $('.menu-awp-primary-container').removeClass('active-menu');
    $('.menu-close').removeClass('menu-open');

}

// Add rolagem suave
$(document).on('click', 'a', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
});

// Função setWitdthInfoItem()
function setWitdthInfoItem() {

    var containerWidth = $('.list-of-infos').width();
    var items          = $('.list-of-infos > li').length;

    function setWidth () {

        return containerWidth / items - 30;
    }

    $('.list-of-infos > li').width( setWidth() );
}

// Função changeContactForm()       - 
function changeContact (){
    var formContact         = $('.contact');
    var infosContact        = $('.infos');

    $('.wrapper-btns > .form').on( 'click', function () {
        
        $(this).siblings().removeClass('active');

        $(this).addClass('active');

        infosContact.removeClass('enable')
        formContact.addClass('enable');
    } )

    $('.wrapper-btns > .infos').on( 'click', function () {

        $(this).siblings().removeClass('active');

        $(this).addClass('active');

        formContact.removeClass('enable');
        infosContact.addClass('enable');
    } )
}


// Funções invocadas quando o documento der load
$(document).ready(function () {

    setWidthMenuFixed();

    changeContact();

    setWitdthInfoItem();
})

// Funções invocadas quando rolar a página
$(document).scroll(function () {
    hideLogoRollPage();
})

// 
$('#menu-awp-primary a').on('click', function (event) {
    
    event.preventDefault();
    removeActiveMenu();

})



// invocando bg parallax
$(window).scroll( function () {
    bgParallax();
})

// Menu
$('.menu-close').on('click', function () {
    toggleMenu($(this));
})

// Invocando Description do .portfolio-item
$('.portfolio-item').hover( function () {
    hoverDesc($(this));
})

// Invocando description do .blog-item
// $('.blog-post-destaque').hover( function () {
//     hoverThumb($(this));
// })
// $('.blog-post').hover( function () {
//     hoverThumb($(this));
//     hoverDesc($(this));
// })