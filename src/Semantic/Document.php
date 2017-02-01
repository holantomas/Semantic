<?php


namespace holantomas\Semantic;

use holantomas\Semantic\Bridges\Tracy\SemanticPanel;
use Nette\Application\Application;
use Nette\Application\UI\Presenter;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class Document implements IDocument {

	/**
	 * @var string
	 * @required
	 * @panel
	 */
	private $title = '';

	/**
	 * @var string
	 * @required
	 * @panel
	 */
	private $description = '';

	/**
	 * @var string
	 * @required
	 * @panel
	 */
	private $keywords = '';

	/**
	 * @var string
	 * @required
	 * @panel
	 */
	private $heading = '';

	/** @var bool */
	private $isRegistered = FALSE;


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
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return self
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getKeywords() {
		return $this->keywords;
	}

	/**
	 * @param string $keywords
	 * @return self
	 */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
		return $this;
	}

	/**
	 * Aka H1 tag
	 * @return string
	 */
	public function getHeading() {
		return $this->heading;
	}

	/**
	 * Aka H1 tag
	 * @param string $heading
	 * @return self
	 */
	public function setHeading($heading) {
		$this->heading = $heading;
		return $this;
	}


}