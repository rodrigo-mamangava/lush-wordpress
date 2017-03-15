
jQuery(document).ready(function ($) {

    console.log('suite');
    
    $('.form-field').find('label').hide();

    $('body').on('change', $('.block-picker'), function () {

        $(document).ajaxComplete(function () {
            $('.block-picker').find('li').each(function (index) {
                if ($(this).data('block') == '1200') {
                    $(this).find('a').text('Diária');
                }
                if ($(this).data('block') == '1500') {
                    $(this).find('a').text('Período');
                }
                if ($(this).data('block') == '2000') {
                    $(this).find('a').text('Pernoite');
                }
            });
        });

    });


});

