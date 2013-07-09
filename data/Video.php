<?php
class Video extends Mysql{
	public $title ;
	public $description ;
	public $url ;
	public $userid ;
	public $like;
	public $viewed;
	public $weekviewed;
	public $tags;
	public $pre_tag;
	public $collection;
	public $createdTime;
	public $verify;
	public $card;
	public $imageUrl;
	
	const VIDEO_TYPE_YOUKU = 1;
	const VIDEO_TYPE_TUDOU = 2;
	const VIDEO_TYPE_SINA = 3;
	const VIDEO_TYPE_56 = 4;
	const VIDEO_TYPE_UNKNOW = -1;

	public function comments() {
		$finder = new Comment();
		$finder->videoid = $this->id;
		return $finder->find();
	}
	
	public function type() {
		if (strpos($this->url, 'youku')) {
			return self::VIDEO_TYPE_YOUKU;
		} elseif (strpos($this->url, 'tudou')) {
			return self::VIDEO_TYPE_TUDOU;
		} elseif (strpos($this->url, 'video.sina.com.cn')) {
			return self::VIDEO_TYPE_SINA;
		} elseif (strpos($this->url, '56.com')) {
			return self::VIDEO_TYPE_56;
		} else {
			return self::VIDEO_TYPE_UNKNOW;
		}
	}
	
	public function content() {
		switch ($this->type()) {
			case self::VIDEO_TYPE_YOUKU:
				return $this->youku_content();
			case self::VIDEO_TYPE_TUDOU:
				return $this->tudou_content();
			case self::VIDEO_TYPE_SINA:
				return $this->sina_content();
			case self::VIDEO_TYPE_56:
				return $this->_56_content();
			default :
				return $this->url;
		}
	}
	
	public function padcontent() {
		switch ($this->type()) {
			case self::VIDEO_TYPE_YOUKU:
				return $this->youku_padcontent();
			case self::VIDEO_TYPE_TUDOU:
				return $this->tudou_padcontent();
			case self::VIDEO_TYPE_SINA:
				return $this->sina_content();
			case self::VIDEO_TYPE_56:
				return $this->_56_content();
			default :
				return $this->url;
		}
	}
	
	public function phonecontent() {
		switch ($this->type()) {
			case self::VIDEO_TYPE_YOUKU:
				return $this->youku_phonecontent();
			case self::VIDEO_TYPE_TUDOU:
				return $this->tudou_phonecontent();
			case self::VIDEO_TYPE_SINA:
				return $this->sina_content();
			case self::VIDEO_TYPE_56:
				return $this->_56_content();
			default :
				return $this->url;
		}
	}
	
	public function save() {
		if (!$this->id) {
			$info = VideoUrlParser::parse($this->url);
			$this->imageUrl = $info['img'];
			$this->title = $info['title'];
		}
		if ($this->type() == self::VIDEO_TYPE_UNKNOW) {
			throw new Exception('This url is not supported.', 2);
		}
		parent::save();
	}
	
	private function youku_content() {
		if (preg_match("/id_(.*?)\.html/", $this->url, $matches)) {
			$id = $matches[1];
		} else
			return '';
		
		return <<<CONTENT
   <embed src="/include/player/youku.swf?showAd=0&VideoIDS={$id}&isAutoPlay=true" allowFullScreen="true" quality="high" width="1002" height="604" align="middle" allowScriptAccess="always" wmode="opaque" mode="transparent" type="application/x-shockwave-flash"></embed>
CONTENT;
	}
	
	private function youku_padcontent() {
		if (preg_match("/id_(.*?)\.html/", $this->url, $matches)) {
			$id = $matches[1];
		} else
			return '';
		
		return <<<CONTENT
   		<iframe height=564 width=1002 src="http://player.youku.com/embed/{$id}" frameborder=0 allowfullscreen></iframe>
CONTENT;
	}
	
		private function youku_phonecontent() {
		if (preg_match("/id_(.*?)\.html/", $this->url, $matches)) {
			$id = $matches[1];
		} else
			return '';
		
		return <<<CONTENT
   		<iframe height=250 width=300 src="http://player.youku.com/embed/{$id}" frameborder=0 allowfullscreen></iframe>
CONTENT;
	}

	private function tudou_content() {
			$info = VideoUrlParser::parse($this->url);
			$iid=$info['iid'];
			return <<<CONTENT
<embed src="/include/player/olc_8.swf?tvcCode=-1&swfPath=/include/player/sp.swf&iid=$iid&autoPlay=true" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" width="1002" height="564"></embed>
CONTENT;
	}
	
	private function tudou_padcontent() {
		if (preg_match("/(\w+)\/\w+\.html$/", $this->url, $matches)) {
			return <<<CONTENT
<iframe width="1002" height="564" frameborder="0" src="http://www.tudou.com/programs/view/html5embed.action?code={$matches[0]}"></iframe>

CONTENT;
		} elseif (preg_match('#/view/(\S+)/#', $this->url, $matches)) {
			return <<<CONTENT
<iframe width="770" height="443" frameborder="0" src="http://www.tudou.com/programs/view/html5embed.action?code={$matches[1]}"></iframe>
CONTENT;
		}

	}
	
		private function tudou_phonecontent() {
		if (preg_match("/(\w+)\/\w+\.html$/", $this->url, $matches)) {
			return <<<CONTENT
<iframe width="300" height="250" frameborder="0" src="http://www.tudou.com/programs/view/html5embed.action?code={$matches[0]}"></iframe>
CONTENT;
		} elseif (preg_match('#/view/(\S+)/#', $this->url, $matches)) {
			return <<<CONTENT
<iframe width="300" height="250" frameborder="0" src="http://www.tudou.com/programs/view/html5embed.action?code={$matches[1]}"></iframe>
CONTENT;
		}

	}
	

	private function sina_content() {
		$info = VideoUrlParser::parse($this->url);
		return $info['object'];
	}

	private function _56_content() {
		if (preg_match("/v_(.*?)\.html$/", $this->url, $matches)) {
			$id = $matches[1];
		} else
			return $this->url;

		return <<<CONTENT
<embed src='http://player.56.com/renrenshare_$id.swf'  type='application/x-shockwave-flash' width='1002' height='564' allowFullScreen='true' allowNetworking='all' allowScriptAccess='always'></embed>
CONTENT;
	}
}

?>
