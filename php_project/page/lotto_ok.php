<?php include("../include/lib.php"); ?>
<?php
    $arr = $_POST['arr'];
    $idx = $_POST['idx'];


    $result = implode(",",$arr);

    $room = $pdo->query("select * from lotto where idx = '$idx'")->fetch(2);

    $name = $room['name'];
    $num = $room['num'];
    $point = $room['point'];
    $total = $room['total'];
    $img = $room['img'];

    $same = $pdo->query("select * from bet where turn='$turn' and name='$name' and num='$num' and result='$result' ")->rowCount();
    $total_num = $pdo->query("select * from bet where turn='$turn' and name='$name' and num='$num' ")->rowCount();

    $mem = $pdo->query("select * from member where id = '{$_SESSION['id']}'")->fetch(2);

    if($same > 0){
        echo "동일한 조합의 번호가 존재합니다.";
    }else if($point > $mem['n_point']){
        echo "포인트가 부족합니다.";
    }else if($total_num == $total){
        echo "현재 방의 정원이 다 찼습니다.";
    }else{
        echo "ok";
        $pdo->query("insert into bet(id,turn,name,num,result,point,date) 
            values('{$mem['id']}','$turn','$name','$num','$result','$point',now())");

        $pdo->query("update member set n_point = n_point - '$point' where id = '{$mem['id']}'");

        $total_num = $pdo->query("select * from bet where turn='$turn' and name='$name' and num='$num' ")->rowCount();

        if($total_num == $total){
            $pdo->query("insert into lotto(turn,name,num,point,total,img) 
                values('$turn','$name','$num'+1,'$point','$total','$img')");
        }
    }


?>