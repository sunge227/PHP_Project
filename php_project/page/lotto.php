<?php include("../include/header.php"); ?>

<?php
    if(!isset($_SESSION['id']) || $_SESSION['id'] == "admin"){
        alert("회원만 참여 가능합니다.");
        back();
    }

    $idx = $_GET['idx'];

    $data = $pdo->query("select * from lotto where idx = '$idx'")->fetch(2);
?>

<!-- content -->
<section id="content">
	<div id="title1">참가하기</div>
    
    <div class="wrap mat30 mab40">
        <div id="left_img">
            <img src="/image/<?php echo $data['img'];?>.jpg" alt="/image" >
        </div>
        
        <div id="room_title">
            <?php echo $data['name']." - ".$data['num'];?> <span class="black ft18"> ( <?php echo $data['turn'];?> 회 )</span>
        </div>
        
        <div id="desc">
            ※ 아래의 이미지를 클릭해서 6개의 번호를 선택하세요.<br>
            ※ 취소를 선택하면 해당 게임의 선택번호 모두 취소됩니다.<br>
            ※ 동일한 번호의 조합은 선택할 수 없습니다.      
        </div>
        
        <div class="cl"></div>
        
    </div>
    
    <div class="wrap mat30">
        <?php 
            for($i=1; $i<46; $i++){
        ?>
         <div class="num_box" onclick="chk_num(this)">
            <img src="/image/ball_<?php echo $i;?>.png" alt="ball_img"><span style="display:none"></span>
         </div>
        <?php } ?>
    
        <div class="cl"></div>
    </div>
    
    <div class=" ww tc mat30" >
        <button class="n_btn" onClick="bet('<?php echo $idx;?>');">참가하기</button>
        <button class="n_btn" onClick="can();">취소</button>
    </div>
    
    
    <div id="list_title">※ 참가내역</div>
	<div class="wrap">
        <table id="m_table" class="ww mat30 mab40">
            <thead>
                <tr>
                    <td>아이디</td>
                    <td>참가구분</td>
                    <td>참가회차</td>
                    <td style="width:35%;">참가번호</td>
                    <td>참가일자</td>
                </tr>
            </thead>
            
            <tbody> 
                <?php
                    $re = $pdo->query("select * from bet where turn = '$turn' 
                        and name='{$data['name']}' and num = '{$data['num']}' order by date desc");
                    while($list = $re->fetch(2)){
                ?>
                <tr>
                    <td><?php echo $list['id'];?></td>
                    <td><span class="blue"><?php echo $list['name']."-".$list['num'];?></span></td>
                    <td><span class="red">1 회</span></td>
                    <td style="width:35%;">
                        <div class="t_div ww">
                            <?php
                                $ball_arr = explode(",",$list['result']);
                                for($i=0; $i<count($ball_arr); $i++){
                            ?>
                            
                            <div><img src="/image/ball_<?php echo $ball_arr[$i];?>.png"></div>

                            <?php } ?>
                        </div>
                        <div class="cl"></div>
                    </td>
                    <td><?php echo $list['date'];?></td>
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

