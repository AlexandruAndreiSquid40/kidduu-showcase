jQuery(document).ready(function ($) {
    $(window).on('resize', function () {
        var ww = $(window).width();
        if (ww < 961) {
            $('.menu').hide();
        } else {
            $('.small_res_menu').removeClass('active');
            $('.menu').show();
        }
    });
    $('.small_res_menu').click(function () {
        $(this).toggleClass('active');
        $('.menu').slideToggle();
    });


    // for mobile Home Cards holder , clone card-image url and add the div parent background-image, and for mobile display block for that div[ no hover ]
    $('.cards_holder .card').each(function(){
        var this_card = $(this).find('.card_wrapper');
        var img_path = $(this).find('.card-image img').attr('src');
        this_card.css('background-image','url('+img_path+')');
    });

    // LATEST NEWS TABS 
    $('.latest_news .tabs_holder .tabs_navigation li').click(function(){
        var this_li = $(this);
        var this_navigation = $(this).data('tab');
        var target_navigation = $(this).parent().parent().parent().find('.tabs_wrp .tab[data-tab="'+this_navigation+'"]');

        if(this_li.hasClass('active')){
            //do nothing, don't remove class
            //if current click is the same tab we don't want to do anything

        }else{
            // if click is a diffrent navigation then do this
            // add class Active to current , remove other tabs / li class active
            $('.latest_news .tabs_holder .tabs_navigation li').removeClass('active');
            $('.latest_news .tabs_holder .tabs_wrp .tab').removeClass('active');
            this_li.addClass('active');
            target_navigation.addClass('active');
        }
        
    });


    /*HOME UPCOMING EVENTS*/
    $('.events .events_slider').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 100,
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: true,
        // initialSlide : 1,
        focusOnSelect:true,
        // fade: true,
        cssEase: 'linear',
        rows: 0 // Fix vor v1.8.0-1 for not adding extra div
        
    });
    // $('.content.events .events_slider .event_box.slick-active + .slick-active + .slick-active .event_box_pic').slideDown();
    // $('.events .events_slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    //     $('.content.events .event_slider .event_box .event_box_pic').stop().slideUp(); 

    //     // $('.content.events .events_slider .event_box.slick-active + .slick-active + .slick-active .event_box_pic').slideDown();
    // });


});
