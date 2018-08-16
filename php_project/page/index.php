<?php include("../include/header.php"); ?>

<!-- content -->
<section id="content">

    <div class="wrap mat50 tc">
    	<div class="title">기부현황</div>
    	<div class="flex mat50">
            <?php
                $data = $pdo->query("select * from donate where name = '독거노인돕기'")->fetch(2);
            ?>

        	<div class="con"> 
            	<div class="img_box">
                	<img src="/image/old_man.jpg" alt="독거노인돕기" 
                    onclick="location.href='/page/donate.php?kind=<?php echo urlencode('독거노인돕기');?>'">
                </div>
                <div class=" ft23 mab10">독거노인돕기</div>	
                <div class=" ft19"><span class="blue">총 기부 현황</span> : 
                    <span class="red"><?php echo number_format($data['total']);?></span> 포인트</div>	
            </div>
            
            <?php
                $data = $pdo->query("select * from donate where name = '불우아동돕기'")->fetch(2);
            ?>
            <div class="con"> 
            	<div class="img_box">
                	<img src="/image/child.jpg" alt="불우아동돕기" 
                    onclick="location.href='/page/donate.php?kind=<?php echo urlencode('불우아동돕기');?>'">
                </div>
                <div class="ft23 mab10">불우아동돕기</div>
                <div class=" ft19"><span class="blue">총 기부 현황</span> : 
                    <span class="red"><?php echo number_format($data['total']);?></span> 포인트</div>			
            </div>
        
        </div>
    </div>
    
    
    <div class="wrap mat80 tc">
    	<div class="title"><?php echo $turn;?>회 나눔로또 참여하기</div>
    	<div class="flex mat50">
        <?php
            $re = $pdo->query("select * from lotto where turn = '$turn' order by num asc, name asc");
            while($data = $re->fetch(2)){
                $tt = $pdo->query("select * from bet where turn = '$turn' and name='{$data['name']}' 
                    and num='{$data['num']}'")->rowCount();
        ?>	
            <div class="con"> 
            	<div class="img_box">
                	<img src="/image/<?php echo $data['img'];?>.jpg" alt="<?php echo $data['name'];?>">
                </div>
                <div class=" ft23 mab10 red"><?php echo $data['name']."-".$data['num'];?></div>	
                <div class=" ft14 mab5">참여포인트( <?php echo number_format($data['point']);?> )</div>
                <div class=" ft16 blue">참여인원 : <?php echo $tt;?> / <?php echo $data['total'];?> 명</div>
                <div class="mat10">
                	<button class="co1 ft15 fb" 
                    onclick="location.href='/page/lotto.php?idx=<?php echo $data['idx'];?>'">참가하기</button>
            	</div>	
            </div>

        <?php } ?>      
         
        </div>
    </div>
    <?php
        if($turn != 1){ ?>
    <div class="wrap mat80 tc">
    	<div class="title"><?php echo $p_turn;?>회 당첨자 명단</div>
    	
		<table id="m_table" class="ww mat30">
        	<thead>
            	<tr>
                	<td>참가구분 / 아이디</td>
                    <td style="width:35%;">참가번호</td>
                    <td>적중개수</td>
                    <td>차이값</td>
                    <td>당첨포인트</td>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    $re = $pdo -> query("select * from bet where turn = '$p_turn' and rank='1' order by num asc,name asc,id asc");
                    while($data = $re->fetch(2)){
                ?>
                <tr>
                    <td><?php echo $data['name']."-".$data['num'];?> / <span class="blue"><?php echo $data['id'];?></span> </td>
                    <td style="width:35%;">
                    	<div class="t_div" style="width:100%; min-height:1px;">
                            <?php 
                                $ball = explode(",",$data['result']);
                                for($i=0;$i<count($ball);$i++){
                            ?>
                        	<div>
                                <img src="/image/ball_<?php echo $ball[$i];?>.png" alt="ball">
                                <?php if(!in_array($ball[$i],$p_result)){ ?>
                                    <span></span>
                                <?php } ?>
                                
                            </div>
                            <?php } ?>
                        </div>
                        <div class="cl"></div>
                    </td>
                    <td><?php echo $data['hit'];?></td>
                    <td><?php echo $data['gap'];?></td>
                    <td><?php echo number_format($data['price']);?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>

    <?php } ?>

</section>


<section id="review">

	<div class="re_title wrap tc">
    	공지사항
        <div><a href="#">+more</a></div>
    </div>
    
    <div class="wrap">
        <table class="table1">
            <tr>
                <td style="width:10%;">No</td>
                <td style="width:50%;">Title</td>
                <td style="width:25%;">Date</td>
                <td style="width:15%;">Writer</td>
            </tr>
        </table>
        
        <table class="table2">
            <?php 
                $re = $pdo->query("select * from notice order by date desc limit 0,5");
                $count =1;
                while($data = $re->fetch(2)){
            ?>
            <tr>
                <td style="width:10%;"><?php echo $count;?></td>
                <td style="width:50%;"><?php echo $data['title'];?></td>
                <td style="width:25%;"><?php $d = explode(" ",$data['date']); echo $d[0];?></td>
                <td style="width:15%;"><?php echo $data['writer'];?></td>
            </tr>

            <?php $count++; } ?>
            
                   
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

