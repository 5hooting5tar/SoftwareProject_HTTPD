<!DOCTYPE html>
<html lang="ko">
<?php			  session_start();
				  $connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook') or die ("DB에 연결할 수 없습니다!");
                $URL = "./guestbook.php";
                if(!isset($_SESSION['userid'])) { ?>
                <script>
                        alert("로그인이 필요합니다");
                        location.replace("./guestbook_login.php");
                </script>
<?php			  } ?>
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
			<h2 align="center">글쓰기</h2>

            <table class="board-table" align="center">
				  <form method = "get" action = "php/write_action.php">
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                        <tr>
                        <td width = "75px">제목</td>
                        <td><input type = text name = title size=30></td>
						   <td width = "75px">작성자</td>
							<td width = "200px"><input type = text value = '<?php echo $_SESSION['userid'];?>' readonly></input></td>
                        </tr>
                        <tr>
                        <td width = "75px">내용</td>
                        <td colspan = 3><textarea name = content cols=200% rows=15></textarea></td>
                        </tr>
                        </table>
 
                        <center>
                        <input class="glass-btn" type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        </form>
			</table>
</main>
</html>
