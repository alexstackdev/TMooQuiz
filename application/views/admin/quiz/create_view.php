<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Tạo đề thi mới</span></h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form method="POST" onsubmit="return false;" id="formCreateQuiz" data-id="<?php echo $this->session->user_id; ?>" data-url="<?=base_url()?>admin/create/insert">
                    <div class="form-group">
                        <label>Tên đề thi</label>
                        <input type="text" class="form-control" id="title_create_quiz" placeholder="Nhập tên đề thi">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" id="note_create_quiz" rows="3" placeholder="Mô tả ngắn đề thi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chọn chuyên mục</label>
                        <select id="category" class="col-md-6 col-sm-6 col-xs-12">
                        	<?php foreach ($cat as $key => $item): ?>
                        		<option><?php echo $item->category; ?></option>
                        	<?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <div>
                        <a data-toggle="modal" href='#modal-id'>Click để xem hướng dẫn cấu trúc đề</a>
                        <div class="example">
                            <button type="button" class="btn btn-danger btn-sm" id="ex1" onclick="example('ex1','ex1-content')">Ví dụ 1</button>
                            <button type="button" class="btn btn-danger btn-sm" id="ex2" onclick="example('ex2','ex2-content')">Ví dụ 2</button>
                            <button type="button" class="btn btn-danger btn-sm" id="ex3" onclick="example('ex3','ex3-content')">Ví dụ 3</button>
                        </div>
                        </div>
                        <textarea class="form-control" id="body_create_quiz" rows="18" placeholder="Nhập các câu hỏi của đề thi. Lưu ý nhập đúng cấu trúc đề !"></textarea>
                    </div>                    
                    <label>Nhập mã Captcha</label>
                    <div class="form-group">                                            
                        <div class="img-captcha pull-left">                        
                            <?php echo $captcha['image'];?>
                        </div>
                        <input type="text" class="form-control input-captcha" id="captcha" autocomplete="off" placeholder="Nhập mã captcha">
                        <input type="hidden"  id="re_captcha" class="show-re-captcha" value="<?=$captcha['word'];?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select id="status" class="col-md-3 col-sm-6 col-xs-12" style="display: block;float: none !important;height: 30px;">
                            <option value="2">Không công khai</option>                 
                            <option value="1">Công khai</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="submit_create_quiz"><i class="fa fa-check-square-o"></i> Ok</button>
                    <?php if ($data_user['vip'] != 1): ?>
                        <?php $class = 'hidden'; ?>
                        <button class="btn btn-success modalCard" data-url="<?=base_url()?>index/card_view"  style="margin-bottom: 10px;"><i class="fa fa-eye"></i> Preview</button> 
                    <?php else: ?>
                        <?php $class = null; ?>
                    <?php endif ?> 
                    <button class="btn btn-success <?php echo $class; ?>" id="preview_quiz" style="margin-bottom: 10px;" data-url="<?=base_url()?>admin/create/preview"><i class="fa fa-eye"></i> Preview</button>                   
                    <input type="reset" class="rs hidden" value="">
                     <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>
<?php if ($data_user['vip'] != 1) {
    $this->mcode->set_li_active('li-2');
} ?>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cấu trúc đề</h4>
            </div>
            <div class="modal-body">
                <p>- Mỗi câu hỏi cách nhau 1 hoặc nhiều dòng.</p>
                <p>- 1 câu hỏi chỉ có 1 đáp án duy nhất.</p>
                <p>- Đáp án đúng là đáp án có dấu * đằng trước.</p>
                <p>- Nếu câu hỏi có ảnh thì để tên ảnh ở ngay cuối câu hỏi</p>
                <p>- Nếu chia nhiều phần thì sử dụng : 'Tên phần </p>
                <p>- Nếu cấu trúc sai sẽ không hiển thị</p>
                <p>- Xem ví dụ sau :</p>
                <ul>
                    <li>'Phần A</li>
                    <li>Câu 1 : Nội dung câu hỏi <?php echo htmlentities('<abc.jpg>'); ?></li>
                    <li>Nội dung đáp án 1</li>
                    <li>*Nội dung đáp án 2</li>
                    <li>Nội dung đáp án 3</li>
                    <li>Nội dung đáp án 4</li>
                </ul>
                <ul>
                    <li>Câu 2 : Nội dung câu hỏi</li>
                    <li>*Nội dung đáp án 1</li>
                    <li>Nội dung đáp án 2</li>
                    <li>Nội dung đáp án 3</li>
                    <li>Nội dung đáp án 4</li>
                </ul>
                <ul>
                    <li>'Phần B</li>
                    <li>Câu 3 : Nội dung câu hỏi</li>
                    <li>Nội dung đáp án 1</li>
                    <li>Nội dung đáp án 2</li>
                    <li>*Nội dung đáp án 3</li>
                </ul>
                <ul>
                    <li>Câu 4 : Nội dung câu hỏi</li>
                    <li>Nội dung đáp án 1</li>
                    <li>Nội dung đáp án 2</li>
                    <li>Nội dung đáp án 3</li>
                    <li>Nội dung đáp án 4</li>                    
                    <li>*Nội dung đáp án 5</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-preview">
    <div class="modal-dialog preview-content">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-eye"></i> Xem trước</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<textarea id="ex1-content" class="hidden">
