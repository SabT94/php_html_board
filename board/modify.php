<?php
// 게시글 수정페이지
  require_once("../connect.php");
  $no = $_GET['no'];
  $sql = "select * from board where no=$no";
  $res=mysqli_query($connect,$sql) or die("Select Query Error");
  $row = mysqli_fetch_assoc($res);

?>

<h4><strong>View Table</strong></h4>
<table border="1">
<head>
<tr>
  <th><?php echo $row['date'];?></th>
  <th><?php echo $row['hit'];?></th>
</tr>
</head>
<body>
<tr>
<!-- 원래있던 title과 content를 value값으로 받고 input할 수 있게 한 후에 post방식으로 modify_update.php에 보냄 -->
  <form method="post" action="./modify_update.php">
    <input name="title" type="text" value=<?php echo $row['title'];?>>
    <input name="content" type="text" value=<?php echo $row['content']; ?> >
    <input name="no" type="hidden" value=<?php echo $no; ?> >
    <th colspan=4><br><p align="right"><button type="submit" onclick="location.href='./modify_update.php'">submit</button></p></th>
</form>
<!-- post방식으로 delete.php에 보냄 -->
<form method="post" action="./delete.php">
  <input name="no" type="hidden" value=<?php echo $no;?> >
  <th colspan=4><br><p align="right"><button type="submit" onclick="location.href='./delete.php'">delete</button></p></th>
</form>
  <th colspan=4><br><p align="right"><button type="button" onclick="location.href='./list.php'">List</button></p></th>
</tr>
</body>
</table>
