<?php include ("../include/lib.php"); ?>

<?php

	$id = $_POST['id'];
	$name = $_POST['name'];
	$pw = $_POST['password'];

	if(!$id || !$name || !$pw){
		alert("아이디, 이름, 비밀번호는 필수입력 항목입니다.");
		back();
	}

	$num = $pdo->query("select * from member where id = '$id'")->rowCount();
	if($num > 0){
		alert("동일한 아이디가 존재합니다.");
		back();
	}

	$pdo->query("insert into member(id,name,pw,point) values('$id','$name',password('$pw'),'1000000')");

	$title = "회원가입 축하";
	$con = "회원가입을 축합니다.";

	$pdo->query("insert into message(id,title,con,date) values('$id','$title','$con',now())");

	alert("회원가입 되었습니다.");
	move("/");
?>
