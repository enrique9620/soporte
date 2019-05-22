<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Dompdf' => $baseDir . '/vendor/daoandco/cakephp-dompdf/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];