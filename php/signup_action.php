<?php
	session_start();	

	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);
	$connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook') or die("회원가입 실패 | DB에 연결할 수 없습니다!");
	date_default_timezone_set('Asia/Seoul');
 
	$id=$_GET['id'];
	$pw=$_GET['pw'];
	$email=$_GET['email'];
	$date = date('Y-m-d H:i:s');
	
	$check_query = "SELECT id FROM member WHERE id = '$id'";
	$check_result = $connect->query($check_query);

	if(empty($id) || empty($pw) || empty($email)) {
		echo "<script>
			alert('모든 항목을 입력해주세요!'); 
			history.back();
			</script>";
		exit;
	}
	if ($check_result->num_rows > 0) {
    	echo "<script>
    		alert('이미 존재하는 아이디입니다!');
    		history.back();
    		</script>";
    	exit;
	}	

	$query = "insert into member (id, pw, email, date, permit) values ('$id', '$pw', '$email', '$date', 0)";
	$result = $connect->query($query);
 
	if ($result) { ?>
	<script>
		alert('회원 가입이 완료되었습니다');
		location.replace("../guestbook_login.php");
	</script>
<?php 
	} else { ?>
	<script>
		alert("회원 가입에 실패했습니다");
	</script>
<?php
	}
	mysqli_close($connect);
?>
 
