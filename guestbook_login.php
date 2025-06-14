<!DOCTYPE html>
<html lang="ko">
<?php 	session_start();
		$connect = mysqli_connect('localhost', 'guestbook_db', 'neko1connection2', 'SM_guestbook') or die ("DB에 연결할 수 없습니다!"); ?>
<head>
    <meta charset="utf-8">
    <title>Log in | WHITECAT</title>
    <link rel="stylesheet" type="text/css" href="css/guestbook.css">
</head>
<style>
body, html {
  overflow-x: hidden;
  overflow-y: hidden;
  background-color: #1a1a1a;
}
a:link { color: white; }
a:visited { color: white; }
a:active { color: white; }
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
	<div class="glass-signin" align='center'>
		<a style="text-align: center;" onclick="history.back()">
			<img src="source/site_image/left_arrow.png" alt="back" class="arrow"></a>
			<h2 align="center">로그인</h2>

        <form method='get' action='php/login_action.php'>
		 <tr>
                <td bgcolor=white>
                <table class = "table2">
                        <tr>
                        <td>아이디</td>
                        <td><input name="id" type="text"></td>
                        </tr>
 						   <br>
                        <tr>
                        <td>비밀번호</td>
                        <td><input name="pw" type="password"></td>
                        </tr>
                        </table>
 
                        <h5 align="center"></h5>
							<input class="glass-btn" type="submit" value="로그인">
                        </center>
                </td>
                </tr>
        </form>
        <br>
		 <a id="join" href="./guestbook_signup.php"> 회원가입 </a>
        </div>
</main>
</html>

