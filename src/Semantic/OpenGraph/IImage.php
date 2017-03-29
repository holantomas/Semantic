<?php


namespace holantomas\Semantic\OpenGraph;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
interface IImage {

	const BMP	= 'image/bmp';
	const JPG	= 'image/jpeg';
	const JPEG	= 'image/jpeg';
	const PNG	= 'image/jpeg';
	const GIF	= 'image/gif';
	const TIFF	= 'image/tiff';

	/**
	 * @return string
	 */
	public function getUrl();

	/**
	 * @param string $url
	 * @return IImage
	 */
	public function setUrl($url);

	/**
	 * @return string
	 */
	public function getSecuredUrl();

	/**
	 * @param string $securedUrl
	 * @return IImage
	 */
	public function setSecuredUrl($securedUrl);

	/**
	 * @return string
	 */
	public function getType();

	/**
	 * @param string $type
	 * @return IImage
	 */
	public function setType($type);

	/**
	 * @return int|null
	 */
	public function getWidth();

	/**
	 * @param int|null $width
	 * @return IImage
	 */
	public function setWidth($width);

	/**
	 * @return int|null
	 */
	public function getHeight();

	/**
	 * @param int|null $height
	 * @return IImage
	 */
	public function setHeight($height);

}