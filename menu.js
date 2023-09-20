$(".menu__menu > ul > li").click(function(e){
    $(this).siblings().removeClass("active");
    $(this).toggleClass("active");
    $(this).find("ul").slideToggle();
    $(this).siblings().find("ul").slideUp();
    $(this).siblings().find("li").removeClass("active");
});

$(".menu-btn__menu").click(function(){
    $(".sidebar__menu").toggleClass("active");
});