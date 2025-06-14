<!DOCTYPE html>
<html lang="ko">
<?php
	session_start();
	$connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook');
	$number = $_GET['number'];
	$hit = "update board set hit=hit+1 where number=$number";
	$connect->query($hit);
	$query = "select title, content, date, hit, id from board where number =$number";
	$result = $connect->query($query);
	$rows = mysqli_fetch_assoc($result);
?>
<head>
    <meta charset="utf-8">
    <title>GuestBook | WHITECAT</title>
    <link rel="stylesheet" type="text/css" href="css/guestbook.css">
</head>
</style>
<body>
  <div class="background"></div>
  <div class="overlay"></div>
  <header>
	<div class="header-gradient"></div>
    <a href="index.html">
    <img src="source/site_image/whitecat_logo.png" alt="WHITECAT logo" class="logo">
    </a>
    <nav>
      <a href="index.html" class="menu-btn">Home</a>
      <a href="about.html" class="menu-btn">About</a>
      <a href="guestbook.php" class="menu-btn">Guestbook</a>
<?php if(isset($_SESSION['userid'])) { ?>
		<a href="/php/logout_action.php" class="menu-btn">Logout</a>
<?php } else { ?>	
		<a href="./guestbook_login.php" class="menu-btn">Login</a>
<?php } ?>
    </nav>
  </header>
</body>
<main>
	<div class="glass-board">
           <a style="text-align: center;" onclick="history.back()">
			<img src="source/site_image/left_arrow.png" alt="back" class="arrow"></a>
			<h2 align="center">방명록</h2>

            <table class="board-table" align="center">
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                        <tr>
                        <td width = "50px">제목</td>
                        <td><input type = text value = '<?php echo $rows['title'];?>' readonly></input></td>
						   <td width = "50px">작성자</td>
							<td td width = "125px"><input type = text value = '<?php echo $rows['id'];?>' readonly></input></td>
							<td width = "50px">조회수</td>
							<td width = "100px"><input type = text value = '<?php echo $rows['hit'];?>' readonly></input></td>
                        </tr>
                        <tr>
                        <td width = "75px">내용</td>
                        <td colspan = 5><textarea cols=200% rows=15 readonly><?php echo $rows['content']?></textarea></td>
                        </tr>
                        </table>
 
                        <center>
                        <button class="glass-btn" onclick="location.href='./guestbook.php'">목록으로</button>
							&emsp;
						   <button class="glass-btn" onclick="location.href='php/delete_action.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
                        </center>
                </td>
                </tr>
        </table>
	</table>
</main>
</html>

        <table class="view_table" align=center>
        <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
        </tr>
        <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['id']?></td>
                <td class="view_hit">조회수</td>
                <td class="view_hit2"><?php echo $rows['hit']?></td>
        </tr>
 
 
        <tr>
				  
                <td colspan="4" class="view_content" valign="top">
					<textarea readonly><?php echo $rows['content']?></textarea>
                </td>
        </tr>
        </table>
 
 
        <!-- MODIFY & DELETE -->
        <div class="view_btn">
                <button class="view_btn1" onclick="location.href='./guestbook.php'">목록으로</button>
 
                <button class="view_btn1" onclick="location.href='php/delete_action.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
        </div>
 

