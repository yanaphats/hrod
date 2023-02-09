<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Helpers\AssetManager;

if (!function_exists('isProduction')) {
	function isProduction()
	{
		return in_array(Str::lower(config('app.env')), ['prod', 'production']);
	}
}

if (!function_exists('isLocal')) {
	function isLocal()
	{
		return in_array(Str::lower(config('app.env')), ['local', 'development']);
	}
}

if (!function_exists('toLocalDateTime')) {
	function toLocalDateTime($datetimeString, $format = 'd/m/Y H:i:s', $timezone = 'Asia/Bangkok')
	{
		if (is_null($datetimeString)) return '';

		return Carbon::parse($datetimeString)->timezone($timezone)->format($format);
	}
}

if (!function_exists('addLocalDateTime')) {
	function addLocalDateTime($datetimeString, $addDays, $format, $timezone = 'Asia/Bangkok')
	{
		return Carbon::parse($datetimeString)->timezone($timezone)->addDays($addDays)->format($format);
	}
}

if (!function_exists('assets')) {
	/**
	 * @param $path
	 * @return string
	 */
	function assets($file, $path = "")
	{
		return app(AssetManager::class)->getAssetPath($file, $path);
	}
}


if (!function_exists('pre')) {
	/**
	 * @param $data
	 */
	function pre($data)
	{
		echo '<pre>';
		switch (gettype($data)) {
			case 'boolean':
				var_dump($data);
				break;
			case 'array':
				print_r($data);
				break;
			case 'NULL':
				echo 'NULL';
				break;
			default:
				echo $data;
		}
		echo '</pre>';
	}
}


if (!function_exists('localizeRoute')) {
	/**
	 * @param $name
	 * @return string
	 */

	function localizeRoute($name, $locale = "")
	{
		$locale = $locale ?: App::getLocale();
		$defaultLocale = config('app.default_locale');
		return ($locale === $defaultLocale ? $name : $locale . "." . $name);
	}
}

if (!function_exists('localizePath')) {
	/**
	 * @param $path
	 * @return string
	 */

	function localizePath($path, $locale = "")
	{
		$domainPattern = '/^(http|https):\/\//';

		if (preg_match($domainPattern, $path)) {
			return $path;
		}

		$prefix = empty(config('app.prefix')) ? '' : '/' . config('app.prefix');
		$explodeIndex = empty($prefix) ? 0 : 1;

		$locale = $locale ?: App::getLocale();
		$defaultLocale = config('app.default_locale');
		$explode = explode('/', $path);

		if (!empty(config('app.prefix')) && !empty($explode[$explodeIndex]) && in_array($explode[$explodeIndex], config('app.locales'))) {
			if ($path == config('app.prefix') . '/' . $explode[$explodeIndex]) {
				$path = Str::replace($explode[$explodeIndex], '', $path);
			} else {
				$path = Str::replace($explode[$explodeIndex] . '/', '', $path);
			}
		}

		if ($path == App::getLocale()) {
			$path = Str::replace(App::getLocale(), '', $path);
		} else {
			$path = Str::replace(App::getLocale() . '/', '', $path);
		}

		$path = !empty(config('app.prefix')) ? Str::replace(config('app.prefix') . '/', '', $path) : $path;

		if ($locale == $defaultLocale) {
			if (empty($path)) {
				$url = $prefix;
			} else {
				$url = $prefix . '/' . $path;
			}
		} else {
			if (empty($path) || $path == '/') {
				$url = empty($prefix) ? '/' . $locale : $prefix . '/' . $locale;
			} else {
				$url = empty($prefix) ? '/' . $locale . '/' . $path : $prefix . '/' . $locale . '/' . $path;
			}
		}

		return empty($url) ? '/' : $url;
	}
}

if (!function_exists('localizeField')) {
	/**
	 * @param $field
	 * @return string
	 */

	function localizeField($field = "", $locale = "")
	{
		$locale = $locale ?: App::getLocale();
		return empty($field) ? $locale : $field . "_" . $locale;
	}
}

