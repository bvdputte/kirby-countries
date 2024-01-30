<?php

require __DIR__ . "/src/Countries.php";

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('bvdputte/countries', [
    'options' => [
        'datafolder' => "country-list" // folder name in `/site/plugins`
    ],
    'siteMethods' => [
        'getCountries' => function () {
            return bvdputte\Countries::getAllCountries();
        }
    ]
]);
