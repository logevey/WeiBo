var ImgIputHandler={
	facePath:[
		{faceName:"微笑",facePath:"../images/face/0_微笑.gif"},
		{faceName:"撇嘴",facePath:"../images/face/1_撇嘴.gif"},
		{faceName:"色",facePath:"../images/face/2_色.gif"},
		{faceName:"发呆",facePath:"../images/face/3_发呆.gif"},
		{faceName:"得意",facePath:"../images/face/4_得意.gif"},
		{faceName:"流泪",facePath:"../images/face/5_流泪.gif"},
		{faceName:"害羞",facePath:"../images/face/6_害羞.gif"},
		{faceName:"闭嘴",facePath:"../images/face/7_闭嘴.gif"},
		{faceName:"大哭",facePath:"../images/face/9_大哭.gif"},
		{faceName:"尴尬",facePath:"../images/face/10_尴尬.gif"},
		{faceName:"发怒",facePath:"../images/face/11_发怒.gif"},
		{faceName:"调皮",facePath:"../images/face/12_调皮.gif"},
		{faceName:"龇牙",facePath:"../images/face/13_龇牙.gif"},
		{faceName:"惊讶",facePath:"../images/face/14_惊讶.gif"},
		{faceName:"难过",facePath:"../images/face/15_难过.gif"},
		{faceName:"酷",facePath:"../images/face/16_酷.gif"},
		{faceName:"冷汗",facePath:"../images/face/17_冷汗.gif"},
		{faceName:"抓狂",facePath:"../images/face/18_抓狂.gif"},
		{faceName:"吐",facePath:"../images/face/19_吐.gif"},
		{faceName:"偷笑",facePath:"../images/face/20_偷笑.gif"},
	   	{faceName:"可爱",facePath:"../images/face/21_可爱.gif"},
		{faceName:"白眼",facePath:"../images/face/22_白眼.gif"},
		{faceName:"傲慢",facePath:"../images/face/23_傲慢.gif"},
		{faceName:"饥饿",facePath:"../images/face/24_饥饿.gif"},
		{faceName:"困",facePath:"../images/face/25_困.gif"},
		{faceName:"惊恐",facePath:"../images/face/26_惊恐.gif"},
		{faceName:"流汗",facePath:"../images/face/27_流汗.gif"},
		{faceName:"憨笑",facePath:"../images/face/28_憨笑.gif"},
		{faceName:"大兵",facePath:"../images/face/29_大兵.gif"},
		{faceName:"奋斗",facePath:"../images/face/30_奋斗.gif"},
		{faceName:"咒骂",facePath:"../images/face/31_咒骂.gif"},
		{faceName:"疑问",facePath:"../images/face/32_疑问.gif"},
		{faceName:"嘘",facePath:"../images/face/33_嘘.gif"},
		{faceName:"晕",facePath:"../images/face/34_晕.gif"},
		{faceName:"折磨",facePath:"../images/face/35_折磨.gif"},
		{faceName:"衰",facePath:"../images/face/36_衰.gif"},
		{faceName:"骷髅",facePath:"../images/face/37_骷髅.gif"},
		{faceName:"敲打",facePath:"../images/face/38_敲打.gif"},
		{faceName:"再见",facePath:"../images/face/39_再见.gif"},
		{faceName:"擦汗",facePath:"../images/face/40_擦汗.gif"},
		
		{faceName:"抠鼻",facePath:"../images/face/41_抠鼻.gif"},
		{faceName:"鼓掌",facePath:"../images/face/42_鼓掌.gif"},
		{faceName:"糗大了",facePath:"../images/face/43_糗大了.gif"},
		{faceName:"坏笑",facePath:"../images/face/44_坏笑.gif"},
		{faceName:"左哼哼",facePath:"../images/face/45_左哼哼.gif"},
		{faceName:"右哼哼",facePath:"../images/face/46_右哼哼.gif"},
		{faceName:"哈欠",facePath:"../images/face/47_哈欠.gif"},
		{faceName:"鄙视",facePath:"../images/face/48_鄙视.gif"},
		{faceName:"委屈",facePath:"../images/face/49_委屈.gif"},
		{faceName:"快哭了",facePath:"../images/face/50_快哭了.gif"},
		{faceName:"阴险",facePath:"../images/face/51_阴险.gif"},
		{faceName:"亲亲",facePath:"../images/face/52_亲亲.gif"},
		{faceName:"吓",facePath:"../images/face/53_吓.gif"},
		{faceName:"可怜",facePath:"../images/face/54_可怜.gif"},
		{faceName:"菜刀",facePath:"../images/face/55_菜刀.gif"},
		{faceName:"西瓜",facePath:"../images/face/56_西瓜.gif"},
		{faceName:"啤酒",facePath:"../images/face/57_啤酒.gif"},
		{faceName:"篮球",facePath:"../images/face/58_篮球.gif"},
		{faceName:"乒乓",facePath:"../images/face/59_乒乓.gif"},
		{faceName:"拥抱",facePath:"../images/face/78_拥抱.gif"},
		{faceName:"握手",facePath:"../images/face/81_握手.gif"},
		{faceName:"得意地笑",facePath:"../images/face/得意地笑.gif"},
		{faceName:"听音乐",facePath:"../images/face/听音乐.gif"}
	]
	,
	Init:function(){
		var isShowImg=false;
		$(".Input_text").focusout(function(){
			$(this).parent().css("border-color", "#cccccc");
            $(this).parent().css("box-shadow", "none");
            $(this).parent().css("-moz-box-shadow", "none");
            $(this).parent().css("-webkit-box-shadow", "none");
		});
		$(".Input_text").focus(function(){
		$(this).parent().css("border-color", "rgba(19,105,172,.75)");
        $(this).parent().css("box-shadow", "0 0 3px rgba(19,105,192,.5)");
        $(this).parent().css("-moz-box-shadow", "0 0 3px rgba(241,39,232,.5)");
        $(this).parent().css("-webkit-box-shadow", "0 0 3px rgba(19,105,252,3)");
		});
		$(".imgBtn").click(function(){
			if(isShowImg==false){
				isShowImg=true;
			    $(this).parent().prev().animate({marginTop:"-125px"},300);
				if($(".faceDiv").children().length==0){
					for(var i=0;i<ImgIputHandler.facePath.length;i  ){
						$(".faceDiv").append("<img title=\"" ImgIputHandler.facePath[i].faceName "\" src=\"face/" ImgIputHandler.facePath[i].facePath "\" />");
					}
					$(".faceDiv>img").click(function(){
						 
				 		isShowImg=false;
			            $(this).parent().animate({marginTop:"0px"},300);
						ImgIputHandler.insertAtCursor($(".Input_text")[0],"[" $(this).attr("title") "]");
					});
				}
			}else{
				isShowImg=false;
			    $(this).parent().prev().animate({marginTop:"0px"},300);
			}
		});
		$(".postBtn").click(function(){
			alert($(".Input_text").val());
		});
	},
	insertAtCursor:function(myField, myValue) {
    if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = myValue;
        sel.select();
    } else if (myField.selectionStart || myField.selectionStart == "0") {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        var restoreTop = myField.scrollTop;
        myField.value = myField.value.substring(0, startPos)   myValue   myField.value.substring(endPos, myField.value.length);
        if (restoreTop > 0) {
            myField.scrollTop = restoreTop;
        }
        myField.focus();
        myField.selectionStart = startPos   myValue.length;
        myField.selectionEnd = startPos   myValue.length;
    } else {
        myField.value  = myValue;
        myField.focus();
    }
}
}