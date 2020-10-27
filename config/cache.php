<?php
use think\facade\Env;

return [
   	'cache'                 => [
        'type'   => 'File',
        'path'   =>  Env::get('APP_HOST') . 'runtime/cache/',
        'prefix' => '',
        'expire' => 0,
    ],
];