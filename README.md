holantomas/Semantic
==========

[![Downloads this Month](https://img.shields.io/packagist/dm/holantomas/semantic.svg)](https://packagist.org/packages/holantomas/semantic)
[![Latest Stable Version](https://poser.pugx.org/holantomas/semantic/v/stable)](https://github.com/holantomas/semantic/releases)

This extension is here to provide HTML Document api for Nette Framework.


Installation
-----------

**Composer package is not prepared yet**

The best way to install is using [Composer](http://getcomposer.org/):

```sh
$ composer require holantomas/semantic
```

Register extension in neon config

```yml
extensions:
	document: holantomas\Semantic\Bridges\Nette\SemanticExtension
```

Enable **Tracy** panel(optional) - if is Tracy panel disabled, document throws `E_USER_WARNING` after render

```yml
tracy:
	bar:
		- holantomas\Semantic\Bridges\Tracy\SemanticPanel
```


Usage
------------

`Document` is automaticly registered as service and insert to presenter template param named as `document`.
You don't have to do `$this->template->document = $this->document;` in presenter.

```php
namespace App;

use Nette\Application\UI\Presenter;
use holantomas\Semantic\IDocument;

class BasePresenter extends Presenter
{
	/** @var IDocument @inject */
	public $document;
	
}

class ExamplePresenter extends BasePresenter
{
	public function actionDefault(){
		$this->document->setTitle('Hello world!');
	}
	
}
```

```latte
<html>
	<head>
		<title>{$document->getTitle()}</title>
		...
	</head>
	...
</html>
```

Of course you can autowire document to all services or components and modify properties.


**Open graph** and tests coming soon