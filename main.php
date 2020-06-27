<?php
  session_start();
  if(!isset($_SESSION['userid'])){ // 세션 없으면 login페이지로
	   header('Location: ./login/login.html');
  }
  echo "<a href=./login/index.php>홈(로그인 성공)</a>";

  echo "<a href=./login/logout.php>로그아웃</a>";
?>
