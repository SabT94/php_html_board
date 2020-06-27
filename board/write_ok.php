<?php
// 게시글 작성 동작페이지
require_once("../connect.php");
$title=$_POST['title'];
$content=$_POST['content'];
$dir = "../upload/";
$file = $_FILES['file']['name'];
$file_hash = $date.$_FILES['file']['name'];
$file_hash = md5($file_hash);
$upfile = $dir.$file_hash;
$date=date('Y-m-d H:i:s');
$hit=0;
// title과 content가 없으면 에러출력
if($title==NULL || $content==NULL){
        echo "Uh..oh..Null or Filtering";
        header("Refresh:2; url=./write.php");
        exit;
}
// 파일 업로드 해주는 구문
if(is_uploaded_file($_FILES['file']['tmp_name'])){
      echo "hello<br>";
      if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile)){
      echo "upload error";
      exit;
      }
}
$sql="insert into board(title,content,date,hit,hash) values('$title', '$content','$date','$hit','$file_hash')";
$res=mysqli_query($connect,$sql) or die(mysqli_error($connect));
echo '<script>alert("Write OK")</script>';
header("Refresh:0; url=./list.php");
?>
