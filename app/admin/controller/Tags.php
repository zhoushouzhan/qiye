<?php
/*
 * @Author: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @Date: 2023-12-11 09:26:29
 * @LastEditors: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @LastEditTime: 2023-12-11 09:27:33
 * @FilePath: /web/app/admin/controller/Tags.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */
namespace app\admin\controller;
use app\admin\validate\CheckTags;
use think\exception\ValidateException;


class Tags extends Base{
    protected $mod;
    public function initialize()
    {
        parent::initialize();
        $this->mod = \app\common\model\Tags::class;
    }
    public function index($keywords='',$limit=10,$notin=[])
    {
        $map=[];
        if($keywords){
            $map[]=['title','like',"%$keywords%"];
        }
        if($notin){
            $map[]=['title','notin',$notin];
        }
        $res = $this->mod::where($map)->order('used', 'desc')->order('id', 'desc')->paginate([
            'list_rows'=> $limit,
            'query'=>['keywords'=>$keywords]
        ]);
        $this->success('获取成功',$res);
    }
    public function save($id=0){
        
        
        
            $data=input('post.');
            try {
                //验证
                $valCheck = validate(CheckTags::class)->check($data);
                if ($valCheck !== true) {
                    $this->error($valCheck);
                }
                if($id){
                    $this->mod::update($data);
                    $this->success('更新成功');
                }else{
    
                    $this->mod::create($data);
                    $this->success('增加成功');
                }
                
                
                
            } catch (ValidateException $e) {
                $this->error($e->getError());
            }
            
        
        
        
    }
    
    public function details($id)
    {
        $r = $this->mod::find($id);
        if($r){
            $this->success('获取成功', $r);
        }else{
            $this->error('暂无信息', $r);
        }

    }

    
    public function delete($ids)
    {
        if (!$ids) {
            return 0;
        }
        if (is_array($ids)) {
            $ids = array_map('intval', $ids);
        }
        $rs = $this->mod::destroy($ids);
        if ($rs) {
            $this->success("删除成功");
        }
    }
}
