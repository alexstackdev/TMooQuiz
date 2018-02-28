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