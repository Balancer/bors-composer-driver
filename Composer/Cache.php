<?php

namespace B2\Composer;

class Cache
{
	static $data = array();

	public static function appendData($var_name, $datum)
	{
		if(empty(self::$data[$var_name]))
			self::$data[$var_name] = array();

		if(is_array($datum))
			self::$data[$var_name] = array_merge(self::$data[$var_name], $datum);
		else
			self::$data[$var_name][] = $datum;
	}

	public static function getData($var_name, $default = NULL)
	{
		if(empty(self::$data[$var_name]))
			return $default;

		return self::$data[$var_name];
	}

	public static function addAutoload($category_name, $code)
	{
		$category_name = preg_replace('/\W+/', '_', $category_name);

		if(!file_exists($d = COMPOSER_ROOT . '/bors'))
			mkdir($d);

		if(!file_exists($d = $d . '/autoload'))
			mkdir($d);

		file_put_contents($d . '/'.$category_name.'.php', "<?php\n\n" . $code);

		$load = "<?php\n\n";
		foreach(glob($d.'/*.php') as $pf)
			$load .= "require_once __DIR__.'".str_replace($d, '/autoload', $pf)."';\n";

		file_put_contents($d . '/../autoload.php', $load);
	}
}
