<?php
session_start();
// 세션이 없으면 로그인 페이지와 회원가입 페이지 출력
if(!isset($_SESSION['userid'])){
  echo "<a href=/login/login.html>Login</a><br>";
  echo "<a href=/login/join.php>signUp</a><br>";
}
// 세션 있을시 쓰기, 목록, 로그아웃
else{
  echo "<a href=/login/logout.php>Logout</a><br>";
  echo "<a href=/board/write.php>Write</a><br>";
  echo "<a href=/board/list.php>List</a><br>";
}
?>
