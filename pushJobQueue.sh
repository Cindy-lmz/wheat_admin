cd /alidata/wwwroot/topi/wechat2
while [ 2 > 0 ]
 do
  len=`/usr/local/redis/bin/redis-cli -h 127.0.0.1 -p 6379 Llen queues:pushJobQueue`

  if [ $((len + 0 )) -gt 0 ];then
        /usr/local/php/bin/php think queue:work --queue  pushJobQueue
  else
        sleep 3
       	/usr/local/php/bin/php think queue:work --queue  pushJobQueue    
  fi
done
