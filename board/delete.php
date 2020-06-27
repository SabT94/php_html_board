<?php
// 게시글 삭제하는 페이지
require_once("../connect.php");
$no=$_POST['no'];
$sql = "delete from board where no=$no";
$result = mysqli_query($connect, $sql) or die("SQL 에러");
if($result == true) {
	echo "success";
	header('Location: ./list.php');
}
else {
	echo "Invalid Query";
}
?>
