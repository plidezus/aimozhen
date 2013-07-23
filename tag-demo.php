<?php
include "include/init.php";
$pagename = "index";$headname = "discover";
include 'view/base/header.php';
$amzpage = isset($_GET['p']) ? intval($_GET['p']) : 1;
if (isset($_GET['amzpage'])) { $page = $_GET['amzpage']; } else { $page = ($amzpage-1)*3+1 ;}
$page_size = 23;
?>


      <script src='/media/js/bootstrap-tags.js'></script>
      <link rel="stylesheet" type="text/css" href="/media/css/bootstrap-tags.css" />
   </head>
   <body>
      <div class="container">
         <h3>标签动态演示</h3>
         The following tag-list is unfiltered, with the suggestions "here", "are", "some", "suggestions". It is set to exclude a few terms: "excuse", "my", "vulgarity" and anything with an exclamation point. Additionally, this tag-list has popovers enabled. Should you want to programmatically define what the popover content is for a given tag, the definePopover(tag) method can be overwritten. Tags are defined in jQuery statement. This is the default color
         <div id="one" class="tag-list">
            <div class="tags"></div>
         </div>
         The second tag-list has a number of suggested terms and a couple restricted terms ("restrict", "to", "these").
         <br />By default, all suggested terms are allowed, so if a user deletes one, it can be repopulated. Popovers are disabled. This tag-list substitutes in a custom function (whenAddingTag) that logs the tag to the console if it is successfully added -- a more practical use would be to fetch popover content for the tag that was added with setPopover(tag, content) in an ajax callback. Tags are defined from .tag-data div. This example overrides default display class (btn-info) with .btn-warning. NB:  As shown, the width of the containing (.tag-list) div is inherited by most children elements.
         <div id="two" class="tag-list" style="width:350px;">
            <div class="tag-data">tag5,tag6,tag7,tag8</div>
            <div class="tags"></div>
         </div>
         The third tag-list is read only
         <div id="read-only" class="tag-list">
            <div class="tags"></div>
         </div>
         Here are some other colors (pulled right from bootstrap styling, so if you change the bootstrap colors, these will all change accordingly)
         <div id="three" class="tag-list">
            <div class="tags"></div>
         </div>

         <button class="btn btn-small btn-success" onclick="addtag123( '美国' )" type="button">美国</button> <button class="btn btn-small btn-success" onclick="addtag123( '日本' )" type="button">日本</button> <button class="btn btn-small btn-success" onclick="addtag123( '英国' )" type="button">英国</button> <button class="btn btn-small btn-success" onclick="addtag123( '德国' )" type="button">德国</button>
<br><br>

         <div id="four" class="tag-list">
            <div class="tags"></div>
         </div>
         <div id="five" class="tag-list">
            <div class="tags"></div>
         </div>
         <script>
            $(function() {	
            	pressedUp = function(e) { console.log('pressed up'); };
            	beforeAddingTag = function (tag) {
            		console.log(tag);
            		// maybe fetch some content for the tag popover (can be HTML)
            	};
            	excludes = function (tag) {
            		// return false if this tagger does *not* exclude
            		// -> returns true if tagger should exclude this tag
            		// --> this will exclude anything with !
            		return (tag.indexOf("!") != -1);
            	}
            	var tags = $('#one').tags( {
            		suggestions : ["here", "are", "some", "suggestions"],
            		popoverData : ["What a wonderful day", "to make some stuff", "up so that I", "can show it works"],
                  popoverTrigger : 'hoverShowClickHide',
            		tagData: ["tag a", "tag b", "tag c", "tag d"],
            		excludeList : ["excuse", "my", "vulgarity"],
            		excludes : excludes,
            		tagRemoved: function(tag) { console.log(tag) }
            	} );
            	var alsoTags = $('#one').tags();
            	alsoTags.removeTag("tag c");
            	console.log(tags.removeTag("tag a").renameTag("tag b", "new tag b").addTag("added tag").getTags());
              
			  
			   $('#read-only').tags( {
                  tagData: ['有些', '标签','是', '不能', '被编辑的'],
                  readOnly: true
               });
            	$('#two').tags( {
            		suggestions : ["there", "were", "some", "suggested", "terms", "super", "secret", "stuff"],
            		//restrictTo : ["restrict", "to", "these"],
            		beforeAddingTag : beforeAddingTag,
            		pressedUp : pressedUp,
            		tagClass : 'btn-warning' } );
            	$('#three').tags( {
            		tagData  : ["搞笑", "3D", "中国", "法国"],
            		tagClass : 'btn-success'
            	});
				
            	
				
				
            	$('#four').tags( {
            		tagData  : ["老虎", "猫", "狗", "鸟"],
            		tagClass : 'btn-danger disabled'
            	});
            	$('#five').tags( {
            		promptText : "请输入标签 回车确认"
            	});
            });
             function addtag123( title ){  $('#three').tags(0).addTag( title ); } 
         </script>
      </div>
<?php
require_once 'view/base/footer.php';
?>