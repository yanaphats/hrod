<?php
namespace Enums;

abstract class AbstractEnum
{
    /**
     * Returns an array of all const values (with const name as a key) in the class
     * @return array
     */
    public static function all()
    {
        return (new \ReflectionClass(get_called_class()))->getConstants();
    }

    /**
     * Returns an array of all const values (without named keys) in the class
     * @return array
     */
    public static function values()
    {
        return array_values(static::all());
    }

    /**
     * Check if supplied const value exists in the class.
     */
    public static function exists($value)
    {
        return in_array($value, static::all());
    }
}
