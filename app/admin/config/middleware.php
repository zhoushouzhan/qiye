<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-21 09:57:50
 * @LastEditTime: 2022-06-21 11:49:57
 * @FilePath: \ypcms2.0\app\admin\config\middleware.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */
// 中间件配置
return [
    // 别名或分组
    'alias'    => [
        'check' => [
            app\admin\middleware\Check::class,
        ],
    ],
    // 优先级设置，此数组中的中间件会按照数组中的顺序优先执行
    'priority' => [],
];
