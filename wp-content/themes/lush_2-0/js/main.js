/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    
    console.log('ok');
    
    
    $(".navbar").affix({offset: {top: $(".faixa-vitrine").outerHeight(true)} });
    
    
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
});


