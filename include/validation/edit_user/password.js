/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#password");
	var pass1 = $("#pass1");
	var pass1group = $("#pass1group");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2group = $("#pass2group");
	var pass2Info = $("#pass2Info");
	
	//On blur
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	//On key press
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	//On Submitting
	form.submit(function(){
		if(validatePass1() & validatePass2())
			return true
		else
			return false;
	});
	
	//validation functions

	function validatePass1(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(pass1.val().length <5){
			pass1group.addClass("error");
			pass1Info.text("请不小少于五个字！");
			return false;
		}
		//it's valid
		else{			
			pass1group.removeClass("error");
			pass1group.addClass("info");
			pass1Info.text("输入正确");
			validatePass2();
			return true;
		}
	}
	function validatePass2(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2group.removeClass("info");
			pass2group.addClass("error");
			pass2Info.text("两个密码不相同！");
			return false;
		}
		//are valid
		else{
			pass2group.removeClass("error");
			pass2group.addClass("info");
			pass2Info.text("输入正确");
			return true;
		}
	}
});