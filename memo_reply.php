<?
  $loggedId = $_COOKIE['userId'];
  $parent = $_POST["memo_parent"];
  $id = $loggedId;
  $memo_text = $_POST["memoarea"];
  $memo_date = date("Y-m-d H:i:s");
  echo "num : $parent <br/>";
  echo "ID : $loggedId <br/>";
  echo "ID : $memo_text <br/>";
  echo "ID : $memo_date <br/>";

  $connect = mysqli_connect("localhost","root","585900","naverdb");
  $sql = "insert into memo_reply(parent, id, content,regist_day)";
  $sql .= " values('$parent','$id','$memo_text','$memo_date');";
  $result = mysqli_query($connect, $sql);
  mysqli_close($connect);

  if($result){
    echo "<script>location.href='memo_list.html'</script>";
  }else{
    echo "실패";
  }
?>
