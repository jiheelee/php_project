<?
  $answer = $_POST["answer"];
  $loggedId = $_COOKIE[userId];
  $connect = mysqli_connect("localhost","root","585900","naverdb");
  if($loggedId==""){
    echo "<script>alert('로그인후 투표를 할 수 있습니다.');</script>";

  } else {
      $sql_select = "SELECT * FROM poll_history where id = '$loggedId'";
      $result_select = mysqli_query($connect, $sql_select);
      $count = mysqli_num_rows($result_select);

    if($count > 0){
      echo "<script>alert('이미 투표하셨습니다!!!');</script>";

    } else {
      echo "<script>alert('투표완료!!!');</script>";
      // alert('투표완료!!');
      $sql_insert = "INSERT INTO poll_history values('$loggedId')";
      $sql = "UPDATE poll SET $answer = $answer + 1";
      $result = mysqli_query($connect, $sql);
      $result2 = mysqli_query($connect, $sql_insert);
    }
  }

?>
<script>
  location.href="poll_result.html";
</script>
