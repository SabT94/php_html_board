<?php
  $connect=mysqli_connect('localhost','web_connect','123123123','web_board'); // db연동하는 페이지
  if(mysqli_connect_errno()) {
    echo "Failed to connect to mysql: ".mysqli_connect_error();
  }
?>
