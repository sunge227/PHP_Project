<?php include ("../include/lib.php"); ?>

<?php
	$s_turn = $_POST['s_turn'];

		$re= $pdo->query("select * from lotto where turn = '$s_turn' order by num asc,name asc");
		while($data = $re->fetch(2)){
	?>
		<option value="<?php echo $data['name'].'-'.$data['num'];?>"><?php echo $data['name'].'-'.$data['num'];?></option>
<?php } ?>
