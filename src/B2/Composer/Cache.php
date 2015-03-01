<?php

namespace B2\Composer;

class Cache
{
	static $data = array();

	public static function appendData($name, $datum)
	{
		if(empty(self::$data[$name]))
			self::$data[$name] = array($datum);
		else
			self::$data[$name][] = $datum;
	}

	public static function getData($name, $default = NULL)
	{
		if(empty(self::$data[$name]))
			return $default;

		return self::$data[$name];
	}

	public static function addAutoload($name, $code)
	{
		$name = preg_replace('/\W+/', '_', $name);
		if(!file_exists($d = COMPOSER_ROOT . '/bors'))
			mkdir($d);
		if(!file_exists($d = $d . '/autoload'))
			mkdir($d);

		file_put_contents($d . '/'.$name.'.php', "<?php\n\n" . $code);

		$load = "<?php\n\n";
		foreach(glob($d.'/*.php') as $pf)
			$load .= "require_once '$pf'\n";

		file_put_contents($d . '/../autoload.php', $load);
	}
}