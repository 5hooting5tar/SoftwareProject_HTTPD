<?php
 
        session_start();

		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		$connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook') or die("로그인 실행 실패 | DB에 연결할 수 없습니다!");
 
        //입력 받은 id와 password
        $id=$_GET['id'];
        $pw=$_GET['pw'];

		if(empty($id) || empty($pw)) {
		echo "<script>
			alert('아이디 혹은 비밀번호가 잘못되었습니다'); 
			history.back();
			</script>";
		exit;
		}	
 
        //아이디가 있는지 검사
        $query = "select * from member where id='$id'";
        $result = $connect->query($query);
 
 
        //아이디가 있다면 비밀번호 검사
        if(mysqli_num_rows($result)==1) {
 
                $row=mysqli_fetch_assoc($result);
 
                //비밀번호가 맞다면 세션 생성
                	if($row['pw']==$pw){
                  	$_SESSION['userid'] = $id;
						$_SESSION['permit'] = $row['permit'];
						if(isset($_SESSION['userid'])) { ?>
							<script>
								location.replace("../guestbook.php");
							</script>
<?php					} else {
								echo "로그인에 실패했습니다";
						 }
					} else { ?>
						<script>
							alert("아이디 혹은 비밀번호가 잘못되었습니다");
							history.back();
						</script>
<?php				}
		} else { ?>
			<script>
				alert("아이디 혹은 비밀번호가 잘못되었습니다");
				history.back();
			</script>
<?php } ?>
