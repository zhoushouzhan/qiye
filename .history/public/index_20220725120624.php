<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-21 09:57:50
 * @LastEditTime: 2022-07-25 10:59:46
 * @FilePath: \web\public\index.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

namespace think;

if (version_compare(PHP_VERSION, '7.1', '<')) {
    die('PHP版本过低,最少需要PHP7.1,请升级PHP版本!');
}
define('YP_ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP_PATH', YP_ROOT . '../app/');
require __DIR__ . '/../vendor/autoload.php';

// 执行HTTP应用并响应
$http = (new App())->http;
$response = $http->run();
$response->send();
$http->end($response);
