<?php include("../include/header.php"); ?>

<!-- content -->
<section id="content">
	<div id="title1">회원가입 페이지</div>
    
    <div class="wrap mat30 mab40">

	
		<div style="width:100%; margin-top:10px;">
			<form method="post" action="/page/join_ok.php">
				<table class="n_write" style="width:70%;margin: 0 auto;">
					<tr>
						<td style="width:15%; text-align:center;">아이디</td>
						<td><input type="text" name="id" id="id" style="border:solid 1px #ccc; width:97%; padding:10px;"></td>
					</tr>
					
					<tr>
						<td style="width:15%; text-align:center;">이름</td>
						<td><input type="text" name="name" id="name" style="border:solid 1px #ccc; width:97%; padding:10px;"></td>
					</tr>

					<tr>
						<td style="width:15%; text-align:center;">비밀번호</td>
						<td><input type="password" name="password" id="password" style="border:solid 1px #ccc; width:97%; padding:10px;"></td>
					</tr>
					
					<tr>
						<td colspan="2" style=" border:none; text-align:center;">
							<input type="submit" class="n_btn" value="회원가입">
						</td>
					</tr>
				</table>
			</form>
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
