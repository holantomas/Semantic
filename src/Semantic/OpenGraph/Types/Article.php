<?php


namespace holantomas\Semantic\OpenGraph\Types;

use holantomas\Semantic\OpenGraph\DateTime;
use holantomas\Semantic\OpenGraph\Type;
use InvalidArgumentException;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class Article extends Type implements IArticle {

	const NAME = IArticle::NAME;

	/** @var DateTime|\DateTime|null */
	private $published = NULL;

	/** @var DateTime|\DateTime|null */
	private $modified = NULL;

	/** @var DateTime|\DateTime|null */
	private $expiration = NULL;

	private $author = NULL;

	/** @var string|null */
	private $section = NULL;

	/** @var string[]|array */
	private $tags = [];

	/**
	 * @return \DateTime|DateTime|null
	 */
	public function getPublishedTime() {
		return $this->published;
	}

	/**
	 * @param \DateTime|DateTime|null $published
	 * @return self
	 */
	public function setPublishedTime($published) {
		if (is_null($published)) {
			$this->published = NULL;
		} elseif ($published instanceof DateTime) {
			$this->published = $published;
		} elseif ($published instanceof \DateTime) {
			$this->published = new DateTime();
			$this->published->setTimestamp($published->getTimestamp());
		} else {
			throw new InvalidArgumentException();
		}

		return $this;
	}

	/**
	 * @return \DateTime|DateTime|null
	 */
	public function getModifiedTime() {
		return $this->modified;
	}

	/**
	 * @param \DateTime|DateTime|null $modified
	 * @return self
	 */
	public function setModifiedTime($modified) {
		if (is_null($modified)) {
			$this->modified = NULL;
		} elseif ($modified instanceof DateTime) {
			$this->modified = $modified;
		} elseif ($modified instanceof \DateTime) {
			$this->modified = new DateTime();
			$this->modified->setTimestamp($modified->getTimestamp());
		} else {
			throw new InvalidArgumentException();
		}

		return $this;
	}

	/**
	 * @return \DateTime|DateTime|null
	 */
	public function getExpirationTime() {
		return $this->expiration;
	}

	/**
	 * @param \DateTime|DateTime|null $expiration
	 * @return self
	 */
	public function setExpirationTime($expiration) {
		if (is_null($expiration)) {
			$this->expiration = NULL;
		} elseif ($expiration instanceof DateTime) {
			$this->expiration = $expiration;
		} elseif ($expiration instanceof \DateTime) {
			$this->expiration = new DateTime();
			$this->expiration->setTimestamp($expiration->getTimestamp());
		} else {
			throw new InvalidArgumentException();
		}

		return $this;
	}

	/**
	 * @return null
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @param null $author
	 * @return self
	 */
	public function setAuthor($author) {
		$this->author = $author;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getSection() {
		return $this->section;
	}

	/**
	 * @param string|null $section
	 * @return self
	 */
	public function setSection($section) {
		$this->section = $section === NULL ? : (string)$section;

		return $this;
	}

	/**
	 * @return array|string[]
	 */
	public function getTags() {
		return $this->tags;
	}


	/**
	 * @param string[]|array $tags
	 * @return self
	 */
	public function setTags(array $tags){
		$this->tags = $tags;
		return $this;
	}

	/**
	 * @param string $tag
	 * @return self
	 */
	public function addTag($tag) {
		if (in_array($tag, $this->tags)) {
			return $this;
		}
		$this->tags[] = $tag;

		return $this;
	}

	/**
	 * @param string $tag
	 * @return self
	 */
	public function removeTag($tag) {
		$this->tags = array_diff($this->tags, $tag);

		return $this;
	}

	/**
	 * Return all type params
	 * @return array [$property => $content]
	 */
	public function toArray() {
		$result = parent::toArray();
		if ($this->getPublishedTime()) {
			$result["{$this}:published_time"] = (string)$this->getPublishedTime();
		}
		if ($this->getModifiedTime()) {
			$result["{$this}:modified_time"] = (string)$this->getModifiedTime();
		}
		if ($this->getExpirationTime()) {
			$result["{$this}:expiration_time"] = (string)$this->getExpirationTime();
		}
		if ($this->getAuthor()) {
			$result["{$this}:author"] = $this->getAuthor();
		}
		if ($this->getSection()) {
			$result["{$this}:section"] = $this->getSection();
		}
		if (count($this->getTags())) {
			$result["{$this}:tag"] = $this->getTags();
		}

		return $result;
	}

}