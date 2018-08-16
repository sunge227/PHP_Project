<?php include ("../include/lib.php"); ?>
<?php
	$kind = urldecode($_GET['kind']);

	if(!isset($_SESSION['id']) || $_SESSION['id'] == "admin"){
		alert("회원만 기부가능합니다.");
		back();
	}

	$pdo->query("update donate set total = total + '100000' where name = '$kind' ");

	$pdo->query("update member set point = point - '100000', n_point = n_point + '100000' where id = '{$_SESSION['id']}'");

	alert("기부되었습니다.");
	move("/");
?>
