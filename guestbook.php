<!DOCTYPE html>
<html lang="ko">
<?php 	session_start();
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);
	$connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook') or die ("DB에 연결할 수 없습니다!"); ?>
<head>
    <meta charset="utf-8">
    <title>GuestBook | WHITECAT</title>
    <link rel="stylesheet" type="text/css" href="css/guestbook.css">
</head>
<style>
a {text-decoration: none; }
a:link { color: white; }
a:active { color : purple; }
}
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
            <h2 align="center">방명록</h2>
				
            <table class="board-table" align="center">
                <thead>
                    <tr>
                        <td width="50" align="center">번호</td>
                        <td width="500" align="center">제목</td>
                        <td width="100" align="center">작성자</td>
                        <td width="175" align="center">날짜</td>
                        <td width="75" align="center">조회수</td>
                    </tr>
                </thead>
                <tbody>
				<?php
                    $query ="select * from board order by number desc";
                    $result = $connect->query($query);
                    $total = mysqli_num_rows($result);

                		if(isset($_SESSION['userid'])) { ?>
							<div style="text-align: right;">
                			<?php echo $_SESSION['userid'];?> 님&emsp; 
							<button class="glass-btn" onclick="location.href='/php/logout_action.php'">로그아웃</button></div>
                			<br/>
				<?php
				} else {
				?>			<div style="text-align: right;">
							<button class="glass-btn" onclick="location.href='./guestbook_login.php'">로그인</button></div>
                        	<br/>
        		<?php  }
				
                    while($rows = mysqli_fetch_assoc($result)){
                        if($total%2==0){
                            echo '<tr class="even">';
                        } else {
                            echo '<tr>';
                        }
                        echo '<td width="50" align="center">'.$total.'</td>';
                        echo '<td width="500" align="center"><a href="guestbook_view.php?number='.$rows['number'].'">'.$rows['title'].'</a></td>';
                        echo '<td width="100" align="center">'.$rows['id'].'</td>';
                        echo '<td width="200" align="center">'.$rows['date'].'</td>';
                        echo '<td width="50" align="center">'.$rows['hit'].'</td>';
                        echo '</tr>';
                        $total--;
                    }
                ?>
                </tbody>
            </table>
            <div class="text">
                <button class="glass-btn" onclick="location.href='./guestbook_write.php'">글쓰기</button>
            </div>
        </div>
    </main>
</body>
</html>
