/***************************/			
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#post");
	var url = $("#url");
	var urlgroup = $("#urlgroup");
	var urlInfo = $("#urlInfo");
	
	//On blur
	url.blur(validateUrl);
	//On key press
	url.keyup(validateUrl);
	//On Submitting
	form.submit(function(){
		if(validateUrl())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateUrl(){
		//if it's NOT valid
		if(url.val().indexOf('youku')>-1){
			urlgroup.removeClass("error");
			urlgroup.addClass("info");
			urlInfo.text("来自优酷视频 验证通过 请继续点击发布");
			return true;
		}
		if(url.val().indexOf('tudou')>-1){
			urlgroup.removeClass("error");
			urlgroup.addClass("info");
			urlInfo.text("来自土豆视频 验证通过 请继续点击发布");
			return true;
		}
		if(url.val().indexOf('56.com')>-1){
			urlgroup.removeClass("error");
			urlgroup.addClass("info");
			urlInfo.text("来自56视频 验证通过 请继续点击发布");
			return true;
		}
		if(url.val().indexOf('video.sina.com.cn')>-1){
			urlgroup.removeClass("error");
			urlgroup.addClass("info");
			urlInfo.text("来自新浪博客 验证通过 请继续点击发布");
			return true;
		}
		//if it's valid
		else{
			urlgroup.removeClass("info");
			urlgroup.addClass("error");
			urlInfo.text("不好意思 暂时不支持该网站的视频~");
			return false;
		}
	}

});