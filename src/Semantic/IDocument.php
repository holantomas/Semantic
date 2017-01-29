<?php


namespace holantomas\Semantic;

/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
interface IDocument {

	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @param string $title
	 * @return IDocument
	 */
	public function setTitle($title);

	/**
	 * @return string
	 */
	public function getDescription();

	/**
	 * @param string $description
	 * @return IDocument
	 */
	public function setDescription($description);

	/**
	 * @return string
	 */
	public function getKeywords();

	/**
	 * @param string $keywords
	 * @return IDocument
	 */
	public function setKeywords($keywords);

	/**
	 * Aka H1 tag
	 * @return string
	 */
	public function getHeader();

	/**
	 * Aka H1 tag
	 * @param string $header
	 * @return IDocument
	 */
	public function setHeader($header);

	/**
	 * @param bool $withWarnings
	 * @return bool
	 */
	public function check($withWarnings = TRUE);

}