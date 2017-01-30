<?php


namespace holantomas\Semantic;

use holantomas\Semantic\OpenGraph\IType;
use holantomas\Semantic\OpenGraph\Types\Website;


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

	private $image = [];

	public function __construct() {
		$this->type = new Website();
	}


	/**
	 * OPTIONAL
	 */

	/** @var string|null */
	private $site = NULL;

	/** @var  string|null */
	private $description = NULL;

	/**
	 * @var string|null
	 * @see ILocales
	 */
	private $locale = NULL;

	/**
	 * @var string[]|array
	 * @see ILocales
	 */
	private $localeAlternate = [];


	private $audio = [];


	private $video = [];

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
		$this->title = (string) $title;

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
		$this->url = (string) $url;

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
	 * @return string|null
	 */
	public function getSiteName(){
		return $this->site;
	}

	/**
	 * @param string|null $site
	 * @return OpenGraph
	 */
	public function setSiteName($site = NULL){
		$this->site = (string) $site;
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
		$this->description = (string) $description;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLocale() {
		return $this->locale;
	}

	/**
	 * @param string|null $locale
	 * @return self
	 */
	public function setLocale($locale) {
		$this->locale = (string) $locale;

		return $this;
	}

}