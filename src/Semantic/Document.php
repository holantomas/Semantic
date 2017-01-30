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

	/** @var string */
	private $title = '';

	/** @var string */
	private $description = '';

	/** @var string */
	private $keywords = '';

	/** @var string */
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

	/**
	 * @param bool $withWarnings
	 * @return bool
	 */
	public function check($withWarnings = TRUE) {
		if (empty($this->getTitle())) {
			if ($withWarnings) {
				trigger_error("Property title is not set", E_USER_WARNING);
			}
			return FALSE;
		}

		if (empty($this->getDescription())) {
			if ($withWarnings) {
				trigger_error("Property description is not set", E_USER_WARNING);
			}
			return FALSE;
		}

		if (empty($this->getKeywords())) {
			if ($withWarnings) {
				trigger_error("Property keywords is not set", E_USER_WARNING);
			}
			return FALSE;
		}

		if (empty($this->getHeading())) {
			if ($withWarnings) {
				trigger_error("Property header is not set", E_USER_WARNING);
			}
			return FALSE;
		}

		return TRUE;
	}

	/**
	 * Application onPresenter callback
	 *
	 * @param Application $sender
	 * @param Presenter   $presenter
	 */
	public function register(Application $sender, Presenter $presenter){
		if ($this->isRegistered) {
			return;
		}
		$presenter->getTemplate()->document = $this;
		$this->isRegistered = TRUE;

		$presenter->onShutdown[] = function(Presenter $sender) {
			/** @var IDocument $doc */
			$doc = $sender->getTemplate()->document;
			$doc->check(!SemanticPanel::isEnabled());
		};
	}


}