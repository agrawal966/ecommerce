/*---------------------get Country Data according to their Country Code-----------------------*/


/*------------------------get Country Data according to their Country Code-------------------------*/


/*----------------------------get state Data according to their country-----------------------------*/



/*------------------------get City Data according to their state-----------------------*/



/*get Postal Codes Data according to their City*/


/*----------------------get Product Quantity----------------------*/


/*-----------------Notify Message function------------------*/

function successMsg(msg){ 
    $('.custom-alert-msg-wrap').remove();
    $('.notifyjs-corner').empty();
    /*$.notify("<?php //echo $CI->session->flashdata('msg_success'); ?>", "success");*/

    $.notify({
        icon: SITE_URL + "assets/frontend/alert-icons/alert-checked.svg",
        title: "<strong>Success</strong> ",
        message: msg          
    },{
        icon_type: 'image',
        type: 'success',
        allow_duplicates: false
    });
}


function infoMsg(msg){
    $('.custom-alert-msg-wrap').remove();
    $('.notifyjs-corner').empty();
    /*$.notify("<?php //echo $CI->session->flashdata('msg_info'); ?>", "info");*/

    $.notify({
        icon: SITE_URL + "assets/frontend/alert-icons/alert-checked.svg",
        title: "<strong>Info</strong> ",
        message: msg          
    },{
        icon_type: 'image',
        type: 'success',
        allow_duplicates: false
    });
}


function warningMsg(msg){
    $('.custom-alert-msg-wrap').remove();
    $('.notifyjs-corner').empty();
    /*$.notify("<?php //echo $CI->session->flashdata('msg_warning'); ?>", "warn");*/

    $.notify({
        icon: SITE_URL + "assets/frontend/alert-icons/alert-danger.svg",
        title: "<strong>Warning</strong> ",
        message: msg

    },{
        icon_type: 'image',
        type: 'warning',
        allow_duplicates: false
    });
}


function errorMsg(msg){
    $('.custom-alert-msg-wrap').remove();
    $('.notifyjs-corner').empty();  
    $.notify({
        icon: SITE_URL + "assets/frontend/alert-icons/alert-disabled.svg",
        title: "<strong>Error</strong> ",
        message: msg
    },{
        icon_type: 'image',
        type: 'danger',
        allow_duplicates: false
    });
}

function errMsg(msg){
    $('.custom-alert-msg-wrap').remove();
    $('.notifyjs-corner').empty();  
    $.notify({
        icon: SITE_URL + "assets/frontend/alert-icons/alert-disabled.svg",
        title: "<strong>Error</strong> ",
        message: msg
    },{
        icon_type: 'image',
        type: 'danger',
        allow_duplicates: false
    });
}


/*Call function for autoscrolling when the window size is less than 1050*/

function windowSizeAutoScroll(){ 
    if($(window).width() <= 1050){
        $('html, body').animate({
              scrollTop: $(".product_attribute").offset().top - 70
        }, 1000); 
        return false;
    }
}