<?php
  $ord_array = array('desc','asc'); // 정렬 방법 (내림차순, 오름차순)
  $ord_arrow = array('▼','▲'); // 정렬 구분용
  $ord = isset($_REQUEST['ord']) && in_array($_REQUEST['ord'],$ord_array) ? $_REQUEST['ord'] : $ord_array[0]; // 지정된 정렬이면 그 값, 아니면 기본 정렬(내림차순)
  $ord_key = array_search($ord,$ord_array); // 해당 키 찾기 (0, 1)
  $ord_rev = $ord_array[($ord_key+1)%2]; // 내림차순→오름차순, 오름차순→내림차순
  ?>

<?php
  require_once("../connect.php");
  $catgo=$_GET['catgo'];
  $search=$_GET['search'];

  if($search==""){ // 검색어가 empty일 때 예외처리를 해준다.
?>
    <script>
    alert("빈칸 안되요!");
    location.replace("./list.php");
  </script>
<?php
  }else{
    $search_word =$_REQUEST["search_word"];
  }
?>

<?php
// 카테고리와 검색내용을 받아온 걸 기반으로 검색함
$sql = "select * FROM board where $catgo LIKE '%$search%' order by $catgo $ord_rev";
$res=mysqli_query($connect,$sql) or die("Select Query Error");
?>

<div id="search_box">
    <form action="./search.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>

<!-- 오름차숙 내림차순 출력 -->
<a href="?catgo=<?php echo $catgo ?>&search=<?php echo $search ?>&ord=<?php echo $ord_rev; ?>"><?php echo $catgo?><?php echo $ord_arrow[$ord_key]; ?></a>

<table>
<!-- 검색한 내용들을 출력 -->
<?php
while($row = mysqli_fetch_array($res)){
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

</table>
<body>
  <th colspan=4><br><p align="left"><button type="button" onclick="location.href='./list.php'">List</button></p></th>
</body>
<ul>

	<!-- 페이지 출력 -->
<?php
  $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
  $total_page=((mysqli_fetch_row($result)[0])/10)+1;
  for($i=1;$i<$total_page;$i++){
    echo "<a href='./list.php?page=$i'\"> $i</a>";
    echo ' ';
  }
?>
</ul>
