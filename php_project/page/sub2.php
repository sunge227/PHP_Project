<?php include("../include/header.php"); ?>
<!-- content -->
<?php
	if($p_turn ==0){
		alert("이전 회차의 당첨자가 없습니다.");
		back();
	}

	$s_turn = $p_turn;
	$name ="독거노인돕기";
	$num = 1;
?>
<section id="content">
	<div id="title1">당첨자보기</div>
    
    <div class="wrap mat30 mab40">

		<div style="font-size:32px; font-weight:bold;  margin-top:40px;">
			※ <span class="red"><span id="i_turn"><?php echo $p_turn;?></span> 회 <span class="blue"><span id="i_name"><?php echo $name.'-'.$num;?></span></span> &nbsp;&nbsp;
			<select onchange="ch_room(this.value)" id="vv_time" style="border:solid 1px #000; vertical-align:middle; font-size:17px; padding:3px;">
				<?php
					$re = $pdo->query("select * from result order by idx desc");
					while($data = $re->fetch(2)){
				?>
				<option value="<?php echo $data['turn'];?>"><?php echo $data['turn'];?>회</option>

				<?php } ?>
			</select>&nbsp;

			<select id="vv_kind" style="border:solid 1px #000; vertical-align:middle; font-size:17px; padding:3px;">
				<?php

					$re= $pdo->query("select * from lotto where turn = '$s_turn' order by num asc,name asc");
					while($data = $re->fetch(2)){
				?>
				<option value="<?php echo $data['name'].'-'.$data['num'];?>"><?php echo $data['name'].'-'.$data['num'];?></option>
				<?php } ?>
			</select>&nbsp;
			<button class="n_btn" onClick="ch_list();" style="vertical-align:middle; font-weight:bold; ">보 기</button>
		</div>

		<table id="m_table" style="width:100%; margin-top:40px;">
        	<thead>
            	<tr>
                    <td>아이디</td>
                    <td style="width:35%;">참가번호</td>
                    <td>적중개수/차이값</td>
                    <td>순위</td>
                </tr>
            </thead>
            
            <tbody>

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
            </tbody>
        </table>
     
    </div>
    
</section>

<!-- footer -->

<footer>
    <div class="wrap">
    	<i>Copyright ⓒ 2018 nanum-lotto All Rights Reserved.</i>
    </div>
</footer>


</body>
</html>

