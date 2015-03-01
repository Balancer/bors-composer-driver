<?php

namespace B2;

class Composer
{
	public static function instance()
	{
		return $GLOBALS['bors.composer.class_loader'];
	}
}
