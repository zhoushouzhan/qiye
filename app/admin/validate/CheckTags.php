<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-08 07:55:45
 * @LastEditTime: 2023-12-11 09:27:26
 * @FilePath: \web\app\admin\validate\CheckMod.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

declare(strict_types=1);

namespace app\admin\validate;

use think\Validate;

class CheckTags extends Validate
{
    protected $rule = [
        'title' => 'require|unique:tags|max:8',
    ];

    protected $message = [
        'title.require' => '名称必须填写',
        'title.unique' => '名称己存在',
        'title.max' => '名称最多8个字'
    ];
}
