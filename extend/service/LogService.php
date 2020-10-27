<?php


namespace service;

use think\Db;
use think\db\Query;

/**
 * 操作日志服务
 * Class LogService
 * @package service
 * @author Anyon <zoujingli@qq.com>
 * @date 2017/03/24 13:25
 */
class LogService
{

    /**
     * 获取数据操作对象
     * @return Query
     */
    protected static function db()
    {
        return Db::name('SystemLog');
    }

    /**
     * 获取数据操作对象
     * @return Query
     */
    protected static function paydb()
    {
        return Db::name('SystemPaylog');
    }

    /**
     * 获取数据操作对象
     * @return Query
     */
    protected static function paypushdb()
    {
        return Db::name('SystemPushlog');
    }

    /**
     * 写入操作日志
     * @param string $action
     * @param string $content
     * @return bool
     */
    public static function write($action = '行为', $content = "内容描述")
    {
        $request = app('request');
        $node = strtolower(join('/', [$request->module(), $request->controller(), $request->action()]));
        $data = [
            'ip'       => $request->ip(),
            'node'     => $node,
            'action'   => $action,
            'content'  => $content,
            'username' => session('user.username') . '',
        ];
        return self::db()->insert($data) !== false;
    }

    /**
     * 写入操作日志
     * @param string $action
     * @param string $content
     * @return bool
     */
    public static function paywrite($action = '行为', $content = "内容描述")
    {
        $request = app('request');
        $node = strtolower(join('/', [$request->module(), $request->controller(), $request->action()]));
        $data = [
            'ip'       => $request->ip(),
            'node'     => $node,
            'action'   => $action,
            'content'  => $content,
            'username' => '微信支付通知V3',
        ];
        return self::paydb()->insert($data) !== false;
    }

    /**
     * 写入操作日志
     * @param string $action
     * @param string $content
     * @return bool
     */
    public static function paycodewrite($action = '行为', $content = "内容描述", $stock_id='微信支付卡卷id', $mch_id='商户号')
    {
        $request = app('request');
        $data = [
            'ip'       => $request->ip(),
            'node'     => 'job/jobwxpay',
            'action'   => $action,
            'content'  => $content,
            'mch_id'   => $mch_id,
            'stock_id' => $stock_id,
            'username' => '消息队列推送',
        ];
        return self::paypushdb()->insert($data) !== false;
    }

}
