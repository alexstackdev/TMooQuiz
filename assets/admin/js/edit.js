// Bắt sự kiện khi click vào nút Sửa
$url = $('#formEditQuiz').attr('data-url');
$quiz_id = $('#formEditQuiz').attr('data-id');
$old_title_quiz = $('#title_edit_quiz').val();
$old_note_quiz = $('#note_edit_quiz').val();
$old_category = $('select#category').val();
$old_content_quiz = $('#body_edit_quiz').val();
$old_stt = $('select#status').val();
$('#submit_edit_quiz').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $title_edit_quiz = $('#title_edit_quiz').val();
    $note_edit_quiz = $('#note_edit_quiz').val();
    $category = $('select#category').val();
    $content_edit_quiz = $('#body_edit_quiz').val();
    $stt = $('select#status').val();
 
    // Nếu một trong các biến này rỗng
    if ($title_edit_quiz == '' || $note_edit_quiz == '' || $content_edit_quiz == '')
    {
        // Hiển thị thông báo lỗi
        $('#formEditQuiz .alert').removeClass('hidden');
        $('#formEditQuiz .alert').html('Vui lòng nhập đầy đủ thông tin!.');
    }
    // Nếu dư liệu chưa được chỉnh sửa
    else if ($old_title_quiz == $title_edit_quiz 
        && $old_content_quiz == $content_edit_quiz 
        && $old_note_quiz == $note_edit_quiz 
        && $old_category == $category
        && $old_stt == $stt) 
    {
        // Hiển thị thông báo lỗi
        $('#formEditQuiz .alert').removeClass('hidden');
        $('#formEditQuiz .alert').html('Vui lòng chỉnh sửa thông tin.');
    }
    // Ngược lại
    else
    {
        // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : $url, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                quiz_id : $quiz_id,
                category : $category,
                title : $title_edit_quiz,
                note : $note_edit_quiz,
                content_quiz : $content_edit_quiz,
                stt : $stt
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formEditQuiz .alert').removeClass('hidden');
                $('#formEditQuiz .alert').html(data);
            }
        });
    }
});