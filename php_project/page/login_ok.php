<?php include ("../include/lib.php"); ?>

<?php

	$id = $_POST['id'];
	$pw = $_POST['password'];

	if(!$id || !$pw){
		alert("아이디와 비밀번호를 입력해 주세요.");
		back();
	}

	$num = $pdo->query("select * from member where id = '$id' and pw = password('$pw')")->rowCount();

	if($num == 0){
		alert("아이디 또는 비밀번호를 확인해 주세요.");
		back();
	}else{

		$data = $pdo->query("select * from member where id = '$id' and pw = password('$pw')")->fetch(2);
		
		$_SESSION['id'] = $data['id'];
		$_SESSION['name'] = $data['name'];

		alert("로그인 되었습니다.");
		move("/");
	}


?>
