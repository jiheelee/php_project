<?
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$member_id = $_POST["member_id"];
	$member_password = $_POST["member_pwd"];
	$member_name = $_POST["member_uname"];
	$member_dpt = $_POST["member_dpt"];
	$member_pos = $_POST["member_pos"];
	$member_birth = $_POST["member_birthd"];
	$member_gender = $_POST["member_gender"];
	$member_email = $_POST["member_email"];
	$member_phone_code = $_POST["member_nation"];
	$member_phone = $_POST["member_phoneNo"];
  $mode = $_POST["mode"];

	if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0) {
		if (move_uploaded_file($_FILES['upload']['tmp_name'],"photo/{$member_id}.png")){
			echo "upload 성공!!";
			$photo_src = $member_id.".png";
		}
	}


	echo "ID : $member_id <br/>";
	echo "비번 : $member_password <br/>";
	echo "이름 : $member_name <br/>";
	echo "생일 : $member_birth <br/>";
	echo "성별 : $member_gender <br/>";
	echo "E-mail : $member_email <br/>";
	echo "전화번호 국가코드 : $member_phone_code <br/>";
	echo "전화번호 : $member_phone <br/>";
	echo "포토: $photo_src";


   $connect = mysqli_connect("localhost","root","585900","naverdb");
   // mysql_select_db("", $connect);

   $phone_num_total = "(".$member_phone_code.")".$member_phone;
   if($mode=="join"){
     $sqli = "insert into member";
     $sqli .= " values ('$member_id', '$member_password', '$member_name', ";
     $sqli .= " '$member_birth', '$member_gender', '$member_email',
		 '$phone_num_total', '$photo_src', '$member_dpt', '$member_pos');";
   }else{
     $sqli = "update member set id='$member_id',password='$member_password',name='$member_name',
     birth='$member_birth',gender='$member_gender',email='$member_email',phone='$phone_num_total'";
     $sqli .= "where id='$member_id';";
   }

   $result = mysqli_query($connect,$sqli);
   echo $result;
   if ($result){
		 echo "<script>location.href='login.html?when=$mode'</script>";
		 echo "<script>alert('회원가입을 축하합니다!!!')</script>";
	 }
   else{
		 // echo "실패";
		 echo "<script>alert('오류가 발생했습니다.')</script>";
		 echo "<script>location.href='index.html?mode=$mode'</script>";
	 }
   mysqli_close($connect);
	 echo "asdf";
?>
