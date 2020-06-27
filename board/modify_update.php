<?php
// 게시글 수정 동작페이지
require_once("../connect.php");
// post로 no,title,content를 받아온다.
$no=$_POST['no'];
$title=$_POST['title'];
$content=$_POST['content'];
$date=date('Y-m-d H:i:s');
$hit=0;
// 쿼리문 전송
$sql = "update board set title='$title',content='$content', date='$date' where no='$no'";
$result = mysqli_query($connect, $sql) or die("SQL 에러");

if($result == true) {
	echo "success";
	header('Location: ./list.php');
}
else {
	echo "Invalid Query";
}
?>
