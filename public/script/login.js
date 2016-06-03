$(document).ready(function(){
    //
    var $login = $('.loginBtn');
    $login.bind("click",function(){
        $('.mask').css('display','block');
    });

    $('.fa-times').bind('click',function(){
        $('.mask').css('display','none');
    });
    $('.login_link').bind('click',function(){
        $('.login_box').css('display','none');
        $('.register_box').fadeIn('slow');

    });

});
//
