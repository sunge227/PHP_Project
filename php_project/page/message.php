<?php include("../include/lib.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta content="" name="keywords">
<meta content="" name="description">
<title>:: 불우이웃돕기 ::</title>
<link href="/css/style.css" rel="stylesheet" type="text/css">

<script src="/jquery/jquery-3.3.1.js"></script>
<script src="/jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="/js/app.js"></script>
</head>

<body>

<div style="width:800px; min-height:400px;">
    
    <table class="mess_table" style="border-collapse:collapse; width:100%; margin-bottom:20px; margin-top:5px; ">
            	<tr>
                	<td colspan="4" style="border:none;">
						<span style="font-size:30px; font-weight:bold;"><?php echo $_SESSION['id'];?>님 알림</span>
					</td>
            	</tr>
                
                 <tr>
                    	<td class="fb" style="width:15%;"><span style="font-size:16px; color:#000;">보낸 사람</span></td>
						<td class="fb" style="width:50%;"><span style="font-size:16px; color:#000;">제 목</span></td>
                        <td class="fb" style="width:25%;"><span style="font-size:16px; color:#000;">보낸 날짜</span></td>
                        <td class="fb" style="width:10%;"><span style="font-size:16px; color:#000;">읽 음</span></td>
                </tr>
                  

                <?php
                	$num = $pdo->query("select * from message where id = '{$_SESSION['id']}'")->rowCount();

                	if($num > 0){

                		$re = $pdo->query("select * from message where id = '{$_SESSION['id']}' order by date desc");
                		while($data = $re->fetch(2)){
                ?>    
						<tr>
							<td><?php echo $data['writer'];?></td>
							<td>
								<span style=" color:#7d6c27;" class=" cu" 
								onclick="location.href='/page/message_view.php?idx=<?php echo $data['idx'];?>'" >
									<?php echo $data['title'];?>
								</span>
							</td>
							<td><?php echo $data['date'];?></td>
							<td><span class="blue"><?php echo $data['view'];?></span></td>
						</tr>  

						<?php } ?>  

				<?php }else{ ?>         
		                <tr>
		                	<td colspan="4" style="font-size:13px;">
		                    	알림이 없습니다.
		                	</td>
		                </tr>
        		<?php } ?>
               
        	</table>
	</div>
</body>
</html>

