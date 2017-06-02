jQuery(document).ready(function ($) {
    
    console.log('animacao!');
    
    count = 0;
    wordsArray = $("#palavra01").data('p01');
    wordsArray2 = $("#palavra02").data('p02');
    
    
    setInterval(function () {
        count++;
        
        $("#palavra01").fadeOut(400, function () {
            $(this).text(wordsArray[count % wordsArray.length]).fadeIn(400);
        });
        
        $("#palavra02").fadeOut(400, function () {
            $(this).text(wordsArray2[count % wordsArray2.length]).fadeIn(400);
        });
        
    }, 2000);
});