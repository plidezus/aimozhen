<?php
class Video extends Mysql{
	public $title ;
	public $description ;
	public $url ;
	public $userid ;
	public $like;
	public $viewed;
	public $tags;
	public $createdTime;
	public $imageUrl;
	
	const VIDEO_TYPE_YOUKU = 1;
	const VIDEO_TYPE_TUDOU = 2;
	const VIDEO_TYPE_KU6 = 3;
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
		} elseif (strpos($this->url, 'ku6')) {
			return self::VIDEO_TYPE_KU6;
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
			case self::VIDEO_TYPE_KU6:
				return $this->ku6_content();
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
   <embed src="http://player.youku.com/player.php/sid/{$id}/v.swf" allowFullScreen="true" quality="high" width="750" height="443" align="middle" allowScriptAccess="always" wmode="opaque" mode="transparent" type="application/x-shockwave-flash"></embed>
CONTENT;
	}

	private function tudou_content() {
		if (preg_match("/(\w+)\/\w+\.html$/", $this->url, $matches)) {
			return <<<CONTENT
<embed src="http://www.tudou.com/l/{$matches[0]}/&resourceId=0_05_05_99&iid=141206757/v.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" mode="transparent" width="750" height="443"></embed>
CONTENT;
		} elseif (preg_match('#/view/(\S+)/#', $this->url, $matches)) {
			return <<<CONTENT
<embed src="http://www.tudou.com/v/$matches[1]/&resourceId=0_05_05_99&bid=05/v.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" width="480" height="400"></embed>
CONTENT;
		}

	}

	private function ku6_content() {
		if (preg_match("/\/(.*?)\.html$/", $this->url, $matches)) {
			$id = $matches[1];
		} else
			return '';
		return <<<CONTENT
<embed src="http://player.ku6.com/refer/{$id}/v.swf" width="750" height="443" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" wmode="opaque" mode="transparent" flashvars="from=ku6"></embed>
CONTENT;
	}

	private function _56_content() {
		if (preg_match("/v_(.*?)\.html$/", $this->url, $matches)) {
			$id = $matches[1];
		} else
			return $this->url;

		return <<<CONTENT
<embed src='http://player.56.com/cpm_$id.swf'  type='application/x-shockwave-flash' width='480' height='405' allowFullScreen='true' allowNetworking='all' allowScriptAccess='always'></embed>
CONTENT;
	}
}

?>
