$(function(){
    $("a.ajax").click(function(){
        $.get($(this).attr('href'), function(data){
            alert(data);
        })
        return false;
    });
});