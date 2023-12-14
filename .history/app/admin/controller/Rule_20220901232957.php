<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-21 09:57:50
 * @LastEditTime: 2022-09-01 23:29:17
 * @FilePath: \web\app\admin\controller\Rule.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

namespace app\admin\controller;

use app\admin\validate\CheckRule;
use think\exception\ValidateException;

class Rule extends Base
{
    public function index()
    {

        $dataList = \app\common\model\Rule::order('sort', 'asc')->select();
        //栏目嵌入菜单
        $category = \app\common\model\Category::select();
        $pid = 0;
        foreach ($dataList as $k => $v) {
            if ($v['name'] == 'Content') {
                $pid = $v['id'];
            }
        }
        foreach ($category as $k => $v) {
            $newitem['title'] = $v['title'];
            $newitem['icon'] = '';
            $newitem['mod'] = 'mod_id';
            $newitem['path'] = '/Listinfo';
            $newitem['component'] = '/Listinfo/' . $v['id'];
            $newitem['component'] = '/Listinfo/' . $v['id'];
        }

        return layoutData($dataList);
    }
    public function save()
    {
        $data = $this->request->param();
        try {
            //验证
            $valCheck = validate(CheckRule::class)->scene('add')->check($data);
            if ($valCheck !== true) {
                $this->error($valCheck);
            }
        } catch (ValidateException $e) {
            $this->error($e->getError());
        }
        if (\app\common\model\Rule::create($data)) {
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }
    public function update()
    {
        $data = $this->request->param();
        try {
            //验证
            $valCheck = validate(CheckRule::class)->scene('edit')->check($data);
            if ($valCheck !== true) {
                $this->error($valCheck);
            }
        } catch (ValidateException $e) {
            $this->error($e->getError());
        }
        if (\app\common\model\Rule::update($data)) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }
    public function delete($id)
    {
        if (\app\common\model\Rule::destroy($id)) {
            $this->success('删除成功', $this->index());
        } else {
            $this->error('删除失败');
        }
    }
}
