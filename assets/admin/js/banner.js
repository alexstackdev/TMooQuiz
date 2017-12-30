// Bắt sự kiện khi click vào nút tạo
$('#submit_create_banner').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $url = $('#formCreateBanner').attr('data-url');
    $banner_title = $('#title_banner').val();
    $link_img = $('#link_img').val();
    $link_banner = $('#link_banner').val();
    $deadline = $('#deadline').val();
    $position = $('.position').val();
    banner_ajax_creat();
});

function banner_ajax_creat(){
    // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : $url, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                banner_title : $banner_title,
                link_img : $link_img,
                link_banner : $link_banner,
                deadline : $deadline,
                position : $position
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formCreateBanner .alert').removeClass('hidden');
                $('#formCreateBanner .alert').html(data);
                $('.rs').click();
                location.href = 'list';
            }
        });
}

// edit banner
// Bắt sự kiện khi click vào nút tạo
$('#submit_edit_banner').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $banner_id = $('#formEditBanner').attr('data-id');
    $url = $('#formEditBanner').attr('data-url');
    $banner_title = $('#title_banner').val();
    $link_img = $('#link_img').val();
    $link_banner = $('#link_banner').val();
    $deadline = $('#deadline').val();
    $position = $('.position').val();
    banner_ajax_edit();
});

function banner_ajax_edit(){
    // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : $url, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                id : $banner_id,
                banner_title : $banner_title,
                link_img : $link_img,
                link_banner : $link_banner,
                deadline : $deadline,
                position : $position
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formEditBanner .alert').removeClass('hidden');
                $('#formEditBanner .alert').html(data);
            }
        });
}

// delete banner
function delete_banner($id){
    $url = $('h1.title').attr('data-url');
    var $check = confirm('Bạn chắc chắn muốn xóa đề này không? Nhấn Ok để xóa.');
    $item = $('#item-'+$id+'');
    if ($check) {
        $.ajax({
            url : $url, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                id : $id               
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {           
                console.log(data);
                $item.remove();
            }
        });
    }
}