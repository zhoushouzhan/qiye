<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-29 19:56:16
 * @LastEditTime: 2022-09-06 10:35:50
 * @FilePath: \web\public\c.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */




$str = '<a href="www.bnxf.net" id="001">测试</a>';

preg_match('/<(.*?)>(.*?)</[a-]>/', $str, $res);

print_r($res);
