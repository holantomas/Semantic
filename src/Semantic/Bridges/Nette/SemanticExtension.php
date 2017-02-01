<?php


namespace holantomas\Semantic\Bridges\Nette;

use holantomas\Semantic\Document;
use holantomas\Semantic\IDocument;
use Nette\Application\Application;
use Nette\DI\CompilerExtension;
use Nette\DI\Statement;
use Nette\InvalidStateException;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class SemanticExtension extends CompilerExtension {

	/** Default config options */
	public $defaults = [
		'document' => Document::class,
	];

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		$config = $this->getConfig($this->defaults);

		$builder->addDefinition($this->prefix('registrator'))
			->setClass(Registrator::class)
			->setAutowired(FALSE)
			->setInject(FALSE);

		// Register document
		if ($config['document']) {
			if (!in_array(IDocument::class, class_implements($config['document']))) {
				throw new InvalidStateException(
					sprintf('Document class have to implement %s, but %s not.',
						IDocument::class,
						$config['document']
					));
			}

			// Create document as service and inject it to registrator
			$builder->addDefinition($this->prefix('document'))
				->setClass($config['document'])
				->addSetup(new Statement('?->injectDocument(?)', [
					$this->prefix('@registrator'),
					$this->prefix('@document')
				]));

			// Register document to presenter
			$builder->getDefinition($builder->getByType(Application::class))
				->addSetup(new Statement('?->onPresenter[] = ?', [
					'@self',
					[
						$this->prefix('@registrator'),
						'registerDocument'
					]
				]));
		}
	}

}