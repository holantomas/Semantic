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
	semantic: holantomas\Semantic\Bridges\Nette\SemanticExtension
```

You can setup your own `IDocument` implementation.

```yml
semantic:
	document: namespace\to\your\document # Or false to disble it
```

If you have your implementation of `IDocument` you have to specify `@required` annotation for document properties which will cause warnings when are empty or `NULL`. You don't have to care about properties visibility
```php

use holantomas\Semantic\IDocument;

class MyDocument implements IDocument {

	/**
	 * @var string
	 * @required - this make property required (throws warnings)
	 */
	private $title = '';

}
```

Enable **Tracy** panel(optional) - if is Tracy panel disabled, document throws `E_USER_WARNING` after render on `@required` properties which are `NULL` or empty

```yml
tracy:
	bar:
		- holantomas\Semantic\Bridges\Tracy\SemanticPanel
```

For show properties in panel you have to specify `@panel` on every property.

```php

use holantomas\Semantic\IDocument;

class MyDocument implements IDocument {

	/**
	 * @var string
	 * @required - this make property required (throws warnings)
	 * @panel - this make property show in tracy panel
	 */
	private $title = '';

}
```

_annotations can be customized by `Checker::$REQUIREMENT_ANNOTATION` and `SemanticPanel::$RENDER_ANNOTATION`_


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