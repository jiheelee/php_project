var trueCheck = [];
var focus = ["userID","userPass","userPassCheck","username","birthday","userEmail"
,"phoneNo","verificationNo"];
var verifyNumber;

$(document).ready(function() {
	$( function() {
		var x = new Date(2019, 08, 15, 0, 0, 0, 0);
		$("#birthday").datepicker({
			yearRange: "1900:2019",
			defaultDate: x,
			changeMonth: true,
			changeYear: true,
			dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일']
		});
	});

	$("#userID").focus();
	$("#userID").blur(function(){
		checkID();
	});
	$("#userID").keydown(function (key) {
      if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
          checkID();
      }
    });
	$("#userPass").blur(function(){
		checkPass();
	});
	$("#userPass").keydown(function (key) {
      if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
          checkPass();
      }
  });

	$("#userPassCheck").blur(function(){
		checkPassEqual();
	});
	$("#userPassCheck").keydown(function (key) {
      if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
          checkPassEqual();
      }
  });
	$("#username").blur(function(){
		checkName();
	});
	$("#username").keydown(function (key) {
      if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
          checkName();
      }
  });


	$("#birthday").blur(function(){
 		checkDay();
 	});
 	$("#birthday").keydown(function (key) {
     if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
         checkDay();
     }
  });
	$("#birthday").change(function(){
 		checkDay();
 	});

	$("#userEmail").blur(function(){
 		checkEmail();
 	});
 	$("#userEmail").keydown(function (key) {
     if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
         checkEmail();
     }
  });
	$("#phoneNo").blur(function(){
 		 	checkPhoneNo();
 	});
 	$("#phoneNo").keydown(function (key) {
     if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
         checkPhoneNo();
     }
  });

	$("#verify").click(function() {
		getVerifyNum();
	});
	$("#verificationNo").blur(function() {
		checkVerify();
	})
	$("#verificationNo").keydown(function (key) {
     if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
         checkVerify();
     }
  });
	$("#register").click(function() {
		checkApply();
	});
	$("#joinButton").click(function() {
		gojoin();
	});
	$("#login").click(function() {
		login();
	});
	$('#memobutton').click(function() {
		memo_register();
	});
	$('#loginbutton').click(function() {
		go_login();
	});
	$('#infoprotect').click(function() {
		intro_infoprotect();

	});
	$('#global').click(function() {
		intro_global();
	});
	$('#system').click(function() {
		intro_system();
	});
	$('#risk').click(function() {
		intro_risk();
	});

});

function checkID(){

		var idStr =$("#userID").val();
		if(idStr.length < 4){
			$("#userIDExistedText").hide("slow");
			$("#userIDErrText").show("slow");
			trueCheck[0] = false;
		}else{
				$.get("idcheck.php",
				{ member_id: idStr },
				function(data, status) {
					if(data.check_result=="fail"){
						trueCheck[0] = false;
						$("#userIDExistedText").show("slow");
						$("#userIDErrText").hide("slow");
					}else{
						trueCheck[0] = true;
						$("#userIDExistedText").hide("slow");
						$("#userIDErrText").hide("slow");
					}
				}
			);


			$("#userIDErrText").hide("slow");
			trueCheck[0] = true;
			for(i = 1; i <= 7; i++){
				if(!trueCheck[i]){
					$("#"+focus[i]).focus();
					break;
				}
			}

	}
}
function checkPass(){
	var passStr = $("#userPass").val();
	if(passStr.length < 6){
		/* alert('비번을 여섯 글자 이상 입력해주세요.'); */
		$("#userPassErrText").show();
		trueCheck[1] = false;
	}else{
		$("#userPassErrText").hide();
		trueCheck[1] = true;
		for(i = 2; i <= 7; i++){
			if(!trueCheck[i]){
				$("#"+focus[2]).focus();
				break;
			}
		}
	}

}
function checkPassEqual(){
	var passStr = $("#userPass").val();
	var pass2Str = $("#userPassCheck").val();
	if(pass2Str!=passStr){
		$("#userPassEqualErrText").show();
		trueCheck[2] = false;
	}else{
		$("#userPassEqualErrText").hide();
		trueCheck[2] = true;
		for(i = 3; i <= 7; i++){
			if(!trueCheck[i]){
				$("#"+focus[i]).focus();
				break;
			}
		}
	}
}
function checkName(){
	var nameStr = $("#username").val();
	if(nameStr.length < 1){
		$("#usernameErrText").show();
		trueCheck[3] = false;
	}else{
		$("#usernameErrText").hide();
		trueCheck[3] = true;
		for(i = 4; i <= 7; i++){
			if(!trueCheck[i]){
				$("#"+focus[i]).focus();
				break;
			}
		}
	}
}

