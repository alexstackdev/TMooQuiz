/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('.side-nav').metisMenu();
    $('.btn-avt button').click(function() {
        $('#file-avt').click();
    });
    $('#file-avt').change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            $('.alert-avt').removeClass('hidden');
            $('.alert-avt').html('Định dạng ảnh không đúng . Vui lòng chọn ảnh jpeg, png, jpg !');
            return false;
        }
        else {           
            $('#upload-avatar').on('submit',function(e) {
                e.preventDefault();
                $url = $(this).attr('action');
                $.ajax({
                    url: $url, // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(data)   // A function to be called if request succeeds
                    {            
                        $data = $.parseJSON(data);
                        if ($data.error) {
                            $('.alert-avt').removeClass('hidden');
                            $('.alert-avt').html($data.error);
                        }
                        else if ($data.url_img) {
                            $('.avatar').html('<img class="img-responsive" src="'+$data.url_img+'"/>');
                            $('.alert-avt').removeClass('hidden');
                            $('.alert-avt').removeClass('alert-danger');
                            $('.alert-avt').addClass('alert-success');
                            $('.alert-avt').html('Cập nhật ảnh đại diện thành công!');
                            $('.btn-avt').fadeOut();
                            $('.avatar img').hover(function() {
                                $('.btn-avt').fadeIn();
                            });
                        }
                    }
                });
            });
             $('#submit-file').click();           
        }
    });
    $('.avatar img').hover(function() {
        $('.btn-avt').fadeIn();
    });
    $(document).ajaxStart(function() {
        $('.loader').fadeIn();
    });
    $(document).ajaxStop(function() {
        $('.loader').fadeOut();
    });
    
    
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {

        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        console.log(element);
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});
