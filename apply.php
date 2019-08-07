<?
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$member_id = $_POST["member_id"];
	$member_password = $_POST["member_pwd"];
	$member_name = $_POST["member_uname"];
	$member_birth = $_POST["member_birthd"];
	$member_gender = $_POST["member_gender"];
	$member_email = $_POST["member_email"];
	$member_phone_code = $_POST["member_nation"];
	$member_phone = $_POST["member_phoneNo"];

	echo "ID : $member_id <br/>";
	echo "비번 : $member_password <br/>";
	echo "이름 : $member_name <br/>";
	echo "생일 : $member_birth <br/>";
	echo "성별 : $member_gender <br/>";
	echo "E-mail : $member_email <br/>";
	echo "전화번호 국가코드 : $member_phone_code <br/>";
	echo "전화번호 : $member_phone <br/>";

   $connect = mysqli_connect("localhost","root","585900","naverdb");
   // mysql_select_db("", $connect);

   $phone_num_total = "(".$member_phone_code.")".$member_phone;
   $sqli = "insert into member (id,password,name,birth,gender,email,phone)";
   $sqli .= " values ('$member_id', '$member_password', '$member_name', ";
   $sqli .= " '$member_birth', '$member_gender', '$member_email', '$phone_num_total')";

   $result = mysqli_query($connect,$sqli);
   echo $result;
   if ($result)
      echo "성공";
     // echo "<script>location.href='complete.html'</script>";
   else
      echo "실패";
     // echo "<script>location.href='fail.html'</script>";

   mysqli_close($connect);
?>
