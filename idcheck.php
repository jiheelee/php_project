<?
  $user_id = $_GET[member_id];

  $connect = mysqli_connect("localhost","root","585900","naverdb");
  $sql = "SELECT * FROM member WHERE id='$user_id'";
  $result = mysqli_query($connect,$sql);
  $count = mysqli_num_rows($result);

  if($count < 1){
  // echo "OK";
    header("Content-type: text/json");
    $data = array("check_result" => "true");
    $myJSON = json_encode($data);
    echo $myJSON;
  }else{
    // echo "FAIL";
    header("Content-type: text/json");
    $data = array("check_result" => "fail");
    $myJSON = json_encode($data);
    echo $myJSON;
  }
  mysqli_close($connect);
?>
