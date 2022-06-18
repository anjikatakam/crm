$(document).on('click', '.left-nav-bar li', function(){
    $('.left-nav-bar li').removeClass('active');
    $(this).addClass('active')
})
$(document).on('click', '.showDetailsdiv', function(){
    $('.ticket-item').removeClass('active');
    $(this).addClass('active')
    $('.show-details').addClass('show')
})
$(document).on('click', '.close-btn', function(){
    $('.show-details').removeClass('show')
});
$(document).on('click', '.list-item', function(){
    //window.location.href = "javascript:void(0);";
});

$(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function () {

        current_fs = $(this).parent().parent();
        next_fs = $(this).parent().parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    $(".previous").click(function () {

        current_fs = $(this).parent().parent();
        previous_fs = $(this).parent().parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function () {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    $('#msform').on('submit', function(e){
        e.preventDefault();
        window.location.href = "crm.html";
    })

});