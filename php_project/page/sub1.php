<?php include("../include/header.php"); ?>

<?
    if(!isset($_SESSION['id']) || $_SESSION['id']=='admin'){
        alert("로그인한 회원만 접근 가능합니다.");
        back();
    }
?>
<!-- content -->
<section id="content">
	<div id="title1">참가내역</div>
    
    <div class="wrap mat30 mab40">
      <table id="m_table" style="width:100%;">
        	<thead>
            	<tr>
                	<td>참가구분</td>
                    <td>참가회차</td>
                    <td style="width:35%;">참가번호</td>
                    <td>적중개수/차이값</td>
                    <td>참가일자</td>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    $re = $pdo->query("select * from bet where id = '{$_SESSION['id']}' order by date desc");
                    $total = $re->rowCount();
                    if($total >0){
                    while($data = $re->fetch(2)){
                ?>
            
                	<tr>
                        <td><span class="blue"><?php echo $data['name']."-".$data['num'];?></span></td>
                        <td><span class="red"><?php echo $data['turn'];?>회</td>
                        <td style="width:35%;">
                        	<div class="t_div" style="width:100%; min-height:1px;">
                            <?php 
                                $result = $pdo->query("select * from result where turn = '{$data['turn']}'")->fetch(2);
                                $result = explode(",",$result['result']);

                                $ball = explode(",",$data['result']);
                                for($i=0;$i<count($ball);$i++){
                                ?>
                            		<div>
                                        <img src="/image/ball_<?php echo $ball[$i]; ?>.png" alt="">
                                        <?php 
                                            if($data['rank'] != 0){
                                                if(!in_array($ball[$i],$result)){
                                                    echo "<span></span>";
                                                }
                                            }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="cl"></div>
                        </td>
                        <td>
                            <?php if($data['rank'] ==0){ ?>
                            <span style='font-size:17px;'>미추첨</span>
                            <?php }else{ ?>
                                <?php echo $data['hit']." / ".$data['gap'];?>
                            <?php } ?>
                        </td>

                        <td><?php echo $data['date'];?></td>
                    </tr>
                    <?php } ?>
                <?php }else{ ?>

				<tr>
                    <td colspan="6">참가 내역이 없습니다.</td>                   
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

