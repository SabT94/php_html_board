<?php
	session_start();
 	require_once("../connect.php");
 		// 입력받은 값들을 GET방식으로 불러옴
        $id=$_GET['id'];
        $pw=password_hash($_GET['pw'], PASSWORD_DEFAULT); // pw암호화 해서 저장
        $email=$_GET['email'];
        $date = date('Y-m-d H:i:s');
        // id없을시 에러 출력
        if($id==""){
          ?>
          <script>
          alert("빈칸 안되요!");
          location.replace("./join.php");
        </script>
        <?php
      }
      // 쿼리문 전달
      $sql = "SELECT * FROM user WHERE id='".$_GET['id']."'";
      $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
      $count = mysqli_num_rows($result);
      if($count==0){
        $sql = "insert into user (id, pw, email, date) values ('$id', '$pw', '$email', '$date')";
        $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
        if($result) {
          ?>
          <script>
          alert('가입 되었습니다.');
          location.replace("./login.html");
        </script>
      <?php
    }
  }else{
    ?>
    <script>
    alert("fail");
    location.replace("./join.php");
  </script>
  <?php
}
        mysqli_close($connect);
?>
