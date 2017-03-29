<?php


namespace holantomas\Semantic;

use holantomas\Semantic\OpenGraph\IImage;

/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
interface IOpenGraph {

	const TYPE_WEBSITE = 'website';
	const TYPE_PROFILE = 'profile';
	const TYPE_ARTICLE = 'article';
	const TYPE_SONG = 'music.song';


	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @param string $title
	 * @return OpenGraph
	 */
	public function setTitle($title);

	/**
	 * @return string
	 */
	public function getUrl();

	/**
	 * @param string $url
	 * @return OpenGraph
	 */
	public function setUrl($url);

	/**
	 * @return string
	 */
	public function getType();

	/**
	 * @param string $type
	 * @return OpenGraph
	 */
	public function setType($type = IOpenGraph::TYPE_WEBSITE);

	/**
	 * @param string      $url
	 * @param string|null $securedUrl
	 * @param string|null $type
	 * @param int|null    $width
	 * @param int|null    $height
	 * @return IImage
	 */
	public function addImage($url, $securedUrl = NULL, $type = NULL, $width = NULL, $height = NULL);

	/**
	 * @return IImage[]|array
	 */
	public function getImages();

}