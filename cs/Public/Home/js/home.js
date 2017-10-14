// 意见反馈
function opinion(){
		var opinion = $('#opinion').css('display');
		if(opinion=='none'){
			$('#opinion').css('display','');
		}else{
			$('#opinion').css('display','none');
		}
}

function alter(){
	$('#myModal').modal({
	  keyboard: false,
	  backdrop: 'static',
	  keyboard: false,
	});
	}
function submit(){
	if($('#clickme').text())$('[name=reserve_time]').val($('#clickme').text());
	$('#jsApi').submit();

}
function abc(obj){
	var obj = $(obj);
	var address_id = obj.attr('val');
	$('.address div img').attr('src','/Public/Home/img/select.png');
	obj.children('img').attr('src','/Public/Home/img/gouxuan.png');
	if($('#clickme').text())$('[name=reserve_time]').val($('#clickme').text());
	$('[name=address_id]').val(address_id);
	if($('[name=address_id]').val()){
		var sub = $('.details_payment');
		sub.text('提交订单');
		sub.attr('onclick','submit()');
	}
}

