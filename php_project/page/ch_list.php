<?php include ("../include/lib.php"); ?>
<?php
	$s_turn = $_POST['s_turn'];

	$num = explode("-",$_POST['num']);

	$name = $num[0];
	$num  = $num[1];

?>
<?php 
            	$re = $pdo->query("select * from bet where turn = '$s_turn' and name='$name' and num='$num' order by rank asc");
            	$total = $re->rowCount();

            	if($total !=0){
            		while($data = $re->fetch(2)){
            ?>
						<tr>
							<td><span class="blue"><?php echo $data['id'];?></span></td>
							<td style="width:35%;">
								<div class="t_div" style="width:100%; min-height:1px;">
								<?php
									$ball = explode(",", $data['result']);

									$sdata = $pdo -> query("select * from result where turn = '$s_turn'")->fetch(2);
									$s_result = explode(",",$sdata['result']);

									for($i=0;$i<count($ball);$i++){
								?> 
									<div>
										<img src="/image/ball_<?php echo $ball[$i];?>.png">
										<?php
											if(!in_array($ball[$i], $s_result)){
												echo "<span></span>";
											}
										?>
									</div>

								<?php } ?>
								</div>
								<div class="cl"></div>
							</td>
							<td><?php echo $data['hit']."/".$data['gap'];?></td>
							<td><?php echo $data['rank'];if($data['rank'] == 1) { echo "(".number_format($data['price']).")"; } ?></td>
						</tr>
					<?php }?>
			<?php }else{ ?>

				<tr>
                    <td colspan="6">내역이 없습니다.</td>                   
                </tr>
<?php } ?>