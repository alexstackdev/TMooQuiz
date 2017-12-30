// Bắt sự kiện khi click vào nút tạo
$('#submit_create_quiz').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $url = $('#formCreateQuiz').attr('data-url');
    $user_id = $('#formCreateQuiz').attr('data-id');
    $title_create_quiz = $('#title_create_quiz').val();
    $body_create_quiz = $('#body_create_quiz').val();
    $note_create_quiz = $('#note_create_quiz').val();
    $stt = $('select#status').val();
    $category = $('select#category').val();
    $capt = $('#captcha').val();
    $re_capt = $('#re_captcha').val();
 
    // Nếu một trong các biến này rỗng
    if ($title_create_quiz == '' || $body_create_quiz == '' || $note_create_quiz =='')
    {
        // Hiển thị thông báo lỗi
        $('#formCreateQuiz .alert').removeClass('hidden');
        $('#formCreateQuiz .alert').html('Vui lòng điền đầy đủ thông tin.');
    }
    // Ngược lại
    else
    {
        if ($title_create_quiz.length > 50 ) {
            // Hiển thị thông báo lỗi
            $('#formCreateQuiz .alert').removeClass('hidden');
            $('#formCreateQuiz .alert').html('Tên đề thi quá dài. Vui lòng nhập lại');
        } else if ($note_create_quiz.length > 250) {
            // Hiển thị thông báo lỗi
            $('#formCreateQuiz .alert').removeClass('hidden');
            $('#formCreateQuiz .alert').html('Mô tả quá dài. Vui lòng nhập lại');
        } else if ($body_create_quiz.length < 50) {
            // Hiển thị thông báo lỗi
            $('#formCreateQuiz .alert').removeClass('hidden');
            $('#formCreateQuiz .alert').html('Nôi dung đề thi phải có 50 từ trở lên. Vui lòng nhập lại');
        }
        else if ($capt != $re_capt) {
            // Hiển thị thông báo lỗi
            $('#formCreateQuiz .alert').removeClass('hidden');
            $('#formCreateQuiz .alert').html('Mã captcha không đúng. Vui lòng nhập lại');
        }
        else 
        {
            load_ajax_creat($url);
        }
    }
});

$('#preview_quiz').click(function() {
    /* Act on the event */
    // Gán các giá trị trong form tạo note vào các biến
    $url = $(this).attr('data-url');
    $user_id = $('#formCreateQuiz').attr('data-id');
    $title_create_quiz = $('#title_create_quiz').val();
    $body_create_quiz = $('#body_create_quiz').val();
    $note_create_quiz = $('#note_create_quiz').val();
    $stt = $('select#status').val();
    $category = $('select#category').val();
    $capt = $('#captcha').val();
    $re_capt = $('#re_captcha').val();
 
    // Nếu một trong các biến này rỗng
    if ($title_create_quiz == '' || $body_create_quiz == '' )
    {
        // Hiển thị thông báo lỗi
        $('#formCreateQuiz .alert').removeClass('hidden');
        $('#formCreateQuiz .alert').html('Vui lòng điền đầy đủ thông tin.');
    }
    // Ngược lại
    else
    {
        if ($title_create_quiz.length > 50 ) {
            // Hiển thị thông báo lỗi
            $('#formCreateQuiz .alert').removeClass('hidden');
            $('#formCreateQuiz .alert').html('Tên đề thi quá dài. Vui lòng nhập lại');
        } else if ($note_create_quiz.length > 250) {
            // Hiển thị thông báo lỗi
            $('#formCreateQuiz .alert').removeClass('hidden');
            $('#formCreateQuiz .alert').html('Mô tả quá dài. Vui lòng nhập lại');
        } else if ($body_create_quiz.length < 10) {
            // Hiển thị thông báo lỗi
            $('#formCreateQuiz .alert').removeClass('hidden');
            $('#formCreateQuiz .alert').html('Nôi dung đề thi phải có 10 từ trở lên. Vui lòng nhập lại');
        }
        else 
        {
            $.ajax({
                url : $url, // Đường dẫn file nhận dữ liệu
                type : 'POST', // Phương thức gửi dữ liệu
                // Các dữ liệu
                data : {
                    user_id : $user_id,
                    title_quiz : $title_create_quiz,
                    body_quiz : $body_create_quiz,
                    note_quiz : $note_create_quiz,
                    category : $category,
                    stt : $stt
                // Thực thi khi gửi dữ liệu thành công
                }, success : function(data) {
                    $('#modal-preview .modal-body').html(data);
                    $('#modal-preview').modal('show');
                }
            });
        }
    }
});

function load_ajax_creat(url){
    // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : url, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                user_id : $user_id,
                title_quiz : $title_create_quiz,
                body_quiz : $body_create_quiz,
                note_quiz : $note_create_quiz,
                category : $category,
                stt : $stt
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formCreateQuiz .alert').removeClass('hidden');
                $('#formCreateQuiz .alert').html(data);
                $('.rs').click();
                //console.log(data);
            }
        });
}

function example(btn,example){
    $title = $('#'+btn+'').html();
    $content = $('#'+example+'').val();
    $('#title_create_quiz').val($title);
    $('#body_create_quiz').val($content);
    $('#preview_quiz').click();
}