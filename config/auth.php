<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-22 13:30:55
 * @LastEditTime: 2022-06-22 13:30:59
 * @FilePath: \ypcms2.0\config\auth.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */
return [
    // 权限开关
    'auth_on' => 1,
    // 认证方式，1为实时认证；2为登录认证。
    'auth_type' => 1,
    // 用户组数据不带前缀表名
    'auth_group' => 'roles',
    // 用户-用户组关系不带前缀表
    'auth_group_access' => 'access',
    // 权限规则不带前缀表
    'auth_rule' => 'rule',
    // 用户信息不带前缀表
    'auth_user' => 'admin',
];
