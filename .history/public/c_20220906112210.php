<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-29 19:56:16
 * @LastEditTime: 2022-09-06 11:22:10
 * @FilePath: \web\public\c.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */




$str = '<A href="www.bnxf.net" id="001">asadf</a>';
$str = '<a href="asdf"><span>aa</span></a><a href="asdf">bb</a><a href="asdf">cc</a>';
if (preg_match("/^[\x{4e00}-\x{9fa5}]{0,}$/u", $name)) {
    return true;
} else {
    return false;
}
