<?php


namespace holantomas\Semantic\OpenGraph;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class DateTime extends \DateTime {

	/**
	 * @return string
	 */
	public function __toString() {
		return $this->format(self::ISO8601);
	}

}