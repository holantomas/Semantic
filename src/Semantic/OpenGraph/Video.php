<?php


namespace holantomas\Semantic\OpenGraph;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class Video {

	const MOV	= 'video/quicktime';
	const MPEG	= 'video/mpeg';
	const M1V	= 'video/mpeg';
	const M2V	= 'video/mpeg';
	const MP4	= 'video/mp4';
	const AVI	= 'video/avi';
	const FLV	= 'video/x-flv';
	const WMV	= 'video/x-ms-wmv';
	const SWF	= 'application/x-shockwave-flash';

	/** @var string */
	protected $url;

	/** @var string */
	protected $securedUrl = NULL;

	/** @var string */
	protected $type = NULL;

	/** @var int|null */
	protected $width = NULL;

	/** @var int|null */
	protected $height = NULL;

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param string $url
	 * @return self
	 */
	public function setUrl($url) {
		$this->url = $url;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecuredUrl() {
		return $this->securedUrl;
	}

	/**
	 * @param string $securedUrl
	 * @return self
	 */
	public function setSecuredUrl($securedUrl) {
		$this->securedUrl = $securedUrl;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return self
	 */
	public function setType($type) {
		$this->type = $type;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * @param int|null $width
	 * @return self
	 */
	public function setWidth($width) {
		$this->width = $width;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * @param int|null $height
	 * @return self
	 */
	public function setHeight($height) {
		$this->height = $height;

		return $this;
	}

}