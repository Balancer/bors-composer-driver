<?php

namespace B2;

class Composer
{
	public static function baseDir()
	{
		if(!defined('COMPOSER_ROOT'))
			define('COMPOSER_ROOT', dirname(dirname(dirname(__DIR__))));

		return COMPOSER_ROOT;
	}

	public static function loader()
	{
		return $GLOBALS['bors.composer.class_loader'];
	}
}
