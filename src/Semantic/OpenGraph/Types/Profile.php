<?php


namespace holantomas\Semantic\OpenGraph\Types;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class Profile implements IProfile {

	/** @var string|null */
	private $firstname = NULL;

	/** @var string|null */
	private $lastname = NULL;

	/** @var string|null */
	private $username = NULL;

	/**
	 * @var string|null [male|female]
	 * @see IProfile
	 */
	private $gender = NULL;

	/**
	 * @return string|null
	 */
	public function getFirstName() {
		return $this->firstname;
	}

	/**
	 * @param string|null $firstname
	 * @return self
	 */
	public function setFirstName($firstname) {
		$this->firstname = $firstname;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLastName() {
		return $this->lastname;
	}

	/**
	 * @param string|null $lastname
	 * @return self
	 */
	public function setLastName($lastname) {
		$this->lastname = $lastname;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param string|null $username
	 * @return self
	 */
	public function setUsername($username) {
		$this->username = $username;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * @param string|null $gender
	 * @return self
	 */
	public function setGender($gender) {
		if (in_array($gender, [IProfile::MALE, IProfile::FEMALE]) || $gender === NULL) {
			$this->gender = $gender;
		}

		return $this;
	}

	/**
	 * Return all type params
	 * @return array [$property => $content]
	 */
	public function toArray() {
		$result = parent::toArray();
		if ($this->getFirstName()) {
			$result["{$this}:first_name"] = $this->getFirstName();
		}
		if ($this->getLastName()) {
			$result["{$this}:last_name"] = $this->getLastName();
		}
		if ($this->getUsername()) {
			$result["{$this}:username"] = $this->getUsername();
		}
		if ($this->getGender()) {
			$result["{$this}:gender"] = $this->getGender();
		}

		return $result;
	}

}