<?php

namespace App\Data;

class Navigation
{

    protected static $items = [
        [
            'title' => 'Menu',
            'slug' => 'dashboard',
            'wrapItems' => false,
            'version' => '1',
            'sub' => [
                [
                    'title' => 'Main page',
                    'subtitle' => 'Kanye West quotes',
                    'url' => '/',
                    'route' => '/',
                    'svg' => 'general/gen002.svg',
                    'svg_class' => 'info',
                    'sub' => []
                ]
            ],
            'side' => [
                'title' => 'Author: Roman Antonov',
                'sub' => [
                    [
                        'title' => 'Upwork',
                        'url' => 'https://www.upwork.com/freelancers/~016b923b0158ef81ae',
                    ],
                    [
                        'title' => 'GitHub',
                        'url' => 'https://github.com/roman-rr',
                    ],
                    [
                        'title' => 'ResearchGate',
                        'url' => 'https://www.researchgate.net/profile/Roman-Antonov-3',
                    ]
                ]
            ]
        ],

    ];

    public static function all()
    {
        return static::$items;
    }
}
