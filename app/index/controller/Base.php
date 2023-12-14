<?php
/*
 * @Author: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @Date: 2022-12-11 08:47:26
 * @LastEditors: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @LastEditTime: 2023-12-05 19:10:19
 * @FilePath: /web/app/index/controller/Base.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace app\index\controller;

use app\BaseController;
use think\facade\Cache;
use think\facade\Db;
use think\facade\View;
use think\facade\Session;
use think\facade\Cookie;

class Base extends BaseController
{
    protected $site = [];
    protected $member = [];
    protected $category = [];
    protected $uid;
    // 初始化
    protected function initialize()
    {
        parent::initialize();
        $this->getSystem();
        $this->getNav();
        $this->getMember();
    }
    //会员信息
    protected function getMember()
    {
        $this->uid = Session::get('uid') ? Session::get('uid') : Cookie::get('uid');
        if ($this->uid) {
            $this->member = \app\common\model\Member::find($this->uid);
        }

        View::assign("member",  $this->member);
    }
    //系统配置信息
    protected function getSystem()
    {

        if (!$this->site = Cache::get('sitepro')) {
            $this->site = Db::name('sitepro')->where('id', '1')->find();
            Cache::set('sitepro', $this->site);
        }
        View::assign([
            'site'  => $this->site,
        ]);

        Cache::set('name', 'aaa', 3600);


    }
    //获取导航
    protected function getNav()
    {
        if (Cache::has('category')) {
            $this->category = Cache::get('category');
        } else {
            $this->category = \app\common\model\Category::with('mod')->select();
        }
        View::assign([
            'category' => layoutCategory($this->category),
            'nav'  => nav($this->category)
        ]);
    }
}
