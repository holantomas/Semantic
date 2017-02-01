<?php


namespace holantomas\Semantic\Bridges\Nette;

use holantomas\Semantic\Bridges\Tracy\SemanticPanel;
use holantomas\Semantic\Checker;
use holantomas\Semantic\IDocument;
use Nette\Application\Application;
use Nette\Application\UI\Presenter;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class Registrator {

	/** @var IDocument */
	private $document;

	/** @var bool */
	private $documentRegistered = FALSE;

	/**
	 * @param IDocument $document
	 */
	public function injectDocument(IDocument $document) {
		$this->document = $document;
	}

	/**
	 * @param Application $sender
	 * @param Presenter   $presenter
	 */
	public function registerDocument(Application $sender, Presenter $presenter){
		if ($this->documentRegistered) {
			return;
		}
		$presenter->getTemplate()->document = $this->document;
		$this->documentRegistered = TRUE;

		$presenter->onShutdown[] = function() {
			/** @var IDocument $doc */
			$doc = $this->document;
			if (!SemanticPanel::isEnabled()) {
				Checker::run($doc);
			}
		};
	}

}