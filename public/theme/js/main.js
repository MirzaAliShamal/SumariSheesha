$(document).ready(function () {


    $("#age-restrict").change(function (e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $(".age-modal-wrapper button").addClass('age-submit');
        } else {
            $(".age-modal-wrapper button").removeClass('age-submit');
        }
    });

    $(document).on("click", ".age-submit", function() {
        document.cookie = "ageModal=true; max-age=86400"; // 86400: seconds in a day
        $(".age-modal-wrapper").fadeOut();
        if ($("body").hasClass('age-modal-open')) {
            $("body").removeClass('age-modal-open');
        }
    });

    if (document.cookie.indexOf("ageModal=true") == -1) {
        $(".age-modal-wrapper").show();
        if (!$("body").hasClass('age-modal-open')) {
            $("body").addClass('age-modal-open');
        }
    }

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
