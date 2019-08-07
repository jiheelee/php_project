<?
  $loggedId = $_COOKIE['userId'];
  $id = $loggedId;
  $memo_text = $_POST["memoarea"];
  $memo_date = date("Y-m-d H:i:s");
  $filepath = $_POST["memoFile"];
  echo "ID : $loggedId <br/>";
  echo "ID : $memo_text <br/>";
  echo "ID : $memo_date <br/>";
  //파일 이름 불러오기
  $original_filename = $_FILES['memoFile']['name'];

  //
  $filename = time()."_".$original_filename;
  $db_filename = "./file/".$filename;
  if($filepath==""){
    $db_filename = "";
  }
  $filename= iconv("UTF-8","EUC-KR", $filename);
  $server_filename = "./file/".$filename;
  move_uploaded_file($_FILES['memoFile']['tmp_name'], $server_filename);
  $filesize = filesize($server_filename)/1024;
  $filesize = floor($filesize).'KB';
  // echo "$filesize";
  echo "<script>alert('$filename')</script>";

  $connect = mysqli_connect("localhost","root","585900","naverdb");
  $sql = "insert into memo(id, content, regist_day, original_filename, server_filename, filesize)";
  $sql .= " values('$id','$memo_text','$memo_date','$original_filename','$db_filename','$filesize');";
  $result = mysqli_query($connect, $sql);
  //file add

  if($result){
    echo "<script>location.href='memo_list.html'</script>";
  }else{
    echo "실패";
  }
  mysqli_close($connect);
?>
