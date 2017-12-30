var choosed;
var section;
var question;
var quiz_choosed;
var quiz_correct;
var quiz_scores;
var time_move;

$(function() {

	getFirtQuestion();/*
	$(document).keydown(function(e) {
			if (e.keyCode == '39') {
				//$('#btn-next').click();
				nextQuestion();
			}
			if (e.keyCode == '37') {
				//$('#btn-prev').click();
				reAnswer();
			}
	})*/
});

function getFirtQuestion() {
	if (!quiz) {
		return false;
	}

	choosed = [];
	section = 0;
	question = 0;
	quiz_choosed = 0;
	quiz_correct = 0;
	quiz_scores = 0;
	time_move = null;

	var html = '';
	for (var i in quiz) {

		//Tạo mảng clone lưu câu hỏi đã làm
		choosed[i] = [];

		//Nếu không có tên phần
		if (quiz[i]['section'].length == 0) {
			quiz[i]['section'] = 'Phần ' + (parseInt(i) + 1);
		}

		//Tạo mã html hiển thị phần
		html += '<li id="section_' + i + '" onclick="return moveSection(' + i + ')">';
		html += '<a href="">' + quiz[i]['section'] + ' (' + quiz[i]['array_question'].length + ' câu)</a></li>';
	}
	html += '<li id="quiz_catalog" class="visible-xs" onclick="return showCatalog()"><a href="">Mục lục</a></li>';
	$('#section_section').html(html);

	// Kích hoạt tab đầu tiên
	$('#section_0').addClass('active');

	html = '';
	for (var i in quiz[0]['array_question']) {
		html += '<button id="bc_' + i + '" class="btn-catalog btn btn-default" ';
		html += 'onclick="return moveQuestion(' + 0 + ', ' + i + ')">';
		html += (parseInt(i) + 1) + '</button>';
	}
	$('#section_catalog').html(html);

	$('#quiz_correct').text(quiz_correct);
	$('#quiz_choosed').text(quiz_choosed);
	$('#quiz_scores').text(quiz_scores.toFixed(2)+'%');
	$('#quiz_scores').removeClass('label-success');
	$('#quiz_scores').removeClass('label-warning');
	$('#quiz_scores').addClass('label-danger');

	//Lấy câu hỏi đầu tiên
	moveQuestion(0, 0);
}

function reAnswer() {
	var tmp = quiz;
	for (var i in quiz) {
		var tmp2 = [];
		for (var j in quiz[i]['array_question']) {
			if ((choosed[i][j] == null) || (choosed[i][j][0] != choosed[i][j][1])) {
				tmp2.push(quiz[i]['array_question'][j]);
			}
		}
		tmp[i]['array_question'] = tmp2;
	}
	quiz = tmp;
	getFirtQuestion();
	return false;
}

function previousQuestion() {
	if (question == 0 && section > 0) {
		moveSection(section - 1);
		moveQuestion(section, quiz[section]['array_question'].length - 1);
	} else {
		moveQuestion(section, question - 1);
	}
	return false;
}

function nextQuestion() {
	if (question == quiz[section]['array_question'].length - 1 && section == quiz.length -1) {
		return false;
	}
	if (question == quiz[section]['array_question'].length - 1 && section < quiz.length ) {
		moveSection(section + 1);
		
	} else if (question < quiz[section]['array_question'].length) {
		moveQuestion(section, question + 1);
	}
	return false;
}

function showCatalog() {
	var html = '';
	for (var i in quiz) {
		html += '<p><strong>' + quiz[i]['section'] + '</strong></p>';
		for (var j in quiz[i]['array_question']) {
			var tmp = 'btn-default';
			if (choosed[i][j] != null) {
				tmp = choosed[i][j][0] == choosed[i][j][1] ? 'btn-success' : 'btn-danger';
			}
			html += '<button class="btn-catalog btn ' + tmp + '" ';
			html += 'onclick="return moveQuestion(' + i + ', ' + j + ')">';
			html += (parseInt(j) + 1) + '</button>';
		}
		html += '<hr>';
	}
	$('#question_question').html(html);
	$('#section_' + section).removeClass('active');
	$('#quiz_catalog').addClass('active');
	return false;
}

