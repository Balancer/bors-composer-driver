<?php

namespace B2;

class Plugins
{
	public static $plugins = array();

	public static function register($class_map)
	{
//		echo "\n"; var_dump($class_map); echo "\n";
		\B2\Composer\Cache::appendData('plugins/classes', $class_map);

		\B2\Composer\Cache::addAutoload('plugins/classes', "B2\\Plugins::\$plugins = "
			.var_export(\B2\Composer\Cache::getData('plugins/classes'), true)
			.";\n"
		);
	}

	public static function classes($group)
	{
//		require_once COMPOSER_ROOT.'/bors/autoload.php';
		return @self::$plugins[$group];
	}
}
