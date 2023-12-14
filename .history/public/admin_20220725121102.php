<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-26 10:13:35
 * @LastEditTime: 2022-07-25 12:10:51
 * @FilePath: \web\public\admin.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

require __DIR__ . '/../vendor/autoload.php';
if (version_compare(PHP_VERSION, '7.1', '<')) {
    die('PHP版本过低,最少需要PHP7.1,请升级PHP版本!');
}
define('YP_ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP_PATH', YP_ROOT . '../app/');
// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);
