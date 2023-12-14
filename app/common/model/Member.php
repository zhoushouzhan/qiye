<?php

namespace app\common\model;

use think\Model;
use think\facade\Config;

class Member extends Model
{
    use \mod\Member;
    //自定义内容
    public function setPasswordAttr($value)
    {
        return md5($value . Config::get('member.salt'));
    }
    public function userpic()
    {
        return $this->hasOne(Files::class, 'id', 'avatar');
    }
    public function article()
    {
        return $this->hasMany(Article::class);
    }
    public function setZhuanChangAttr($value)
    {
        if(is_array($value)){
            foreach($value as $v=>$k){
                if(intval($v)==0){
                    unset($value[$k]);
                }
            }
            $value=implode(',',$value);
        }
        return $value;
    }
    public function getZhuanChangAttr($value)
    {
        $value=explode(',',$value);

        $value = array_map('intval', $value);

        return $value;
    }
    public function getTechangAttr($value,$data){
        return Classify::where('id','in',$data['zhuanchang'])->select();
    }
}