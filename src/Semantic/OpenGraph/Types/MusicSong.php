<?php


namespace holantomas\Semantic\OpenGraph\Types;

use holantomas\Semantic\OpenGraph\TType;
use holantomas\Semantic\OpenGraph\Type;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class MusicSong extends Type implements IMusicSong {

	const NAME = IMusicSong::NAME;

	/**
	 * Return all type params
	 * @return array [$property => $content]
	 */
	public function toArray(){
		$result = parent::toArray();
		return $result;
	}

}