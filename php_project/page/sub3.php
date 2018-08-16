<?php include("../include/header.php"); ?>

<!-- content -->
<section id="content">
    <div id="title1">공지사항</div>
    
    <style>
        .hit{background:yellow; color:red;}    
    </style>
    
    <div class="wrap mat30 mab40">
        <?php
            if(isset($_POST['search'])){

                $search = $_POST['search'];

            }else if(isset($_GET['search'])){

                $search = $_GET['search'];

            }else{
                $search = "";
            }
            function search_replace($se,$subject){
                return str_replace($se,"<span class='hit'>{$se}</span>",$subject);
            }
        ?>
        <div>
            <form action="/page/sub3.php" method="post">
                <input type="text" name="search" value="<?php echo $search;?>" style="padding:3px;border:solid 1px #cccc;">
                <input type="submit" value="검 색">
            </form> 
        </div>
        <table id="m_table" style="width:100%; margin-top:40px;">
            <thead>
                <tr>
                    <td>번 호</td>
                    <td style="width:35%;">제 목</td>
                    <td>작성자</td>
                    <td>작성일</td>
                </tr>
            </thead>
            
            <tbody>
            <?php

                //for($i=1;$i<121;$i++){
                //    $title = "공지사항 {$i}입니다.";
                //    $con = "공지사항 {$i}입니다. 공지사항 {$i}입니다.";

                //    $pdo->query("insert into notice(title,con,date) values('$title','$con',now())");
                //}

                $sql = "select * from notice ";
                if($search){
                    $sql .= " where title like('%$search%') or writer like('%$search%')";
                }
                

                $re = $pdo->query($sql);
                $total = $re->rowCount();

                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $list = 10;

                $total_page = ceil($total/$list);

                $start = ($page-1) * $list;

                $p_page = $page - 1;
                if($p_page == 0){ $p_page =1; }

                $n_page = $page + 1;
                if($n_page > $total_page){ $n_page = $total_page;}

                $sql .= " order by date desc limit {$start},{$list} ";
                $re = $pdo -> query($sql);

                $num = $total - $start;

                while($data = $re->fetch(2)){
            ?>
                <tr>
                    <td><?php echo $num; ?></td>
                    <td style="width:35%;"><a href="/page/sub3_view.php?idx=<?php echo $data['idx'];?>" title="<?php echo $data['title'];?>"><?php echo search_replace($search,$data['title']);?></a></td>
                    <td><?php echo search_replace($search,$data['writer']);?></td>
                    <td><?php echo search_replace($search,$data['date']);?></td>
                </tr>
            <?php $num--; } ?>

                <tr>
                    <td colspan="4">
                        <button onclick="location.href='/page/sub3.php?page=<?php echo $p_page?> &search=<?php echo $search;?>'">이 전</button> &nbsp;
                        <?php
                            for($i=1; $i<=$total_page; $i++){
                        ?>
                            <a href="/page/sub3.php?page=<?php echo $i;?>&search=<?php echo $search;?>"><?php echo $i;?></a> &nbsp;
                         <?php }  ?>
                         <button onclick="location.href='/page/sub3.php?page=<?php echo $n_page?> &search=<?php echo $search;?>'">다 음</button> 
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="width:100%; text-align:right; margin-top:30px;">
            <?php if(isset($_SESSION['id']) && $_SESSION['id'] == "admin"){ ?>
                <input type="button" class="n_btn" value="글쓰기" onclick="location.href='/page/sub3_write.php'">
            <?php } ?>
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

