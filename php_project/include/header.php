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

<!-- header -->

<header>
    
	<div class="wrap">

		<div class="fl">    
        	<div id="logo">
                <a href="/page/index.php" title="홈">
                    <img src="/image/logo.png" alt="홈">   
                </a>
            </div>
        </div>
        
        <nav>
        	<ul>                
                <li><a href="/page/index.php">메인페이지</a></li>
				<li><a href="/page/sub1.php">참가내역</a></li>
				<li><a href="/page/sub2.php">당첨자보기</a></li>
				<li><a href="/page/sub3.php">공지사항</a></li>
            </ul>
        </nav>
		
        <div id="top">
            <?php
                if(!isset($_SESSION['id'])){
            ?>

                <a href="/page/join.php">회원가입</a> &nbsp;&nbsp;
                <a href="/page/login.php">로그인</a>

            <?php }else if($_SESSION['id'] == "admin"){ ?>

                <span class="blue cu"><?php echo $_SESSION['id'];?></span> 님 &nbsp; 
                <a href="/page/admin.php">관리자페이지</a> &nbsp; 
                <a href="/page/logout.php">로그아웃</a>

            <?php }else{  ?>	

                <?php
                    $data = $pdo->query("select * from member where id = '{$_SESSION['id']}'")->fetch(2);
                    $mes = $pdo->query("select * from message where id = '{$_SESSION['id']}' and view = 'X' ")->rowCount();
                ?>

            	<span class="blue cu"><?php echo $data['id'];?></span> 님 &nbsp; 
                메시지 : <span class="fb red cu" onclick="pop()"><?php echo $mes;?></span> 개, &nbsp;
                나눔포인트 : <span class="blue fb"><?php echo number_format($data['n_point']);?> </span> &nbsp;&nbsp;
    			회원포인트 : <span class="blue fb"><?php echo number_format($data['point']);?></span> &nbsp;&nbsp;
                <a href="/page/logout.php">로그아웃</a>

            <?php } ?>
        </div>
        
	</div>
    
</header>

<!-- slide -->

<section id="slide">
	<img src="/image/visual.jpg" alt="visual">
</section>