TITL: Đây là ví dụ cơ bản
COMP: Admin
NOTE: Ví dụ 2 hướng dẫn chèn ảnh
NOTE: Ví dụ 3 sử dụng thẻ </br> để xuống dòng

'Phần 1

1. Khái niệm dữ liệu là?
*a. Dữ liệu là đối tượng mang thông tin. 
b. Dữ liệu là các tín hiệu vật lý và các số liệu. 
c. Dữ liệu là các kí hiệu, các hình ảnh. 

2. Dữ liệu trong máy tính có thể là? 
a. Là các số liệu hoặc tài liệu cho trước chưa được xử lý. 
b. Là các tín hiệu vật lý như sóng điện từ, ánh sáng, âm thanh. 
c. Là các hình ảnh. 
*d. Tất cả các đáp án đều đúng.

'Phần 2
3. Hãy nêu khái niệm thông tin? Chọn phương án đúng nhất. 
a. Thông tin là một khái niệm mô tả những gì đem lại sự hiểu biết cho con người. 
*b. Thông tin là một khái niệm mô tả những gì đem lại sự hiểu biết và nhận thức cho con người. Thông tin có thể được tạo ra, truyền đi, lưu trữ và xử lý. 
c. Thông tin có thể được tạo ra, truyền đi, lưu trữ và xử lý. 
d. Thông tin mang những dữ liệu quan trọng mang lại hiểu biết cho con người. 

 4. Trong quy trình xử lý thông tin, bước đầu tiên là bước nào? 
*a. Vào thông tin. 
b. Xử lý thông tin. 
c. Xuất và lưu trữ thông tin. 
d. Biểu diễn thông tin. 
</textarea>
<textarea id="ex2-content" class="hidden">
TITL: Đây là ví dụ có chèn ảnh
COMP: Admin
NOTE : Thêm tên của ảnh vào cuối câu hỏi như bên dưới , sau khi tạo đề hãy chuyển đến phần upload để upload ảnh
NOTE: Ví dụ 3 sử dụng thẻ </br> để xuống dòng

19. Hãy cho biết đối tượng số 3 trong hình là gì?<19.jpg>
*a. Shortcut (Biểu tượng lối tắt). 
b. Menu Start (Nút khởi động). 
c. Desktop (Màn hình nền). 
d. Quicklaunch (Thanh thao tác nhanh). 

20. Để truy lục và khởi động các chương trình ứng dụng ta sử dụng đối tượng nào?<19.jpg>
a. 2. 
b. 3. 
*c. 1. 
d. 4. . 
</textarea>
<textarea id="ex3-content" class="hidden">
COMP: Admin
NOTE : Theo cấu trúc thì nội dung câu hỏi chỉ nằm trên 1 dòng vậy nếu muốn xuống dòng chỉ cần thêm </br> hoặc [CR] tại vị trí cần xuống dòng.

Bài 1: Tình hình nhập, xuất, tồn vật liệu của Công ty X như sau:[CR]1-Tồn đầu tháng 4/N: Lượng 20 tấn- đơn giá 1 triệu/tấn[CR]2-Nghiệp vụ phát sinh trong tháng: [CR]-Ngày 1/4 nhập: lượng 40T, đơn giá 1,05 (đơn vị triệu đồng, chưa có thuế) [CR]*Ngày 2/4 xuất: lượng 30T[CR]-Ngày 3/4 nhập: lượng 40T, đơn giá 1,01[CR]*Ngày 4/4 xuất: lượng 40T[CR]-Ngày 5/4 nhập: lượng 40T, đơn giá 1,1[CR]*Ngày 6/4 xuất: lượng 40T[CR]-Ngày 7/4 nhập: lượng 40T, đơn giá 1,15[CR]*Ngày 8/4 xuất: lượng 50T[CR]-Ngày 9/4 nhập: lượng 50T, đơn giá 1,1[CR]*Ngày 10/4 xuất: lượng 50T[CR]3- Yêu cầu: tính trị giá vật liệu xuất kho theo 3 phương pháp NT-XT, NS-XT, BQGQ sau mỗi lần nhập:
30
31,5
30,9
*30,5

vd 2: Có Hàm đệ qui sau:</br>Function Factorial(n)[CR]Begin</br>if n=0 then Factorial:=1</br>else Factorial := n*Factorial(n-1);</br>End; </br>Dòng lệnh "if n=0 then Factorial:=1" là:
*Điều kiện dừng đệ quy
Điều kiện không thực hiện đệ quy
Lặp vô hạn
Lặp 1 lần
</textarea>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/create.js"></script>