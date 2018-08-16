<?php
	$pdo = new PDO( "mysql:host=127.0.0.1; dbname=lotto", "root", "");

	$pdo->exec("set names utf8"); 

	date_default_timezone_set('Asia/Seoul'); 

	header("content-type:text/html; charset=utf-8"); 
	
	session_start();
	
	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}

	function move($msg){
		echo "<script>location.replace('{$msg}')</script>";
		exit();
	}
	
	function back(){
		echo "<script>history.back()</script>";
		exit();
	}


	$p_turn = $pdo->query("select * from result")->rowCount();
	$turn = $p_turn + 1;

	if($turn == 1){
		$t_room = $pdo->query("select * from lotto")->rowCount();
		if($t_room == 0){
			$pdo->query("insert into lotto(turn,name,num,point,total,img) values('1','독거노인돕기','1','10000','10','old_man')");
			$pdo->query("insert into lotto(turn,name,num,point,total,img) values('1','불우아동돕기','1','20000','5','child')");
		}
	}
	if($turn != 1){
		$result = $pdo->query("select * from result where turn ='$p_turn'")->fetch(2);
		$p_result = explode(",",$result['result']);
	}
?>
