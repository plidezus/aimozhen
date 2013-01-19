$(function(){
    $("a.ajax").click(function(){
        $.get($(this).attr('href'), function(data){
            alert(data);
        })
        return false;
    });
});


$(function(){
    $(".playbutton").hover(function(){
        $(this).find("span").show();
    },function(){
        $(this).find("span").hide();
    });
});
