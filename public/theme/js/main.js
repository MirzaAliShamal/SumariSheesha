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

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: new Date(),
        enableOnReadonly: true,
    });

    $('#timepicker').mdtimepicker({
        timeFormat: 'hh:mm:ss.000',
        format:'hh:mm tt',
        readOnly:true,
        theme:'dark',
        okLabel:'Confrim',
        cancelLabel:'Cancel',
    });
});
