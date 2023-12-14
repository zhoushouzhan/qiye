<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-07-12 07:26:44
 * @LastEditTime: 2023-12-11 09:35:13
 * @FilePath: \web\app\admin\config\app.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */
return [
    //系统保留信息
    'sysModel' => [
        'sysMod' => ['tb', 'admin', 'roles', 'access', 'rule', 'category', 'mclass', 'colrule', 'files'],
        //模型功能
        'actions' => [
            'view' => ['name' => 'view', 'title' => '查看'],
            'add' => ['name' => 'add', 'title' => '增加'],
            'remove' => ['name' => 'remove', 'title' => '回收站'],
            'recovery' => ['name' => 'recovery', 'title' => '还原'],
            'delete' => ['name' => 'delete', 'title' => '删除'],
            'edit' => ['name' => 'edit', 'title' => '编辑'],
            'search' => ['name' => 'search', 'title' => '查找'],
            'importxlsx' => ['name' => 'importxlsx', 'title' => '导入表格'],
            'exportxlsx' => ['name' => 'exportxlsx', 'title' => '导出表格'],
            'enabled' => ['name' => 'enabled', 'title' => '审核'],
            'jian' => ['name' => 'jian', 'title' => '推荐'],
            'ding' => ['name' => 'ding', 'title' => '置顶']
        ],
        //模型类型
        'modType' => [
            'form' => ['name' => '表单模型', 'actions' => ['view', 'edit']],
            'classic' => ['name' => '通用模型', 'actions' => ['view', 'add', 'remove', 'recovery', 'delete', 'edit', 'search', 'importxlsx', 'exportxlsx', 'enabled', 'jian', 'ding']],
            'backstage' => ['name' => '内部模型', 'actions' => ['view', 'add', 'delete', 'edit', 'exportxlsx', 'search', 'enabled']],
        ],
        //字段类型
        'colType' => [
            ['value' => 'INT', 'title' => 'INT'],
            ['value' => 'FLOAT', 'title' => 'FLOAT'],
            ['value' => 'VARCHAR', 'title' => 'VARCHAR'],
            ['value' => 'TEXT', 'title' => 'TEXT'],
            ['value' => 'MEDIUMTEXT', 'title' => 'MEDIUMTEXT']
        ],
        //字段
        'formitem' => [
            ['name' => '单行文本框', 'value' => 'input'],//单纯的文本录入
            ['name' => '隐藏元素', 'value' => 'hidden'],//只提交不显示
            ['name' => '非表单元素', 'value' => 'none'],//不存在于表单
            ['name' => '密码框', 'value' => 'password'],//密码输入
            ['name' => '日期时间', 'value' => 'datetime'],//如2023-09-01 12:12:12
            ['name' => '日期', 'value' => 'date'],//如2023-09-01
            ['name' => '下拉菜单', 'value' => 'select'],
            ['name' => '树状菜单', 'value' => 'tree'],
            ['name' => '联动菜单', 'value' => 'linkage'],
            ['name' => '多行文本框', 'value' => 'textarea'],//单纯多行文本录入
            ['name' => '富文本编辑器', 'value' => 'editor'],//集成ckeditor5
            ['name' => '单选框', 'value' => 'radio'],//单选
            ['name' => '复选框', 'value' => 'checkbox'],//多选
            ['name' => '单图片', 'value' => 'thumb'],//单个图片
            ['name' => '相册', 'value' => 'photo'],//多个图片
            ['name' => '视频', 'value' => 'video'],//多个图片
            ['name' => '附件', 'value' => 'files'],//附件可以多个
            ['name' => '开关', 'value' => 'switch'],//开关，是否等
            ['name' => '图标', 'value' => 'icon'],//ICON图标
            ['name' => '标签', 'value' => 'tags'],//ICON图标
        ]
    ],
];
