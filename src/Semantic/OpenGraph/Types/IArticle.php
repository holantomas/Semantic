<?php


namespace holantomas\Semantic\OpenGraph\Types;

use holantomas\Semantic\OpenGraph\DateTime;

/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
interface IArticle {

	const NAME = 'article';

	/**
	 * @return DateTime
	 */
	public function getPublishedTime();

	/**
	 * @param DateTime|\DateTime $datetime
	 * @return IArticle
	 */
	public function setPublishedTime($datetime);

	/**
	 * @return DateTime
	 */
	public function getModifiedTime();

	/**
	 * @param DateTime|\DateTime $datetime
	 * @return IArticle
	 */
	public function setModifiedTime($datetime);

	/**
	 * @return DateTime
	 */
	public function getExpirationTime();

	/**
	 * @param DateTime|\DateTime|null $datetime
	 * @return IArticle
	 */
	public function setExpirationTime($datetime);


	public function getAuthor();


	public function setAuthor($author);

	/**
	 * @return string|null
	 */
	public function getSection();

	/**
	 * @param string|null $section
	 * @return IArticle
	 */
	public function setSection($section);

	/**
	 * @return string[]|array
	 */
	public function getTags();

	/**
	 * @param string[]|array $tags
	 * @return IArticle
	 */
	public function setTags(array $tags);

	/**
	 * @param string $tag
	 * @return IArticle
	 */
	public function addTag($tag);

	/**
	 * @param string $tag
	 * @return IArticle
	 */
	public function removeTag($tag);

}