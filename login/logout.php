<?php
// 로그아웃시 세션 없앰
session_start();
session_destroy();
setcookie("$_SESSION[id]","",time()-3600);
echo '<script>alert("Logout")</script>';
header("Refresh:2; url=./index.php");
?>
