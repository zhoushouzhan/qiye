<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-08 07:55:45
 * @LastEditTime: 2022-08-16 18:09:33
 * @FilePath: \web\app\admin\validate\CheckMod.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

declare(strict_types=1);

namespace app\admin\validate;

use think\Validate;

class CheckMod extends Validate
{
    protected $rule = [
        'name' => 'require|unique:mod',
        'alias' => 'require',
    ];

    protected $message = [
        'name.require' => '模型名称必须填写',
        'name.unique' => '模型己存在',
        'alias.require' => '模型别名填写',
    ];
    protected $scene = [
        'add'  =>  ['name', 'alias'],
        'edit'  =>  ['alias'],
    ];
}
