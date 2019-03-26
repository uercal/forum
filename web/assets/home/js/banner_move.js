$(function(){
	var bannerFlag=1;
	$(window).resize(function(){
		liWidth();
		$("#banner>ul").css({'left':-(bannerFlag-1)*$(window).width()+'px'});
	});
	liWidth();
	function liWidth(){
		$("#banner>ul>li").width($(window).width());
		$("#banner>ul").width($("#banner>ul>li").length*$(window).width());
	}
	var bannerTimer=setInterval(moveStart,5000);
	function moveStart(){
		if(bannerFlag==$("#banner>ul>li").length){
			bannerFlag=0;
		}
		$("#banner>ul").animate({'left':-bannerFlag*$(window).width()+'px'});
		$("#bannerIndex>a").eq(bannerFlag).addClass("current").siblings("a").removeClass("current");
		bannerFlag++;
	}
	$("#bannerIndex>a").click(function(){
		clearInterval(bannerTimer);
		bannerFlag=$(this).index();
		moveStart();
		bannerTimer=setInterval(moveStart,5000);
	});
	$("#banner>span").click(function(){
		if($("#banner>ul").is(":animated")){
			return false;
		}
		clearInterval(bannerTimer);
		if($(this).attr('id')=="leftBtn"){
			bannerFlag-=2;
			if(bannerFlag<0){
				bannerFlag=$("#banner>ul>li").length-1;
			}
		}
		moveStart();
		bannerTimer=setInterval(moveStart,3000);
	});
});