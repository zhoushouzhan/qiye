<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-29 19:56:16
 * @LastEditTime: 2022-09-06 11:24:07
 * @FilePath: \web\public\c.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */




$str = '<A href="www.bnxf.net" id="001">asadf</a>';
$str = '<a href="asdf"><span>中</span></a><a href="asdf">汉语</a><a href="asdf">广西省</a>';
//preg_match_all('/<\/(.*?)>/i', $str, $res);
preg_match_all('/[\x{4e00}-\x{9fa5}]/u', $str, $res);
print_r($res);
