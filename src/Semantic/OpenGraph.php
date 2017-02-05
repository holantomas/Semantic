<?php


namespace holantomas\Semantic;

use holantomas\Semantic\OpenGraph\Audio;
use holantomas\Semantic\OpenGraph\Image;
use holantomas\Semantic\OpenGraph\IType;
use holantomas\Semantic\OpenGraph\Types\Website;
use holantomas\Semantic\OpenGraph\Video;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class OpenGraph implements IOpenGraph {

	/**
	 * REQUIRED
	 */

	/** @var string - required */
	private $title = '';

	/** @var string - required */
	private $url = '';

	/** @var IType */
	private $type;

	/** @var Image[]|array */
	private $image = [];

	/**
	 * OPTIONAL
	 */

	/** @var string|null */
	private $site = NULL;

	/** @var  string|null */
	private $description = NULL;

	/**
	 * @var string[]|array
	 * @see ILocales
	 */
	private $locale = [];

	/** @var Video[]|array */
	private $video = [];

	/** @var Audio[]|array */
	private $audio = [];


	public function __construct() {
		$this->type = new Website();
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return self
	 */
	public function setTitle($title) {
		$this->title = (string)$title;

		return $this;
	}

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
		$this->url = (string)$url;

		return $this;
	}

	/**
	 * @return IType
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param IType $type
	 * @return self
	 */
	public function setType(IType $type) {
		$this->type = $type;

		return $this;
	}

	/**
	 * @param string      $url
	 * @param string|null $securedUrl
	 * @param string|null $type
	 * @param int|null    $width
	 * @param int|null    $height
	 * @return Image
	 */
	public function addImage($url, $securedUrl = NULL, $type = NULL, $width = NULL, $height = NULL) {
		$image = new Image();
		$image->setUrl($url);
		$image->setSecuredUrl($securedUrl);
		$image->setType($type);
		$image->setWidth($width);
		$image->setHeight($height);
		$this->image[] = $image;
		return $image;
	}

	/**
	 * @return Image[]|array
	 */
	public function getImages(){
		return $this->image;
	}

	/**
	 * @return string|null
	 */
	public function getSiteName() {
		return $this->site;
	}

	/**
	 * @param string|null $site
	 * @return OpenGraph
	 */
	public function setSiteName($site = NULL) {
		$this->site = (string)$site;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string|null $description
	 * @return self
	 */
	public function setDescription($description) {
		$this->description = (string)$description;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLocales() {
		return $this->locale;
	}

	/**
	 * @param string|null $locale
	 * @return self
	 */
	public function addLocale($locale) {
		$this->locale[] = (string) $locale;

		return $this;
	}

	/**
	 * @param string      $url
	 * @param string|null $securedUrl
	 * @param string|null $type
	 * @param int|null    $width
	 * @param int|null    $height
	 * @return Video
	 */
	public function addVideo($url, $securedUrl = NULL, $type = NULL, $width = NULL, $height = NULL) {
		$video = new Video();
		$video->setUrl($url);
		$video->setSecuredUrl($securedUrl);
		$video->setType($type);
		$video->setWidth($width);
		$video->setHeight($height);
		$this->video[] = $video;
		return $video;
	}

	/**
	 * @return Video[]|array
	 */
	public function getVideos(){
		return $this->video;
	}


	/**
	 * @param string      $url
	 * @param string|null $securedUrl
	 * @param string|null $type
	 * @return Audio
	 */
	public function addAudio($url, $securedUrl = NULL, $type = NULL) {
		$audio = new Audio();
		$audio->setUrl($url);
		$audio->setSecuredUrl($securedUrl);
		$audio->setType($type);
		$this->audio[] = $audio;
		return $audio;
	}

	/**
	 * @return Video[]|array
	 */
	public function getAudios(){
		return $this->video;
	}

}