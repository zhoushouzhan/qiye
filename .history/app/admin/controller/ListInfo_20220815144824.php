<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-08-03 11:36:52
 * @LastEditTime: 2022-08-15 12:05:55
 * @FilePath: \web\app\admin\controller\ListInfo.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

namespace app\admin\controller;

use think\exception\ValidateException;

class ListInfo extends Base
{


    public function initialize()
    {
        parent::initialize();
        $modid = $this->request->param('modid');
        if (!$modid) {
            $this->error('模型ID错误');
        }
        $this->mod = \app\common\model\Mod::find($modid);

        $this->table = $this->mod->getMod();
    }

    public function getList()
    {
        if ($this->mod['type'] == 'form') {
            $data = $this->table::find(1);
        } else {
            $data = $this->table::select();
        }

        $this->success('获取成功', $data);
    }
    public function save()
    {
        $data = input('data');
        halt($data);
        try {
            if (isset($data['id']) && $data['id']) {
                if ($r = $this->table::update($data)) {
                    $this->success('更新成功', $r);
                }
            } else {
                if ($r = $this->table::create($data)) {
                    $this->success('保存成功', $r);
                }
            }
        } catch (ValidateException $e) {
            $this->error($e->getError());
        } catch (\Exception $e) {

            $this->error($e->getMessage());
        }
    }
    public function delete($id)
    {
        # code...
    }
}
