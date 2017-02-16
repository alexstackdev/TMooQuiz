var progressbar = $('#progressbar');
var percent = $('#percent');
var result = $('#result');
var percentValue = "0%";

// bắt sự kiện open file từ client
$('#formUploadImg').ajaxForm({
      // Do something before uploading
      beforeUpload: function() {
        result.empty();
        percentValue = "0%";
        progressbar.width = percentValue;
        percent.html(percentValue);
      },
       
      // Do somthing while uploading
      uploadProgress: function(event, position, total, percentComplete) {
        var percentValue = percentComplete + '%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Do something while uploading file finish
      success: function() {
        var percentValue = '100%';
        progressbar.width(percentValue);
        percent.html(percentValue);
      },
       
      // Add response text to div #result when uploading complete
      complete: function(xhr) {
        $('#formUploadImg .alert').removeClass('hidden');
        $('#formUploadImg .alert').html(xhr.responseText);
        setTimeout(reload, 2000);
      }
});
function reload($url='') {				
	location.href = $url;
}

// Bắt xự kiện xóa ảnh
function delete_img($id){
    $url = $('.list-img').attr('data-url');
    $quiz_id = $('h1.title').attr('data-id');
    var $confirm = confirm('Bạn có muốn xóa ảnh không ?');
        if ($confirm) {
            // Gán các giá trị trong form tạo note vào các biến
            $title_img = $('#img-'+$id+'').text();
            $url_img = 'uploads/img/'+$quiz_id+'/'+$title_img;
            // Thực thi gửi dữ liệu bằng Ajax
            $.ajax({
                url : $url, // Đường dẫn file nhận dữ liệu
                type : 'POST', // Phương thức gửi dữ liệu
                // Các dữ liệu
                data : {
                    url_img : $url_img,
                // Thực thi khi gửi dữ liệu thành công
                }, success : function(data) {
                    console.log(data);
                    location.href = '';
                }
            });
        }
}