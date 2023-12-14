<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-21 10:09:47
 * @LastEditTime: 2022-10-05 21:13:36
 * @FilePath: \web\app\admin\controller\base.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

namespace app\admin\controller;

use app\BaseController;
use think\facade\Cache;
use think\facade\Db;
use think\facade\Config;

class Base extends BaseController
{
    //protected $middleware = ['check' => ['except' => ['login']]];
    protected $admin;
    protected $site=[];
    // 初始化
    protected function initialize()
    {
        parent::initialize();
        $this->checkAuth();
        $this->getSystem();
    }
    //系统配置信息
    protected function getSystem()
    {

        if (!$this->site = Cache::get('sitepro')) {
            $this->site = Db::name('sitepro')->where('id', '1')->find();
            Cache::set('sitepro', $this->site);
        }
        $this->site['model'] = Config::get('app.sysModel');
        $this->site['admin'] = $this->admin;


    }
    protected function checkAuth()
    {
        if (isset($this->request->adminid)) {
            $this->admin = \app\common\model\Admin::with('roles')->withoutField('password,salt')->find($this->request->adminid);
            if($this->admin->id!=1){
                $this->admin=$this->reauth($this->admin);
            }else{
                $rolesBtn=\app\common\model\Mod::column('actions','name');
                foreach($rolesBtn as $k=>$v){
                    $rolesBtn[$k]=json_decode($v);
                }
                $this->admin->rolesBtn=$rolesBtn;
            }
            $this->admin->routes = $this->getMenu();
        }
    }
    //获取路由
    protected function getMenu($type = '')
    {
        //权限筛选
        //权限分为角色权限和个人权限
        $map = [];
        //超管不走权限通道
        if($this->admin->id!=1){
            $rules = [];
            $map[]=['status','=',1];
            $map[]=['id','in',$this->admin->rolesRules];

        }
       
        $dataList = \app\common\model\Rule::with('mod')->withoutField('name')->where($map)->order('sort', 'asc')->select()->toArray();
        $ruleList = layoutData($dataList);
        return $ruleList;
    }

    //用户权限处理返回最终权限
    protected function reauth($admin){
        //继承的菜单
        $rolesRules=[];
        foreach($admin->roles as $v){
            if (is_array($v->rules)) {
                $rolesRules = array_merge($rolesRules, $v->rules);
            }
        }
        $rolesRules=array_values(array_unique($rolesRules));
        //额外菜单
        $cluderules=$admin->cluderules;
        $rolesRules=array_values(array_merge($rolesRules,$cluderules));



        //排除菜单
        $excluderules=$admin->excluderules;
        foreach($rolesRules as $k=>$v){
            if(in_array($v,$excluderules)){
                unset($rolesRules[$k]);
            }
        }


        $rolesRules=array_values($rolesRules);
        $admin->rolesRules=$rolesRules;
        //继承的按钮
        $rolesBtn=[];
        foreach($admin->roles as $k=>$v){
        foreach($v->modbtn as $key=>$vo){
                if(isset($rolesBtn[$key])){//如果己有数据进行合并然后去重
                    $rolesBtn[$key]=array_merge($rolesBtn[$key],$vo);
                    $rolesBtn[$key]=array_unique($rolesBtn[$key]);
                }else{
                    $rolesBtn[$key]=$vo;
                }
        }
        }
        //额外按钮
        $cludebtn=$admin->cludebtn;
        foreach($cludebtn as $m=>$v){
            if(isset($rolesBtn[$m])){
                $rolesBtn[$m]=array_merge($rolesBtn[$m],$v);
            }else{
                $rolesBtn[$m]=$v;
            }
        }
        //排除按钮
        $excludebtn=$admin->excludebtn;
        foreach($rolesBtn as $m=>$v){
            foreach($v as $k=>$vo){

                if(isset($excludebtn[$m])&&in_array($vo,$excludebtn[$m])){
                    unset($rolesBtn[$m][$k]);
                }
            }
            $rolesBtn[$m]=array_values($rolesBtn[$m]);
        }
        $admin->rolesBtn=$rolesBtn;
        return $admin;
    }


}
