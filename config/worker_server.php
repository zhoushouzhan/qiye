<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-07-07 16:37:10
 * @LastEditTime: 2022-07-07 17:08:28
 * @FilePath: \ypcms2.0\config\worker_server.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Workerman设置 仅对 php think worker:server 指令有效
// +----------------------------------------------------------------------
return [
    // 扩展自身需要的配置
    'protocol'       => 'websocket', // 协议 支持 tcp udp unix http websocket text
    'host'           => '127.0.0.1', // 监听地址
    'port'           => 2345, // 监听端口
    'socket'         => '', // 完整监听地址
    'context'        => [], // socket 上下文选项
    'worker_class'   => 'app\work\Push', // 自定义Workerman服务类名 支持数组定义多个服务

    // 支持workerman的所有配置参数
    'name'           => 'thinkphp',
    'count'          => 4,
    'daemonize'      => false,
    'pidFile'        => '',

    // 支持事件回调
    // onWorkerStart
    'onWorkerStart'  => function ($worker) {
    },
    // onWorkerReload
    'onWorkerReload' => function ($worker) {
    },
    // onConnect
    'onConnect'      => function ($connection) {
    },
    // onMessage
    'onMessage'      => function ($connection, $data) {
        $connection->send('receive success');
    },
    // onClose
    'onClose'        => function ($connection) {
    },
    // onError
    'onError'        => function ($connection, $code, $msg) {
        echo "error [ $code ] $msg\n";
    },
];
