/**
 * Created by nav on 06-03-16.
 */

$(document).ready(function(){

    // Single page nav
    var file;
    if($(window).width() <= 1139) {
        $('.tm-main-nav').singlePageNav({
            'currentClass' : "active",
            offset : 100
        });
    } else {
        $('.tm-main-nav').singlePageNav({
            'currentClass' : "active",
            offset : 80
        });
    }

    // Handle nav offset upon window resize
    $(window).resize(function(){
        if($(window).width() <= 1139) {
            $('.tm-main-nav').singlePageNav({
                'currentClass' : "active",
                offset : 100
            });
        } else {
            $('.tm-main-nav').singlePageNav({
                'currentClass' : "active",
                offset : 80
            });
        }
    });

    // Magnific pop up
    $('.gallery-container').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery: {enabled:true}
        // other options
    });

    $('.carousel').carousel({
        interval: 3000
    })

    // Enable carousel swiping (http://lazcreative.com/blog/adding-swipe-support-to-bootstrap-carousel-3-0/)
    $(".carousel-inner").swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
            $(this).parent().carousel('next');
        },
        swipeRight: function() {
            $(this).parent().carousel('prev');
        }
    });
});