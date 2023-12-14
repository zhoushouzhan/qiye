<?php
/*
 * @Author: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @Date: 2023-04-10 10:50:10
 * @LastEditors: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @LastEditTime: 2023-12-11 10:57:12
 * @FilePath: /web/app/admin/controller/Sitepro.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */
namespace app\admin\controller;
use think\exception\ValidateException;
class Sitepro extends Base{
    protected $mod;
    public function initialize()
    {
        parent::initialize();
        $this->mod = \app\common\model\Sitepro::class;
    }
    public function getInfo($id=1)
    {
        try {
            $data=$this->mod::find($id);
            $this->success('查询成功',$data);
        } catch (ValidateException $e) {
            $this->error($e->getError());
        }
    }
    public function save(){
        try {
            $data=input('post.');
            $this->mod::update($data);
            $this->success('更新成功');
        } catch (ValidateException $e) {
            $this->error($e->getError());
        }
    }

}
