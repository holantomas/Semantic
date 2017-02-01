<?php


namespace holantomas\Semantic;

use InvalidArgumentException;
use ReflectionClass;
use ReflectionProperty;


/**
 * @author       Tomáš Holan <mail@tomasholan.eu>, Tomáš Holan [www.tomasholan.eu]
 * @package      holantomas/semantic
 * @copyright    Copyright © 2016, Tomáš Holan [www.tomasholan.eu]
 */
class Checker {

	const DEFAULT_REQUIREMENT_ANNOTATION = 'required';

	/** @var string */
	public static $REQUIREMENT_ANNOTATION = self::DEFAULT_REQUIREMENT_ANNOTATION;

	/**
	 * @param object $document
	 * @param bool   $warnings
	 * @return array
	 */
	public static function run($document, $warnings = TRUE) {
		if (!is_object($document)) {
			throw new InvalidArgumentException(
				sprintf(
					'Argument 1 of method %s expection object, %s given.',
					__METHOD__,
					gettype($document)
				)
			);
		}

		$reflection = new ReflectionClass($document);
		$properties = $reflection->getProperties();
		$errors = [];

		foreach ($properties as $property) {
			$value = self::getPropertyValue($document, $property);
			if (self::isPropertyRequired($property) && ($value === NULL || empty($value))) {
				$errors[] = $property->getName();
				if ($warnings) {
					trigger_error(sprintf('Document property %s is not set.', strtoupper($property->getName())), E_USER_WARNING);
				}
			}
		}


		return $errors;
	}

	/**
	 * @param ReflectionProperty $property
	 * @return bool
	 */
	protected static function isPropertyRequired(ReflectionProperty $property) {
		return strpos(strtoupper($property->getDocComment()),
				'@' . strtoupper(self::$REQUIREMENT_ANNOTATION)) !== FALSE;
	}

	/**
	 * @param object             $object
	 * @param ReflectionProperty $property
	 * @return mixed
	 */
	protected static function getPropertyValue($object, ReflectionProperty $property) {
		$property->setAccessible(TRUE);

		return $property->getValue($object);
	}

}