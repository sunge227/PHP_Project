<?php include("../include/header.php"); ?>

<!-- content -->
<section id="content">
	<div id="title1">글보기</div>
    
    <div class="wrap mat30 mab40">
    	<?php 
			$idx = $_GET['idx'];
			$data = $pdo->query("select * from notice where idx = '$idx'")->fetch(2);

 		?>	

		<table class="n_write" style="width:100%;">

				<tr>
					<td style="width:15%; text-align:center;">작성자</td>
					<td><input type="text" value="<?php echo $data['writer'];?>" id="title" style="border:solid 1px #ccc; width:97%; padding:10px;"></td>
				</tr>
                
                <tr>
					<td style="width:15%; text-align:center;">작성일</td>
					<td><input type="text" value="<?php echo $data['date'];?>" id="title" style="border:solid 1px #ccc; width:97%; padding:10px;"></td>
				</tr>
                
                <tr>
					<td style="width:15%; text-align:center;">제 목</td>
					<td><input type="text" value="<?php echo $data['title'];?>" id="title" style="border:solid 1px #ccc; width:97%; padding:10px;"></td>
				</tr>
				
				<tr>
					<td style="width:15%; text-align:center;">내 용</td>
					<td style="word-break:break-all; min-height:160px; line-height:1.8">
						<textarea id="con" name="" style="width:97%; height:120px; border:solid 1px #ccc; padding:10px;"><?php echo $data['con'];?></textarea>	
					</td>
				</tr>
				
				<tr>
					<td colspan="2" style=" border:none; text-align:center;">
						<input type="button" class="n_btn" value="목록으로" onclick="location.href='/page/sub3.php'">
					</td>
				</tr>
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

