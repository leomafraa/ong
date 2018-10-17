// variables
var backToTopButton = jQuery('.back-to-top-button');

// show or hide back to top button
jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 200) {
        return backToTopButton.addClass('active');
    }

    return backToTopButton.removeClass('active');
});

// back to top button action
backToTopButton.click(function (e) {
    e.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, 800);
    location.hash = backToTopButton.attr('href');
});
