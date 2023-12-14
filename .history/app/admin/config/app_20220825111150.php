<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-07-12 07:26:44
 * @LastEditTime: 2022-08-25 11:10:59
 * @FilePath: \web\app\admin\config\app.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */
return [
    //系统保留信息
    'sysMod' => ['tb', 'admin', 'roles', 'access', 'rule', 'category', 'mclass', 'colrule', 'files'],
    //模型类型
    'modType' => [
        'form' => ['name' => '表单模型', 'actions' => ['view', 'edit']],
        'classic' => ['name' => '通用模型', 'actions' => ['view', 'add', 'delete', 'edit', 'search', 'importxlsx', 'exportxlsx', 'enabled', 'jian', 'ding']],
        'backstage' => ['name' => '内部模型', 'actions' => ['view', 'add', 'delete', 'edit']],
    ],
    //模型功能
    'actions' => [
        'view' => ['name' => 'view', 'title' => '查看'],
        'add' => ['name' => 'add', 'title' => '增加'],
        'delete' => ['name' => 'delete', 'title' => '删除'],
        'edit' => ['name' => 'edit', 'title' => '编辑'],
        'search' => ['name' => 'search', 'title' => '查找'],
        'importxlsx' => ['name' => 'importxlsx', 'title' => '导入表格'],
        'exportxlsx' => ['name' => 'exportxlsx', 'title' => '导出表格'],
        'enabled' => ['name' => 'enabled', 'title' => '审核'],
        'jian' => ['name' => 'jian', 'title' => '推荐'],
        'ding' => ['name' => 'ding', 'title' => '置顶']
    ],
    //字段
    'column'=>[
        ['name'=>?'']


    ]
];
