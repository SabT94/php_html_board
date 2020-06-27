<?php
// 게시글 클릭시 보여주는 페이지
  require_once("../connect.php");
  $no = $_GET['no'];
  $sql = "update board set hit=hit+1 where no=$no";
  mysqli_query($connect,$sql) or die (mysqli_error($connect));
  $sql = "select * from board where no=$no";
  $res=mysqli_query($connect,$sql) or die("Select Query Error");
  $row = mysqli_fetch_assoc($res);
?>

<!-- 게시글 출력 페이지 -->
<h4><strong>View Table</strong></h4>
<table border="1">
<thead>
<tr>
  <th><?php echo $row['title'];?></th>
  <th><?php echo $row['date'];?></th>
  <th><?php echo $row['hit'];?></th>
</tr>
</thead>
<tbody>
<tr>
  <td><?php echo $row['content'];?></td>
</tr>
<tr>
  <th colspan=4><br><p align="right"><button type="button" onclick="location.href='./list.php'">List</button></p></th>
  <th colspan=4><br><p align="right"><button type="button" onclick="location.href='./modify.php?no=<?=$_GET['no']?>'">modify</button></p></th>
</tr>
</tbody>
</table>