if (!function_exists('localizeArray')) {
	/**
	 * @param $field
	 * @return string
	 */

	function localizeArray($enums = [], $key = "")
	{

		if (empty($enums)) return [];

		if (empty($key)) return $enums;

		foreach ($enums as $index => $enum) {
			unset($enums[$index]);
			$index = Str::lower($index);
			$enums[$index] = __($key . '.' .  $enum);
		}

		return $enums;
	}
}

if (!function_exists('generateSortable')) {

	function generateSortable($column)
	{
		return resolve(\App\Helpers\SortableHelper::class)->generate($column);
	}
}

if (!function_exists('sortIcon')) {
	/**
	 * @param $column
	 * @return mixed
	 */
	function sortIcon($column)
	{
		return resolve(\App\Helpers\SortableHelper::class)->getSortIcon($column);
	}
}

if (!function_exists('numberOnly')) {
	/**
	 * @param $test
	 * @return mixed
	 */
	function numberOnly($text)
	{
		return preg_replace('/[^0-9]/', '', $text);
	}
}

if (!function_exists('validateCitizenId')) {
	/**
	 * @param $field
	 * @return string
	 */

	function validateCitizenId($citizenId = "", $locale = "th")
	{
		if (empty($citizenId)) {
			return false;
		}

		$citizenId = str_replace('-', '', $citizenId);

		$citizenId .= '';

		if (strlen($citizenId) !== 13) {
			return false;
		}

		for ($sum = 0, $i = 0; $i < 12; $i++) {
			$sum += (int)($citizenId[$i]) * (13 - $i);
		}

		return (11 - ($sum % 11)) % 10 === (((int)substr($citizenId, 12, 1)));
	}
}

if (!function_exists('citizenIdFormat')) {
	/**
	 * @param $field
	 * @return string
	 */

	function citizenIdFormat($citizenId = "")
	{
		if (empty($citizenId)) {
			return "";
		}

		if (strlen($citizenId) !== 13) {
			return "";
		}

		return substr($citizenId, 0, 1) . '-' . substr($citizenId, 1, 4) . '-' . substr($citizenId, 5, 5) . '-' . substr($citizenId, 10, 2) . '-' . substr($citizenId, 12, 1);
	}
}

if (!function_exists('phoneFormat')) {
	/**
	 * @param $field
	 * @return string
	 */

	function phoneFormat($phone = "")
	{
		if (empty($phone)) {
			return "";
		}

		if (strlen($phone) !== 10) {
			return "";
		}

		return substr($phone, 0, 3) . '-' . substr($phone, 3, 3) . '-' . substr($phone, 6, 4);
	}
}


if (!function_exists('getConvertedImageName')) {
	/**
	 * @param $imageName, $suffix
	 * @return string
	 */

	function getConvertedImageName($imageName, $suffix)
	{
		$fileNamePattern = '/^(.+)\.(.+)$/';
		$replacement = '${1}_' . $suffix . '.${2}';

		$thumbnailName = preg_replace($fileNamePattern, $replacement, $imageName);
		return $thumbnailName;
	}
}

if (!function_exists('getAvatar')) {
	/**
	 * @param $field
	 * @return string
	 */
	function getAvatar($string)
	{
		$acronym = "";
		$text = "";
		$words = preg_split("/(\s|\-|\.)/", $string);
		foreach ($words as $word) {
			$acronym .= substr($word, 0, 1);
		}
		$text = $text . $acronym;
		return $text;
	}
}


if (!function_exists('calculateAge')) {
	/**
	 * @param $field
	 * @return string
	 */

	function calculateAge($date = null)
	{
		if (empty($date)) {
			return 0;
		}

		$now = new Carbon;
		$age = $now->diffInYears($date);
		return $age;
	}
}
