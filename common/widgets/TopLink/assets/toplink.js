var top_show = 150; // В каком положении полосы прокрутки начинать показ кнопки "Наверх"
var delay = 1000; // Задержка прокрутки
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > top_show)
            $('#toplink').fadeIn();
        else
            $('#toplink').fadeOut();
    });
    $('#toplink').click(function () {
        $('body, html').animate({
            scrollTop: 0
        }, delay);
    });
});
