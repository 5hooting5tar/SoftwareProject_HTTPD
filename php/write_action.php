<?php
				  session_start();
				
				  ini_set('display_errors', '1');
		         ini_set('display_startup_errors', '1');
				  error_reporting(E_ALL);
                $connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook') or die("게시글 작성 실패 | DB에 연결할 수 없습니다!");
				  date_default_timezone_set('Asia/Seoul');
                
                $id = $_SESSION['userid'];              //Writer
                $title = $_GET['title'];                  //Title
                $content = $_GET['content'];              //Content
                $date = date('Y-m-d H:i:s');            //Date
 
				  if(empty($title) || empty($content)) {
    			  echo "<script>
						 alert('모든 항목을 입력해주세요!'); 
						 history.back();
						 </script>";
    			  exit;
				    }

                $query = "insert into board (number, title, content, date, hit, id) 
                          values(null, '$title', '$content', '$date', 0, '$id')";
                $result = $connect->query($query);

                if($result) {
?>                  <script>
                        alert("게시글이 등록되었습니다");
                        location.replace("../guestbook.php");
                    </script>
<?php           } else { ?>
						<script>
                        alert("게시글 작성에 실패했습니다");
						</script>
<?php			  }
                mysqli_close($connect);
?>
 

