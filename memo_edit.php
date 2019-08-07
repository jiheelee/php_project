<?
  $loggedId = $_COOKIE['userId'];
  $id = $loggedId;
  $memo_text = $_POST["memoarea"];
  $memo_date = date("Y-m-d H:i:s");
  $num = $_POST["num"];
  //파일 이름 불러오기

  $connect = mysqli_connect("localhost","root","585900","naverdb");
  $sql = "update memo set content = '$memo_text' where num='$num';";
  $result = mysqli_query($connect, $sql);
  //file add

  if($result){

    echo "<script>location.href='memo_list.html'</script>";
  }else{
    echo "실패";
  }
  mysqli_close($connect);
?>
