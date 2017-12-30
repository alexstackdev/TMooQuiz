// window.addEventListener('load', function() {
//       var outputElement = document.getElementById('output');
//       navigator.serviceWorker.register('sw.js', { scope: './' })
//         .then(function(r) {
//           console.log('registered service worker');
//         })
//         .catch(function(whut) {
//           console.error('uh oh... ');
//           console.error(whut);
//         });
       
//       window.addEventListener('beforeinstallprompt', function(e) {
//         outputElement.textContent = 'beforeinstallprompt Event fired';
//       });
// });

$(function(){

	showModal();
	showModal('showModal',0);
	showModal('menuShowModal',0);
	$('#activevip').click(function(){
		$check = confirm('Đồng ý gia hạn VIP ?');
		if ($check) {
			$('#submit_form_vip').click();
		}        
    });

    $('#showMessage').click(function() {
    	$url_mess = $(this).attr('data-url');
    	$check = $(this).children('#total-mess');
    	if ($check.html()) {
	    	$.ajax({
	            url : $url_mess, // Đường dẫn file nhận dữ liệu
	            type : 'POST', // Phương thức gửi dữ liệu
	            // Các dữ liệu
	            data : {
	            	message : 1
	            // Thực thi khi gửi dữ liệu thành công
	            }, success : function(data) {
	            	try{
	            		$data = $.parseJSON(data);
	            		$check.remove();
	            	} catch($e){
	            		alert('Tài khoản của bạn đã bị đăng nhập ở nơi khác !');
						location.href = '';
	            	}
	            	
	            }
	        })
	        .fail(function() {
				alert('Có lỗi xảy ra !');
				location.href = '';
			});
    	}
    });

    $icon_message = location.hash;
    console.log($($icon_message).children('.timeline-badge'));
    $($icon_message).children('.timeline-badge').removeClass('primary').addClass('timeline-active');
})

function showModal($ele = 'modalCard', $type = 1){
	$('.'+$ele+'').click(function() {
		$modal = $('#modalCard');
		$modal.remove('#modalCard');
		$url = $(this).attr('data-url');
		$capt = $('#captcha').val();
	    $re_capt = $('#re_captcha').val();
	    ajaxLoading();
		$.ajax({
	        url : $url, // Đường dẫn file nhận dữ liệu
	        type : 'POST', // Phương thức gửi dữ liệu
	        // Các dữ liệu
	        data : {
	        	is_use : $type
	        // Thực thi khi gửi dữ liệu thành công
	        }, success : function(data) {
	            $('header').append(data);	            
	            $('#modalCard').modal('show');	            	            
	        }
	    })
	    .fail(function() {
			alert('Có lỗi xảy ra !');
			location.href = '';
		});
	    return false;
	});	
}

function CardPay(){
	$seri = $('#txtSeri').val();
	$code = $('#txtCode').val();
	$lstTelco = $('#lstTelco').val();
	$capt = $('#captcha').val();
    $re_capt = $('#re_captcha').val();
    $check = $('#submit_card_pay').attr('data-id');  
    if ($seri != '' && $code != '' && $capt != '') {
    	$alert = $('#alert-card-pay');
    	if (!$check) {
    		$alert.removeClass('hidden');
    		$alert.addClass('alert-danger');
    		$alert.html('Vui lòng đăng nhập để thực hiện chức năng này !');
    		return false;
    	}
    	else if ($capt != $re_capt) {    		
    		$alert.removeClass('hidden');
    		$alert.addClass('alert-danger');
    		$alert.html('Mã captcha sai. Vui lòng nhập lại !');
    	}
    	else {
    		$url_card = $('#form-card-pay').attr('data-url');
    		$.ajax({
                url : $url_card, // Đường dẫn file nhận dữ liệu
                type : 'POST', // Phương thức gửi dữ liệu
                // Các dữ liệu
                data : {
                    seri : $seri,
                    code : $code,
                    lstTelco : $lstTelco
                // Thực thi khi gửi dữ liệu thành công
                }, success : function(data) {
                	try {
                		$data = $.parseJSON(data);
	                	if ($data.status != 00) {
	                		$alert.removeClass('hidden');
	                		$alert.removeClass('alert-danger');
				    		$alert.addClass('alert-card-error');
				    		$alert.html($data.description);

	                	} else {
	                		$alert.removeClass('hidden');
				    		$alert.removeClass('alert-danger');
				    		$alert.removeClass('alert-card-error');
				    		$alert.addClass('alert-primary');
				    		$alert.html($data.description);
				    		$('.current-balance').html($data.amount);
				    		$('.balance-panel').html($data.amount);
				    		$('#user-balance').html($data.amount);
				    		$balance = parseInt($data.amount)*1000;
				    		$('.btn-active-vip').attr('data-balance',$balance);
				    		$('.card-reset').click();
	                	}
                	}
                	catch($e){
                		alert('Tài khoản của bạn đã bị đăng nhập ở nơi khác !');
						location.href = '';
                	}
                	
                }
            })
            .fail(function() {
				alert('Có lỗi xảy ra !');
				location.href = '';
			});
    	}
    }
}

function active_vip(){
	$url_active = $('.btn-active-vip').attr('data-url');
	$amount = $('.current-balance').html();
	$amount = parseInt($amount)*1000;
	$alert = $('#alert-active-vip');
	if ($amount < 20000) {
		$alert.removeClass('hidden');
		$alert.addClass('alert-card-error');
		$alert.html('Số tiền của bạn không đủ để nâng cấp VIP !');
	} else {
		$.ajax({
            url : $url_active, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
            	is_active : 1,
            	is_form : 0
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
            	try{
            		$data = $.parseJSON(data);
	            	if ($data.code == 01) {
	            		location.href = $data.url;
	            	}
	            	else {
	            		$alert.removeClass('hidden');
	            		$alert.removeClass('alert-danger');
			    		$alert.addClass('alert-card-error');
			    		$alert.html($data.message);
	            	}
            	} catch($e){
            		alert('Tài khoản của bạn đã bị đăng nhập ở nơi khác !');
					location.href = '';
            	}
            	
            }
        })
        .fail(function() {
			alert('Có lỗi xảy ra !');
			location.href = '';
		});
	}
}

function ajaxLoading(){
	$(document).ajaxStart(function() {
        $('.loader').fadeIn();
    });
    $(document).ajaxStop(function() {
        $('.loader').fadeOut();
    });
}

function InfoUser($id){
	$url_user = $('.nav-quiz').attr('data-user');
	$modal = $('#modalUser');
	$modal.remove('#modalUser');
	ajaxLoading();
	$.ajax({
        url : $url_user, // Đường dẫn file nhận dữ liệu
        type : 'POST', // Phương thức gửi dữ liệu
        // Các dữ liệu
        data : {
        	user_id : $id
        // Thực thi khi gửi dữ liệu thành công
        }, success : function(data) {
            $('header').append(data);	            
            $('#modalUser').modal('show');	            	            
        }
    })
    .fail(function() {
		alert('Có lỗi xảy ra !');
		location.href = '';
	});
	return false;
}