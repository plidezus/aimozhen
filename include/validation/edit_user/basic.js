/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#basic");
	var name = $("#name");
	var namegroup = $("#namegroup");
	var nameInfo = $("#nameInfo");
	
	//On blur
	name.blur(validateName);

	//On key press
	name.keyup(validateName);

	//On Submitting
	form.submit(function(){
		if(validateName() == true)
			return true
		else
			return false;
	});
	
	//validation functions
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 4){
			namegroup.removeClass("info");
			namegroup.addClass("error");
			nameInfo.text("请不小少于三个字！");
			return false;
		}
		//if it's valid
		else{
			namegroup.removeClass("error");
			namegroup.addClass("info");
			nameInfo.text("输入正确");
			return true;
		}
	}
});