<?php

namespace App\Data;

class Status
{
    protected static $items = [
        0 => 'Inactive',
        1 => 'Active',
    ];

    public static function all()
    {
        return static::$items;
    }

    public static function random() {
        return array_rand(static::all());
    }
}
