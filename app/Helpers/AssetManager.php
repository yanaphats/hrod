<?php

namespace Helpers;

use Illuminate\Support\Str;
use Enums\FileTypeEnum;


class AssetManager
{
	public static function getAssetPath($file, $path = "")
	{
		$url = config('app.url');
		if (env('REDIRECT_HTTPS') && Str::startsWith($url, 'http://')) {
			$url = Str::replace('http://', 'https://', $url);
		}

		$extension = pathinfo($file, PATHINFO_EXTENSION);
		$path = self::getAssetDirectory($extension, $file, $path);

		return $url . '/' . $path . '/' . $file;
	}

	private static function getAssetDirectory($extension, $file, $path)
	{
		if (empty($path)) {
			if (in_array($extension, FileTypeEnum::IMAGE)) {
				return config('asset.image.path');
			} else if (in_array($extension, FileTypeEnum::MEDIA)) {
				return config('asset.media.path');
			} else if (in_array($extension, FileTypeEnum::SCRIPT)) {
				return config('asset.script.path');
			} else if (in_array($extension, FileTypeEnum::STYLE)) {
				return config('asset.style.path');
			}
		} else {
			return $path;
		}
	}
}
