<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-07-12 07:26:44
 * @LastEditTime: 2022-09-19 09:17:31
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
    //字段类型
'colType'
    //字段
    'formitem' => [
        ['name' => '单行文本框', 'value' => 'input'],
        ['name' => '隐藏元素', 'value' => 'hidden'],
        ['name' => '非表单元素', 'value' => 'none'],
        ['name' => '密码框', 'value' => 'password'],
        ['name' => '日期时间', 'value' => 'datetime'],
        ['name' => '日期', 'value' => 'date'],
        ['name' => '下拉菜单', 'value' => 'mselect'],
        ['name' => '联动菜单', 'value' => 'linkage'],
        ['name' => '多行文本框', 'value' => 'textarea'],
        ['name' => '富文本编辑器', 'value' => 'editor'],
        ['name' => '单选框', 'value' => 'radio'],
        ['name' => '复选框', 'value' => 'checkbox'],
        ['name' => '单图片', 'value' => 'thumb'],
        ['name' => '相册', 'value' => 'photo'],
        ['name' => '附件', 'value' => 'files'],
        ['name' => '一对一模型', 'value' => 'hasone'],
        ['name' => '一对多模型', 'value' => 'hasmany'],
        ['name' => '开关', 'value' => 'switch'],
        ['name' => '图标', 'value' => 'icon'],
    ]
];
