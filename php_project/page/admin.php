<?php include("../include/header.php"); ?>
<?php

	if(!isset($_SESSION['id']) || $_SESSION['id'] != "admin"){
		alert("관리자만 접근 가능합니다.");
		back();
	}

?>
<!-- content -->
<section id="content">
	<div id="title1">관리자페이지</div>
    
    <div class="wrap mat30 mab40">

		<div style="font-size:24px; font-weight:bold; width:100%; margin-top:20px;">
    	
			※ 결과 입력 : <?php echo $turn;?> 회 <br><br>
        <form method="post" action="/page/admin_ok.php">

			<span style="font-size:20px; color:#666;">1. </span>
			<select name="num[]" style="border:solid 1px #000; vertical-align:middle; font-size:13px;">
				<option value="">선택</option>
				<?php for($i=1;$i<46;$i++){ ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>
			</select> &nbsp;

			<span style="font-size:20px; color:#666;">2. </span>
			<select name="num[]" style="border:solid 1px #000; vertical-align:middle; font-size:13px;">
								<option value="">선택</option>
				<?php for($i=1;$i<46;$i++){ ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>
			</select> &nbsp;

			<span style="font-size:20px; color:#666;">3. </span>
			<select name="num[]" style="border:solid 1px #000; vertical-align:middle; font-size:13px;">
								<option value="">선택</option>
				<?php for($i=1;$i<46;$i++){ ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>

			</select> &nbsp;

			<span style="font-size:20px; color:#666;">4. </span>
			<select name="num[]" style="border:solid 1px #000; vertical-align:middle; font-size:13px;">
								<option value="">선택</option>
				<?php for($i=1;$i<46;$i++){ ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>

			</select> &nbsp;

			<span style="font-size:20px; color:#666;">5. </span>
			<select name="num[]" style="border:solid 1px #000; vertical-align:middle; font-size:13px;">
								<option value="">선택</option>
				<?php for($i=1;$i<46;$i++){ ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>

			</select> &nbsp;

			<span style="font-size:20px; color:#666;">6. </span>
			<select name="num[]" style="border:solid 1px #000; vertical-align:middle; font-size:13px;">
								<option value="">선택</option>
				<?php for($i=1;$i<46;$i++){ ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php } ?>

			</select> &nbsp;

		   <input type="submit" value="결과입력" class="n_btn" style="vertical-align:middle; font-weight:bold; ">
        </form>
		</div>

		<div style="font-size:24px; font-weight:bold; width:100%; margin-top:20px;">※ 메시지보내기</div>
    
		<div style="width:100%; margin-top:10px;">
			<table class="n_write" style="width:100%;">

				<tr>
					<td style="width:15%; text-align:center;">제 목</td>
					<td><input type="text" name="title" id="title" style="border:solid 1px #ccc; width:97%; padding:10px;"></td>
				</tr>
				
				<tr>
					<td style="width:15%; text-align:center;">내 용</td>
					<td style="word-break:break-all; min-height:160px; line-height:1.8">
						<textarea id="con" name="con" style="width:97%; height:120px; border:solid 1px #ccc; padding:10px;"></textarea>	
					</td>
				</tr>
				
				<tr>
					<td colspan="4" style=" border:none; text-align:center;">
					
					   <select id="to_id" style="border:solid 1px #000; vertical-align:middle; font-size:13px; ">
							<option value="">전체 회원 보내기</option>

							<option value="">USER1</option>
							<option value="">USER2</option>
							<option value="">USER3</option>

					   </select>
						<input type="button" class="n_btn" value="메시지보내기">
					</td>
				</tr>
			</table>
		
		</div>


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

