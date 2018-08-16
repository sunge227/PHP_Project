<?php include ("../include/lib.php"); ?>

<?php
    
    $num = $_POST['num'];

    if(in_array("",$num)){
        alert("6개의 번호를 선택해 주세요.");
        back();
    }
    
    $num = array_unique($num);

    if(count($num) != 6){
        alert("중복되는 번호가 있습니다.");
        back();
    }

    sort($num); //오름차순 rsort 내림차순

    $re = $pdo->query("select * from bet where turn = '$turn'");

    while($data = $re->fetch(2)){
        $hit = 0;
        $my_gap = 0;
        $tmp_gap = 0;

        $result = explode(",",$data['result']);

        for($i=0;$i<count($result);$i++){
            if(in_array($result[$i],$num)){
                $hit++;
            }
            else{
                $my_gap += $result[$i];
            }
        }
        for($i=0;$i<count($num);$i++){
            if(!in_array($num[$i],$result)){
                $tmp_gap += $num[$i];
            }
        }

        $gap = abs($my_gap - $tmp_gap);
        
        $pdo->query("update bet set hit = '$hit', gap = '$gap' where idx = '{$data['idx']}'");
    }
 
    $re = $pdo -> query("select * from lotto where turn = '$turn'");

    while($room = $re->fetch(2)){
        $re2 = $pdo ->query("select * from bet where turn = '$turn' and name = '{$room['name']}' 
            and num = '{$room['num']}' order by hit desc, gap asc");

        $count = 1;
        $rank = 1;
        $tmp_hit = "";
        $tmp_gap = "";
        $point = 0;

        while($data = $re2 ->fetch(2)){
            if($tmp_hit !=$data['hit'] || $tmp_gap !=$data['gap']){
                $rank = $count;
            }
            $tmp_hit = $data['hit'];
            $tmp_gap = $data['gap'];

            $pdo->query("update bet set rank = '$rank' where idx = '{$data['idx']}'");

            $count++;

            $point += $data['point'];
        }
        $first = $pdo->query("select * from bet where rank='1' and turn='$turn' and name = '{$room['name']}' and num='{$room['num']}'") ->rowCount();

        $price = $point *0.8 / $first;
        $donate = $point *0.2;

        $pdo->query("update donate set total = total+'$donate' where name = '{$room['name']}'");
        
        $pdo->query("update bet set price ='$price' where rank='1' and turn='$turn' and name = '{$room['name']}'
         and num='{$room['num']}'");
    }

    $re = $pdo->query("select * from bet where turn = '$turn' and rank='1'");

    while($data = $re->fetch(2)){
        $pdo ->query("update member set n_point = n_point+'{$data['price']}' where id = '{$data['id']}'");
    }
    $result = implode(",",$num);

    $pdo->query("insert into result(turn,result) values('$turn','$result')");

    $pdo->query("insert into lotto(turn,name,num,point,total,img) values('$turn'+1,'독거노인돕기','1','10000','10','old_man')");
    $pdo->query("insert into lotto(turn,name,num,point,total,img) values('$turn'+1,'불우아동돕기','1','20000','5','child')");

    alert("결과가 입력되었습니다.");
    move("/");
?>
