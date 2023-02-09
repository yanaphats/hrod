<?php

namespace Helpers;

use Exception;
use Illuminate\Support\Facades\Crypt;


class CookieManager
{
	public static function getAPIToken(string $cookie)
	{
		return self::decrypt($cookie);
	}

	private static function decrypt(string $cookie)
	{
		try {
			$token = Crypt::decrypt($cookie, false);
			$token = explode('|', $token);
			return end($token);
		} catch (Exception $e) {
			return $e->getMessage();
		}

		return null;
	}
}
