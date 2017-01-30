<?php


namespace holantomas\Semantic\Bridges\Tracy;

use holantomas\Semantic\IDocument;
use Nette\SmartObject;
use Tracy\IBarPanel;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class SemanticPanel implements IBarPanel {

	use SmartObject;

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
		$content = '<img width="16" height="16" src="data:image/png;base64,' . base64_encode(file_get_contents(__DIR__ . '/icon.png')) . '" />';

		if (!$this->document->check(FALSE)) {
			$content .= '<span class="tracy-label">error</span>';
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

		$content = '<table>';
		$content .= '<thead><tr><th colspan="2">SEO</th></tr></thead>';

		$content .= "<tbody>";
		$content .= "<tr" . (empty($doc->getTitle()) ? ' class="warning"' : '') . "><th>title</th><td>{$doc->getTitle()}</td></tr>";
		$content .= "<tr" . (empty($doc->getDescription()) ? ' class="warning"' : '') . "><th>description</th><td>{$doc->getDescription()}</td></tr>";
		$content .= "<tr" . (empty($doc->getKeywords()) ? ' class="warning"' : '') . "><th>keywords</th><td>{$doc->getKeywords()}</td></tr>";
		$content .= "<tr" . (empty($doc->getHeading()) ? ' class="warning"' : '') . "><th>header/h1</th><td>{$doc->getHeading()}</td></tr>";
		$content .= '</tbody>';
		$content .= '</table>';

		return '<style class="tracy-debug">' . $this->renderStyles() . '</style>' .
			'<h1>Document</h1>' .
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
}