function moveSection(s) {
	var html = '';
	for (var i in quiz[s]['array_question']) {
		var tmp = 'btn-default';
		if (choosed[s][i] != null) {
			tmp = choosed[s][i][0] == choosed[s][i][1] ? 'btn-success' : 'btn-danger';
		}
		html += '<button id="bc_' + i + '" class="btn-catalog btn ' + tmp + '" ';
		html += 'onclick="return moveQuestion(' + s + ', ' + i + ')">';
		html += (parseInt(i) + 1) + '</button>';
	}
	$('#section_catalog').html(html);
	moveQuestion(s, 0);
	return false;
}

function moveQuestion(s, q) {
	if (s >= 0 && s < quiz.length && q >= 0 && q < quiz[s]['array_question'].length) {
		$('#quiz_catalog').removeClass('active');
		$('#section_' + section).removeClass('active');
		$('#section_' + s).addClass('active');
		$('.btn-catalog').removeClass('btn-primary');
		$('#bc_'+q+'').addClass('btn-primary');
		//Lấy câu hỏi
		var html = '<p class="question"><strong>' + quiz[s]['array_question'][q]['question'] + '</strong></p>';

		//Lấy hình ảnh
		if (quiz[s]['array_question'][q]['image'].length > 0) {
			html += '<img src="'+baseUrl+'uploads/img/' + quiz_id + '/' + quiz[s]['array_question'][q]['image'] + '" ';
			html += 'class="img-responsive" alt="' + quiz[s]['array_question'][q]['image'] + '">';
		}
		html += '<br>';

		//Lấy đáp án
		for (var i in quiz[s]['array_question'][q]['array_answer']) {
			html += '<p id="answer_' + i + '" class="answer" onclick="clickAnswer(' + i + ')">';
			html += '<span class="glyphicon glyphicon-ok-circle"></span> ';
			html += quiz[s]['array_question'][q]['array_answer'][i]['answer'] + '</p>';
		}

		//Hiển thị câu
		$('#question_question').html(html);
		section = s;
		question = q;
		if (choosed[section][question] != null) {
			clickAnswer(choosed[section][question]);
		}
		clearTimeout(time_move);
	}
	return false;
}
function clickAnswer(a) {
	if (choosed[section][question] == null) {
		if (quiz[section]['array_question'][question]['array_answer'][a]['correct'] == 1) {
			$('#answer_' + a).addClass('true-color');
			$('#bc_' + question).addClass('true-color');
			grading(true);
			choosed[section][question] = [a, a];
		} else {
			$('#answer_' + a).addClass('false-color');
			for (var i in quiz[section]['array_question'][question]['array_answer']) {
				if (quiz[section]['array_question'][question]['array_answer'][i]['correct'] == 1) {
					$('#answer_' + i).addClass('true-color');
					$('#bc_' + question).addClass('false-color');
					choosed[section][question] = [a, i];
				}
			}
			grading(false);
		}

		// Tự chuyển câu trong 1s
		var time_next = 2;
		if (time_next >= 0) {
			time_move = setTimeout(function() {
				nextQuestion();
			}, time_next * 1000);
		}
	} else {
		if (choosed[section][question][0] == choosed[section][question][1]) {
			$('#answer_' + choosed[section][question][0]).addClass('true-color');
		} else {
			$('#answer_' + choosed[section][question][0]).addClass('false-color');
			$('#answer_' + choosed[section][question][1]).addClass('true-color');
		}
	}
}

function grading(c) {
	quiz_choosed++;
	if (c) {
		quiz_correct++;
	}
	quiz_scores = quiz_correct / quiz_choosed * 100;
	$('#quiz_correct').text(quiz_correct);
	$('#quiz_choosed').text(quiz_choosed);
	$('#quiz_scores').text(quiz_scores.toFixed(2)+'%');
	if (quiz_scores >= 80) {
		$('#quiz_scores').removeClass('label-danger');
		$('#quiz_scores').removeClass('label-warning');
		$('#quiz_scores').addClass('label-success');
	} else if (quiz_scores < 50) {
		$('#quiz_scores').removeClass('label-success');
		$('#quiz_scores').removeClass('label-warning');
		$('#quiz_scores').addClass('label-danger');
	} else {
		$('#quiz_scores').removeClass('label-danger');
		$('#quiz_scores').removeClass('label-success');
		$('#quiz_scores').addClass('label-warning');
	}
}