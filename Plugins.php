<?php

namespace B2;

class Plugins
{
	public static $plugins = array();

	public static function register($class_map)
	{
		foreach($class_map as $group => $classes)
			\B2\Composer\Cache::appendData('plugins/classes', $classes);

		\B2\Composer\Cache::addAutoload('plugins/classes', "B2\\Plugins::\$plugins = "
			.var_export(\B2\Composer\Cache::getData('plugins/classes'), true)
			.";\n"
		);
	}
}
