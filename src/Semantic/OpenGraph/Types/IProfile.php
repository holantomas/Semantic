<?php


namespace holantomas\Semantic\OpenGraph\Types;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
interface IProfile {

	const MALE = 'male';
	const FEMALE = 'female';
	const NAME = 'profile';

	/**
	 * @return string|null
	 */
	public function getFirstName();

	/**
	 * @param string|null $firstname
	 * @return IProfile
	 */
	public function setFirstName($firstname);

	/**
	 * @return string|null
	 */
	public function getLastName();

	/**
	 * @param string|null $lastname
	 * @return IProfile
	 */
	public function setLastName($lastname);

	/**
	 * @return string|null
	 */
	public function getUserName();

	/**
	 * @param string|null $username
	 * @return IProfile
	 */
	public function setUserName($username);

	/**
	 * @return string|null [male|female]
	 */
	public function getGender();

	/**
	 * @param string|null $gender
	 * @return IProfile
	 */
	public function setGender($gender);

}