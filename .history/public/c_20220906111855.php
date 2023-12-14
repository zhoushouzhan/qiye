<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-29 19:56:16
 * @LastEditTime: 2022-09-06 11:18:30
 * @FilePath: \web\public\c.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */




$str = '<A href="www.bnxf.net" id="001">asadf</a>';
$str = '<a href="asdf"><span>aa</span></a><a href="asdf">bb</a><a href="asdf">cc</a>';
//preg_match_all('/<\/(.*?)>/i', $str, $res);
preg_match_all('/>(.*?)<\/a>/i', $str, $res);
print_r($res[1]);
