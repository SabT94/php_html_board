<?php
  session_start();
  require_once("../connect.php"); // connect.php를 통해 연결을 시도

  //입력 받은 id와 password
  $id=$_GET['id'];
  $pw=$_GET['pw'];

  //아이디가 있는지 검사
  $sql = "select * from user where id='$id'";
  $result = mysqli_query($connect,$sql) or die(mysqli_error($connect));


  //아이디가 있다면 비밀번호 검사
  if(mysqli_num_rows($result)==1) {
    $row=mysqli_fetch_assoc($result);
    //비밀번호가 맞다면 세션 생성
    if(password_verify($pw, $row['pw'])){
      $_SESSION['userid']=$id;
      if(isset($_SESSION['userid'])){
        ?>
        <script>
        alert("로그인 되었습니다.");
        location.replace("/login/index.php");
      </script>
      <?php
    }
    else{
      echo "session fail";
    }
  }

  else {
    ?>
    <script>
    alert("아이디 혹은 비밀번호가 잘못되었습니다.");
    history.back();
  </script>
  <?php
  }
}

  else{
    ?>
    <script>
    alert("아이디 혹은 비밀번호가 잘못되었습니다.");
    history.back();
  </script>
  <?php
  }
?>
