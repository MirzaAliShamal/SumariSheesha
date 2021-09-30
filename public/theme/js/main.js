$(document).ready(function () {
    $('.shopping-cart').each(function() {
        var delay = $(this).index() * 50 + 'ms';
        $(this).css({
            '-webkit-transition-delay': delay,
            '-moz-transition-delay': delay,
            '-o-transition-delay': delay,
            'transition-delay': delay
        });
    });

    $('.cart').click(function(e) {
        e.stopPropagation();
        $(".shopping-cart").toggleClass("active");
    });
});
