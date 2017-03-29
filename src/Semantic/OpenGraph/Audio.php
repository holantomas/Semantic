<?php


namespace holantomas\Semantic\OpenGraph;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class Audio {

	const M2A	= 'audio/mpeg';
	const MID	= 'audio/midi';
	const MIDI	= 'audio/midi';
	const MP2	= 'audio/mpeg';
	const MP3	= 'audio/mpeg3';

	/** @var string */
	protected $url;

	/** @var string */
	protected $securedUrl = NULL;

	/** @var string */
	protected $type = NULL;

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

}