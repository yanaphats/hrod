<?php

namespace App\Helpers;

use Enums\SessionEnum;

class SessionHelper
{
    public static function setFilterSession(string $key, array $filter)
    {
        if (empty(request()->query())){
            foreach (SessionEnum::all() as $key) {
                session()->remove($key);
            }
        } else {
            session()->put($key, $filter);
        }
    }
}
