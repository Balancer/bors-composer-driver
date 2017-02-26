<?php

namespace B2;

class Composer
{
	public static function loader()
	{
		if(empty($GLOBALS['B2_COMPOSER']))
			$GLOBALS['B2_COMPOSER'] = require __DIR__.'/../../autoload.php';

		return $GLOBALS['B2_COMPOSER'];
	}
}
