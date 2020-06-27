<?php
  $ord_no_array = array('desc','asc'); // 정렬 방법 (내림차순, 오름차순)
  $ord_no_arrow = array('▼','▲'); // 정렬 구분용
  $ord_no = isset($_REQUEST['ord_no']) && in_array($_REQUEST['ord_no'],$ord_no_array) ? $_REQUEST['ord_no'] : $ord_no_array[0]; // 지정된 정렬이면 그 값, 아니면 기본 정렬(내림차순)
  $ord_no_key = array_search($ord_no,$ord_no_array); // 해당 키 찾기 (0, 1)
  $ord_no_rev = $ord_no_array[($ord_no_key+1)%2]; // 내림차순→오름차순, 오름차순→내림차순

  $ord_title_array = array('desc','asc'); // 정렬 방법 (내림차순, 오름차순)
  $ord_title_arrow = array('▼','▲'); // 정렬 구분용
  $ord_title = isset($_REQUEST['ord_title']) && in_array($_REQUEST['ord_title'],$ord_title_array) ? $_REQUEST['ord_title'] : $ord_title_array[0]; // 지정된 정렬이면 그 값, 아니면 기본 정렬(내림차순)
  $ord_title_key = array_search($ord_title,$ord_title_array); // 해당 키 찾기 (0, 1)
  $ord_title_rev = $ord_title_array[($ord_title_key+1)%2]; // 내림차순→오름차순, 오름차순→내림차순

  $ord_date_array = array('desc','asc'); // 정렬 방법 (내림차순, 오름차순)
  $ord_date_arrow = array('▼','▲'); // 정렬 구분용
  $ord_date = isset($_REQUEST['ord_date']) && in_array($_REQUEST['ord_date'],$ord_date_array) ? $_REQUEST['ord_date'] : $ord_date_array[0]; // 지정된 정렬이면 그 값, 아니면 기본 정렬(내림차순)
  $ord_date_key = array_search($ord_date,$ord_date_array); // 해당 키 찾기 (0, 1)
  $ord_date_rev = $ord_date_array[($ord_date_key+1)%2]; // 내림차순→오름차순, 오름차순→내림차순

  $ord_hit_array = array('desc','asc'); // 정렬 방법 (내림차순, 오름차순)
  $ord_hit_arrow = array('▼','▲'); // 정렬 구분용
  $ord_hit = isset($_REQUEST['ord_hit']) && in_array($_REQUEST['ord_hit'],$ord_hit_array) ? $_REQUEST['ord_hit'] : $ord_hit_array[0]; // 지정된 정렬이면 그 값, 아니면 기본 정렬(내림차순)
  $ord_hit_key = array_search($ord_hit,$ord_hit_array); // 해당 키 찾기 (0, 1)
  $ord_hit_rev = $ord_hit_array[($ord_hit_key+1)%2]; // 내림차순→오름차순, 오름차순→내림차순
  ?>

  <a href="?catgo=<?php echo $catgo ?>&search=<?php echo $search ?>&ord_no=<?php echo $ord_no_rev; ?>"><?php echo $catgo?><?php echo $ord_no_arrow[$ord_no_key]; ?></a>
  <a href="?catgo=<?php echo $catgo ?>&search=<?php echo $search ?>&ord_title=<?php echo $ord_title_rev; ?>"><?php echo $catgo?><?php echo $ord_title_arrow[$ord_title_key]; ?></a>
  <a href="?catgo=<?php echo $catgo ?>&search=<?php echo $search ?>&ord_date=<?php echo $ord_date_rev; ?>"><?php echo $catgo?><?php echo $ord_date_arrow[$ord_date_key]; ?></a>
  <a href="?catgo=<?php echo $catgo ?>&search=<?php echo $search ?>&ord_hit=<?php echo $ord_hit_rev; ?>"><?php echo $catgo?><?php echo $ord_hit_arrow[$ord_hit_key]; ?></a>
