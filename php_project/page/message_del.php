<?php include("../include/lib.php"); ?>
<?php
	$idx = $_GET['idx'];

	$pdo->query("delete from message where idx = '$idx'");

	alert("삭제되었습니다.");
	move("/page/message.php");

?>