function checkDay(){
	var day = $("#birthday").val();
	if(day.length < 1){
		$("#dayErrText").show();
		trueCheck[4] = false;
	} else {
		$("#dayErrText").hide();
		trueCheck[4] = true;

		for(i = 5; i <= 7; i++){
			if(!trueCheck[i]){
				$("#"+focus[i]).focus();
				break;
			}
		}
	}
}
function checkEmail(){
	var email = $("#userEmail").val();;
	if(email.length < 1){
		$("#emailErrText").show();
		trueCheck[5] = false;
	}else{
		$("#emailErrText").hide();
		trueCheck[5] = true;
		for(i = 6; i <= 7; i++){
			if(!trueCheck[i]){
				$("#"+focus[i]).focus();
				break;
			}
		}
	}
}
function checkPhoneNo(){
	var phoneNo = $("#phoneNo").val();
	if(phoneNo.length < 1){
		$("#phoneNoErrText").show();
		trueCheck[6] = false;
		return false;
	}else{
		$("#phoneNoErrText").hide();
		trueCheck[6] = true;
		for(i = 7; i <= 7; i++){
			if(!trueCheck[i]){
				$("#"+focus[i]).focus();
				break;
			}
		}
		return true;
	}
}

function getVerifyNum() {
	if(checkPhoneNo()){
		var result = Math.floor(Math.random() * 1000) +1;
		alert("인증번호 : " + result);
		verifyNumber = result;
	}
}

function checkVerify() {
	var verifyNum = $("#verificationNo").val();
	if(verifyNum!=verifyNumber){
		$("#verifyErrText").show();
		trueCheck[7] = false;
	}else{
		$("#verifyErrText").hide();
		trueCheck[7] = true;
	}

}
	function checkApply(){
		var count = 0;
		checkAll();
		for(count = 0; count <= 7; count++) {
			if(trueCheck[count]==false) {
				$("#"+focus[count]).focus();
				break;
			}
		}
		if(count > 7){
			// location.href = "apply.php";
			$("#member_form").submit();
		}
	}
	function login(){
		$("#login_form").submit();
	}
	function gojoin(){
		location.href = "jq_register.html";
	}
	function checkAll(){
		checkID();
		checkPass();
		checkPassEqual();
		checkName();
		checkDay();
		checkEmail();
		checkPhoneNo();
		checkVerify();
	}
	function memo_register(){
		var memoarea = $("#memoarea").val();
		if(memoarea){
			$('#textErr').hide();
			$('#memo_form').submit();
		} else {
			$('#textErr').show();
		}

	}
	function go_login(){
		location.href = "login.html";
	}
	function intro_infoprotect(){
		$('#intro_container').hide();
		$('#intro_container_infoprotect').show();
		$('#intro_container_global').hide();
		$('#intro_container_system').hide();
		$('#intro_container_risk').hide();
		$('#infoprotect').css("color","#019591");
		$('#global').css("color","#646464");
		$('#system').css("color","#646464");
		$('#risk').css("color","#646464");
	}
	function intro_global(){
		$('#intro_container').hide();
		$('#intro_container_infoprotect').hide();
		$('#intro_container_global').show();
		$('#intro_container_system').hide();
		$('#intro_container_risk').hide();
		$('#infoprotect').css("color","#646464");
		$('#global').css("color","#019591");
		$('#infoprotect').css("color","#646464");
		$('#risk').css("color","#646464");
	}
	function intro_system(){
		$('#intro_container').hide();
		$('#intro_container_infoprotect').hide();
		$('#intro_container_global').hide();
		$('#intro_container_system').show();
		$('#intro_container_risk').hide();
		$('#infoprotect').css("color","#646464");
		$('#global').css("color","#646464");
		$('#system').css("color","#019591");
		$('#risk').css("color","#646464");
	}
	function intro_risk(){
		$('#intro_container').hide();
		$('#intro_container_infoprotect').hide();
		$('#intro_container_global').hide();
		$('#intro_container_system').hide();
		$('#intro_container_risk').show();
		$('#infoprotect').css("color","#646464");
		$('#global').css("color","#646464");
		$('#system').css("color","#646464");
		$('#risk').css("color","#019591");
	}
