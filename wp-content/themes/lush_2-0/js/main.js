/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {

    console.log('ok');


    $(".navbar").affix({offset: {top: $(".faixa-vitrine").outerHeight(true)}});

    //$("#menu-geral").data('spy', 'affix');


    $('.carousel-slick').slick({
        centerMode: true,
        centerPadding: '110px',
        slidesToShow: 1,
        arrows: true,
        //autoplay: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.carousel-slick-suite').slick({

        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true

    });




});


