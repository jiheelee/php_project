<?
  $user_id = $_POST[member_id];
  $user_pass = $_POST[member_pwd];

  $connect = mysqli_connect("localhost","root","585900","naverdb");
  $sql = "SELECT * FROM member WHERE id='$user_id' and password = '$user_pass'";
  $result = mysqli_query($connect,$sql);
  $count = mysqli_num_rows($result);
  echo "결과 : $count";
  if($count<1){
    setcookie("userId","");
    echo "<script>alert('아이디 또는 패스워드가 틀립니다.')</script>";
  }else {
    setcookie("userId",$user_id);
    echo "<script>location.href='main.html';</script>";
  }
  mysqli_close($connect);
?>
