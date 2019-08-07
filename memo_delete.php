<?
  $filename = $_GET["filename"];
  $filename = iconv("UTF-8", "EUC-KR", $filename);

  if(is_file($filename)){
    unlink($filename);
  }
  $memo_num = $_GET["num"];
  echo "ID : $memo_num <br/>";

  $connect = mysqli_connect("localhost","root","585900","naverdb");
  $sql = "delete from memo";
  $sql .= " where num = '$memo_num';";
  $result = mysqli_query($connect, $sql);
  mysqli_close($connect);

  if($result){
    echo "<script>location.href='memo_list.html'</script>";
  }else{
    echo "실패";
  }
?>
