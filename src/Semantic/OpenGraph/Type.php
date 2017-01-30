<?php


namespace holantomas\Semantic\OpenGraph;

use holantomas\Semantic\OpenGraph\Types\IWebsite;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
abstract class Type implements IType {

	const NAME = IWebsite::NAME;

	/**
	 * @return string
	 */
	public function getName(){
		return self::NAME;
	}

	/**
	 * Return all type params
	 * @return array [$property => $content]
	 */
	public function toArray(){
		return ['og:type' => (string) $this];
	}

	/**
	 * Return type name - IType::getName() shortcut
	 * @return string
	 */
	public function __toString() {
		return $this->getName();
	}

}