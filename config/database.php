<?php


use think\facade\Env;

return [
    // 数据库调试模式
    'debug'    => false,
    // 数据库类型
    'type'     => 'mysql',
    // 服务器地址
    'hostname' => Env::get('DATABASE_HOST'),
    // 数据库名
    'database' => Env::get('DATABASE_DB'),
    // 用户名
    'username' => Env::get('DATABASE_USERNAME'),
    // 密码
    'password' => Env::get('DATABASE_PASSWORD'),
    // 端口
    'hostport' => '',
];
