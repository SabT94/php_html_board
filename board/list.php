<!-- 게시글 목록 출력하는 페이지 -->
<?php
$ord_array = array('desc','asc'); // 정렬 방법 (내림차순, 오름차순)
$ord_arrow = array('▼','▲'); // 정렬 구분용
$ord = isset($_REQUEST['ord']) && in_array($_REQUEST['ord'],$ord_array) ? $_REQUEST['ord'] : $ord_array[0]; // 지정된 정렬이면 그 값, 아니면 기본 정렬(내림차순)
$ord_key = array_search($ord,$ord_array); // 해당 키 찾기 (0, 1)
$ord_rev = $ord_array[($ord_key+1)%2]; // 내림차순→오름차순, 오름차순→내림차순
?>

<?php
  require_once("../connect.php");
  if(!isset($_GET['page']) || $_GET['page']==NULL)
    $page=1;
  else{
    $page=$_GET['page'];
  }

?>
<table border="1">
  <thead>
  <tr>
  <th>No</th>
  <th>Title</th>
  <th>Date</th>
  <th>Hit</th>
  </tr>
  </thead>
  <tbody><tr>
<?php
// 한 페이지 10개씩 출력 하기위한 변수
  $before=10*($page-1);
// 카테고리에 따라 출력
  if($catgo==""){

  $sql="select * from board order by no $ord_rev limit $before,10";
}
else{
  $sql="select * from board order by $catgo $ord_rev limit $before,10";
}
  $res=mysqli_query($connect,$sql) or die("Error");
// 게시판 출력하는 페이지
  while($row=mysqli_fetch_assoc($res)){
    $tt=$row['title'];
    $str=substr($tt,0,42);
    $row['date']=explode(' ',$row['date'])[0];
    echo "<tr>";
    echo "<td>{$row['no']}</td>";
    echo "<td><a href=\"./view.php?no={$row['no']}\">$str</a></td>";
    echo "<td>{$row['date']}</td>";
    echo "<td>{$row['hit']}</td>";
    echo "</tr>";
  }
?>
</tbody>
</table>
<ul>
<?php
// 총 페이지 출력
  $sql="select count(*) from board";
  $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
  $total_page=((mysqli_fetch_row($result)[0])/10)+1;
  for($i=1;$i<$total_page;$i++){
    echo "<a href='./list.php?page=$i'\"> $i</a>";
    echo ' ';
  }
?>
</ul>
<br>
<button type="button"onclick="location.href='./write.php'">글쓰기</button></p>

<div id="search_box">
	<!-- get방식으로 search.php에 전송 -->
    <form action="./search.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
