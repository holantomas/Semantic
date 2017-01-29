<?php


namespace holantomas\Semantic\Bridges\Nette;

use holantomas\Semantic\Document;
use Nette\Application\Application;
use Nette\DI\CompilerExtension;
use Nette\DI\Statement;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class SemanticExtension extends CompilerExtension{

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('document'))
			->setClass(Document::class);

		$builder->getDefinition($builder->getByType(Application::class))
			->addSetup(new Statement('?->onPresenter[] = ?', ['@self',[$this->prefix('@document'), 'register']]));


	}

}