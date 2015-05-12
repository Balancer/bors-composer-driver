<?php

namespace B2;

class Plugins
{
	public static $plugins = array();

	public static function register($class_map)
	{
		foreach($class_map as $group => $classes)
		{
			foreach($classes as $class)
				\B2\Composer\Cache::appendData('plugins/classes/'.$group, $class);
		}

		\B2\Composer\Cache::addAutoload('plugins', "B2\\Plugins::plugins = "
			.var_export(\B2\Composer\Cache::getData('plugins/classes'), true)
			.";\n\n"
		);
	}
}
