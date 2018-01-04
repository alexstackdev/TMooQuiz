/**
 * Created by macos on 1/1/18.
 */
$(function () {
    $('li.cate-item').hover(function () {
        if(!$(this).hasClass('active')){
            $(this).find('.fa').toggleClass('fa-folder');
            $(this).find('.fa').toggleClass('fa-folder-open');
        }
    },function () {
        if(!$(this).hasClass('active')){
            $(this).find('.fa').toggleClass('fa-folder');
            $(this).find('.fa').toggleClass('fa-folder-open');
        }
    });
    
    $('li.cate-item').each(function () {
        href = $(this).children('a').attr('href');
        if(href == location.href){
            $(this).addClass('active');
            $(this).find('.fa').toggleClass('fa-folder');
            $(this).find('.fa').toggleClass('fa-folder-open');
        }

    });

    var mixed = localStorage.getItem('mixed');
    if(mixed == '1'){
        $('.functions #mixed').attr('checked','checked');
    }else{
        $('.functions #mixed').removeAttr('checked');
    }
});