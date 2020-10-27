<?php
use think\facade\Env;

return [
    'connector' => 'Redis',
     'expire'     => 60,				// 任务的过期时间，默认为60秒; 若要禁用，则设置为 null 
       'default'    => 'default',		// 默认的队列名称
       'host'       => Env::get('REDIS_HOST'),	    // redis 主机ip
       'port'       => 6379,			// redis 端口
       'password'   => Env::get('REDIS_PASSWORD'),				// redis 密码
       'select'     => 0,				// 使用哪一个 db，默认为 db0
       'timeout'    => 0,				// redis连接的超时时间
       'persistent' => false,			// 是否是长连接
];
