/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#sendmail");
	var message = $("#message");
	var messagegroup = $("#messagegroup");
	var messageInfo = $("#messageInfo");
	
	//On blur
	message.blur(validateMessage);

	//On key press
	message.keyup(validateMessage);

	//On Submitting
	form.submit(function(){
		if(validateMessage() == true)
			return true
		else
			return false;
	});
	
	//validation functions
	function validateMessage(){
		//if it's NOT valid
		if(message.val().length < 10){
			messagegroup.removeClass("info");
			messagegroup.addClass("error");
			messageInfo.text("请不小少于十个字！");
			return false;
		}
		//if it's valid
		else{
			messagegroup.removeClass("error");
			messagegroup.addClass("info");
			messageInfo.text("目测无问题");
			return true;
		}
	}
});