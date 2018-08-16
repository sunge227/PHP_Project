
function pop(){

	window.open("/page/message.php","","width=800,height=500");

}

function chk_num(th){

	dis = $(th).find("span").css("display");

	if(dis == "none"){
		$(th).find("span").css("display","block");
	}else{
		$(th).find("span").css("display","none");
	}

}

function can(){
	$(".num_box").find("span").css("display","none");
}


function bet(idx){
	num_arr = [];

	$(".num_box").each(function(ind,ele){
		if($(this).find("span").css("display") == "block"){
			num_arr.push(ind+1);
		}
	});

	if(num_arr.length != 6){
		alert("6개의 번호를 선택해 주세요.");
		return false;
	}

	$.post("/page/lotto_ok.php",{arr:num_arr,idx:idx},function(data){
		data = data.trim();
		if(data == "ok"){
			alert("구매가 되었습니다.");
			location.reload();
		}else{
			alert(data);
			return false;
		}

	});

}

function ch_room(val){
	$.post("/page/ch_room.php",{s_turn:val},function(data){

		$("#vv_kind").html(data);
	});
}

function ch_list(){
	s_turn = $("#vv_time").val();
	num = $("#vv_kind").val();
		$.post("/page/ch_list.php",{s_turn:s_turn,num:num},function(data){

		$("#m_table tbody").html(data);
		$("#i_turn").html(s_turn);
		$("#i_name").html(num);
	});
}