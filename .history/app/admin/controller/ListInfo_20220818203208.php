<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-08-03 11:36:52
 * @LastEditTime: 2022-08-18 20:32:08
 * @FilePath: \web\app\admin\controller\ListInfo.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

declare(strict_types=1);

namespace app\admin\controller;

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

    public function getList(int $isremove = 0)
    {
        if ($this->mod['type'] == 'form') {
            $data = $this->table::find(1);
        }
        if ($this->mod['type'] == 'classic') {
            $removeNum = $this->table::onlyTrashed()->count();
            if ($isremove) {
                $res = $this->table::onlyTrashed()->order('id', 'desc')->select();
            } else {
                $res = $this->table::order('id', 'desc')->select();
            }
            $data['removeNum'] = $removeNum;
            $data['list'] = $res;
        }

        $this->success('获取成功', $data);
    }
    public function save()
    {
        $data = input('data');

        if (isset($data['id']) && $data['id']) {
            if ($r = $this->table::update($data)) {
                $this->success('更新成功', $r);
            }
        } else {
            if ($r = $this->table::create($data)) {
                $this->success('保存成功', $r);
            }
        }
    }
    /*对于初次删除的存回收站*/
    public function delete($ids)
    {
        $res = $this->table::withTrashed()->where('id', 'in', $ids)->select();
        foreach ($res as $k => $v) {
            if ($v->delete_time) {
                $v->force()->delete();
            } else {
                $v->delete();
            }
        }
        $this->success('删除完毕');
    }
    /**还原 */
    public function restore($ids)
    {
        $res = $this->table::withTrashed()->where('id', 'in', $ids)->select();
        foreach ($res as $k => $v) {
            $v->restore();
        }
        $this->success('己还原');
    }
    public function export($ids = [])
    {
        $dataList = $this->table::withTrashed()->where('id', 'in', $ids)->select();
        $header = \app\common\model\Cols::where('id', 'in', $this->mod['colsid'])->order('sort', 'asc')->select();

        app('Allexport')->toxlsx($header, $dataList);
    }
    public function import()
    {
        $file = $this->request->file('file');
        $filePath = $file->getpathname;
        halt($file);
        if (!$file) {
            $this->error('未上传文件');
        }
        $this->success('导入完毕', $file);
    }
}
