<?php include("../include/header.php"); ?>
<?php 
	if(!isset($_SESSION['id']) || $_SESSION['id'] != "admin"){
		alert("정상적인 접속이 아닙니다.");
		back();
	}
?>
<!-- content -->
<section id="content">
	<div id="title1">글쓰기</div>
    
	<?php 
		if($_POST){
			$title = $_POST['title'];
			$con = $_POST['con'];

			if(!$title || !$con){
				alert("제목과 내용은 필수 항목입니다.");
				back();
			}

			$pdo -> query("insert into notice(title,con,date) values('$title','$con',now())");
			alert("등록되었습니다.");
			move("/page/sub3.php");
		}
	?>


    <div class="wrap mat30 mab40">

    	<form method="post" action="/page/sub3_write.php">
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
						<td colspan="2" style=" border:none; text-align:center;">
							<input type="submit" class="n_btn" value="글쓰기">
							<input type="button" class="n_btn" value="취소" onclick="history.back();">
						</td>
					</tr>
				</table>
     	</form>
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

