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

<!-- 多说js加载开始，一个页面只需要加载一次 -->

var duoshuoQuery = {short_name:"aimozhen"};
(function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = 'http://static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
})();

<!-- 多说js加载结束，一个页面只需要加载一次 -->

var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0123a2f162a7829ef691d1b9702258e3' type='text/javascript'%3E%3C/script%3E"));


 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11082147-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();