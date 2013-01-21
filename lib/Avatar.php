<?php
//lianghonghao@baixing.com
/**
 * Gravatar Class
 */
class Avatar {
	public $email;
	public $default = 'http://www.aimozhen.com/images/atlogo.jpg';

	public function __construct($email) {
		$this->email = $email;
	}

	public function link($size = 32) {
		return "http://www.gravatar.com/avatar/"
			. md5( strtolower( trim( $this->email ) ) )
			. "?d=" . urlencode( $this->default )
			. "&s=" . $size;
	}

	public function editLink() {
		return "http://gravatar.com/emails/";
	}
}
