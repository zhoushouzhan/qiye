<?php

declare(strict_types=1);

namespace app\admin\controller;
use think\facade\Session;
class Member extends Base
{
    protected $mod;
    protected $modinfo;
    public function initialize()
    {
        parent::initialize();
        $this->mod = \app\common\model\Member::class;
        Session::flash('classify','getpathinfo');
    }
    public function index($keyword = '', $limit = 10, $page = 1)
    {
        $map = [];
        if ($keyword) {
            $map[] = ['username|mobile', 'like', "%$keyword%"];
        }
        $dataList = $this->mod::where($map)->paginate($limit, false, ['page' => $page, 'query' => ['keyword' => $keyword]]);
        $this->success('会员获取成功', $dataList);
    }
    public function details($id)
    {
        $r = $this->mod::withoutField('password')->find($id);
        $this->success('获取成功', $r);
    }
    public function save()
    {
        $data = input();
        if (isset($data['id']) && $data['id']) {
            if ($r = $this->mod::update($data)) {
                $this->success('更新成功', $r);
            }
        } else {
            if ($r = $this->mod::create($data)) {
                $this->success('保存成功', $r);
            }
        }
    }
}
