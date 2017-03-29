<?php


namespace holantomas\Semantic\Bridges\Nette;

use holantomas\Semantic\Bridges\Tracy\SemanticPanel;
use holantomas\Semantic\Checker;
use holantomas\Semantic\IDocument;
use holantomas\Semantic\IOpenGraph;
use Nette\Application\Application;
use Nette\Application\UI\Presenter;
use Nette\SmartObject;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 *
 * @method onInjectDocument(Registrator $sender, IDocument $document)
 * @method onInjectOpenGraph(Registrator $sender, IOpenGraph $document)
 */
class Registrator {

	use SmartObject;

	/** @var \Closure[]|callable[]|array */
	public $onInjectDocument = [];

	/** @var \Closure[]|callable[]|array */
	public $onInjectOpenGraph = [];

	/** @var IDocument|null */
	private $document = NULL;

	/** @var  IOpenGraph|null */
	private $openGraph = NULL;

	/** @var bool */
	private $documentRegistered = FALSE;

	/** @var bool */
	private $openGraphRegistered = FALSE;

	/**
	 * @param IDocument $document
	 */
	public function injectDocument(IDocument $document) {
		$this->document = $document;

		$this->onInjectDocument($this, $this->getDocument());
	}

	/**
	 * @param IOpenGraph $openGraph
	 */
	public function injectOpenGraph(IOpenGraph $openGraph) {
		$this->openGraph = $openGraph;

		$this->onInjectOpenGraph($this, $this->getOpenGraph());
	}

	/**
	 * @return IDocument|null
	 */
	public function getDocument() {
		return $this->document;
	}

	/**
	 * @return IOpenGraph|null
	 */
	public function getOpenGraph() {
		return $this->openGraph;
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

	/**
	 * @param Application $sender
	 * @param Presenter   $presenter
	 */
	public function registerOpenGraph(Application $sender, Presenter $presenter) {
		if ($this->openGraphRegistered) {
			return;
		}
		$presenter->getTemplate()->openGraph = $this->openGraph;
		$this->openGraphRegistered = TRUE;

		$presenter->onShutdown[] = function() {
			/** @var IDocument $doc */
			$doc = $this->openGraph;
			if (!SemanticPanel::isEnabled()) {
				Checker::run($doc);
			}
		};
	}

}