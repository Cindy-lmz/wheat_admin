
pid=$(ps -ef| grep paypushJobQueue |grep -v grep | awk ' NR==1 {print $2}')
 
if [ -z $pid ]
 then
   sh /alidata/wwwroot/topi/wechat2/paypushJobQueue.sh &>/dev/null 2>&1
fi
