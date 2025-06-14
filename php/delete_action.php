<?php
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook') or die("게시글 삭제 실패 | DB에 연결할 수 없습니다!");

$number = isset($_GET['number']) ? (int)$_GET['number'] : 0;
$user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
$permit = isset($_SESSION['permit']) ? (int)$_SESSION['permit'] : 0;

if ($number <= 0 || empty($user_id)) { ?>
	<script>
	alert('로그인 후 다시 시도해주세요');
	history.back();
	</script>
<?php	exit;
}
$query = "SELECT id FROM board WHERE number = $number";
$result = $connect->query($query);

if ($result && $row = $result->fetch_assoc()) {
    if ($row['id'] !== $user_id && $permit !== 1) { ?>
		<script>
			alert('현재 글의 삭제 권한이 없습니다');
			history.back();
		</script>
<?php  exit;
	    }
} else { ?>
	<script>
		alert('게시글을 찾을 수 없습니다');
		history.back();
	</script>
<?php	exit;
}

// 삭제 쿼리 실행
$delete_query = "DELETE FROM board WHERE number = $number";
$delete_result = $connect->query($delete_query);

if ($delete_result) {
?>	<script>
		alert('게시글이 삭제되었습니다');
		location.replace("../guestbook.php");
	</script>
<?php } else { ?>
	<script>
		alert('게시글 삭제에 실패했습니다');
		history.back();
	</script>
<?php }
mysqli_close($connect);
?>
