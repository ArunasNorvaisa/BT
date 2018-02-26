$(document).ready(function () {
    $('.apskritimas').on('click', function () {
        var number = parseInt($(this).text());
        $(this).text( number * 2 );
    })

    $('.excercice2 .apskritimas-r').on('click', function () {
        var number = parseInt($('.excercice2 .apskritimas-z').text());
        $(this).text( number + 10 );
    })

    $('.excercice2 .apskritimas-z').on('click', function () {
        var number = parseInt($('.excercice2 .apskritimas-r').text());
        $(this).text( number + 10 );
    })

    $('.excercice3 .apskritimas-z, .excercice3 .apskritimas-r').on('click', function () {
        var number = parseInt($(this).text());
        $(this).text( number + 1 );
    })

    $('.excercice3 .apskritimas-g').on('click', function () {
        $('.excercice3 .apskritimas-z, .excercice3 .apskritimas-r').text(0);
    })

})