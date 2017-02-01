<?php


namespace holantomas\Semantic\Bridges\Tracy;

use holantomas\Semantic\Checker;
use holantomas\Semantic\IDocument;
use Nette\SmartObject;
use ReflectionClass;
use ReflectionProperty;
use Tracy\IBarPanel;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class SemanticPanel implements IBarPanel {

	use SmartObject;

	const DEFAULT_RENDER_ANNOTATION = 'panel';

	/** @var string */
	public static $RENDER_ANNOTATION = self::DEFAULT_RENDER_ANNOTATION;

	/** @var bool */
	protected static $isEnabled = FALSE;

	/** @var IDocument */
	private $document;


	/**
	 * @param IDocument $document
	 */
	public function __construct(IDocument $document) {
		$this->document = $document;
		self::$isEnabled = TRUE;
	}

	/**
	 * Renders HTML code for custom tab.
	 * @return string
	 */
	public function getTab() {
		$doc = $this->document;
		$content = '<img width="16" height="16" src="data:image/png;base64,' . base64_encode(file_get_contents(__DIR__ . '/icon.png')) . '" />';
		$result = count(Checker::run($doc, FALSE));
		if ($result) {
			$content .= "<span class=\"tracy-label\">(errors {$result})</span>";
		}

		return '<span title="holantomas\Semantic">'
			. $content
			. '</span>';
	}

	/**
	 * Renders HTML code for custom panel.
	 * @return string
	 */
	public function getPanel() {
		$doc = $this->document;
		$documentReflection = new ReflectionClass($doc);
		$errors = Checker::run($doc, FALSE);

		$content = '<table>';
		$content .= '<thead><tr><th colspan="2">Document</th></tr></thead>';
		$content .= "<tbody>";
		foreach ($documentReflection->getProperties() as $property) {
			if (!self::canRenderProperty($property)) {
				continue;
			}
			$content .= "<tr" . (in_array($property->getName(), $errors) ? ' class="warning"' : '') . ">";
			$content .= "<th>{$property->getName()}</th>";
			$content .= "<td>" . self::getPropertyValue($doc, $property) . "</td>";
			$content .= "</tr>";
		}
		$content .= '</tbody>';
		$content .= '</table>';

		return '<style class="tracy-debug">' . $this->renderStyles() . '</style>' .
			'<h1>Semantic</h1>' .
			'<div class="tracy-inner tracy-holi-semantic">' . $content . '</div>';
	}

	/**
	 * @return bool
	 */
	public static function isEnabled() {
		return self::$isEnabled;
	}

	/**
	 * @return string
	 */
	private function renderStyles() {
		return "#tracy-debug .tracy-inner.tracy-holi-semantic { width: 200px !important;  } \n"
			. "#tracy-debug .tracy-inner.tracy-holi-semantic table { width: 100% !important; } \n"
			. "#tracy-debug .tracy-inner.tracy-holi-semantic table thead th { font-size: 20px; } \n"
			. "#tracy-debug .tracy-inner.tracy-holi-semantic table tbody th {font-weight: bold; } \n"
			. "#tracy-debug .tracy-inner.tracy-holi-semantic table tbody tr.warning th {color: red; } \n"
			. "#tracy-debug .tracy-inner.tracy-holi-semantic table tr td:first-child { padding-bottom: 0; } \n";
	}

	/**
	 * @param ReflectionProperty $property
	 * @return bool
	 */
	private static function canRenderProperty(ReflectionProperty $property) {
		return strpos(strtoupper($property->getDocComment()),
				'@' . strtoupper(self::$RENDER_ANNOTATION)) !== FALSE;
	}

	/**
	 * @param object             $object
	 * @param ReflectionProperty $property
	 * @return mixed
	 */
	private static function getPropertyValue($object, ReflectionProperty $property) {
		$property->setAccessible(TRUE);

		return $property->getValue($object);
	}
}