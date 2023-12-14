<?php
/*
 * @Author: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @Date: 2023-08-23 22:02:59
 * @LastEditors: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @LastEditTime: 2023-12-11 09:39:01
 * @FilePath: /web/app/common/model/Article.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;
use think\facade\Db;
class Article extends Model
{
    use \mod\Article;
    //自定义内容

    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;

    public static function onBeforeUpdate($data)
    {
        unset($data['create_time']);
        unset($data['update_time']);
        return $data;
    } 
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getCategoryIdLinkAttr($value,$data){
        $value=$data['category_id'];
        $r=Db::name('category')->find($value);
        $arr=explode(",",$r['path']);
        $newArr=[];
        foreach($arr as $k=>$v){
            if($v){
                $newArr[]=$v;
            }
        }
        $newArr[]=$value;
        return $newArr;
    }


    //关联标签
    public function setTagsIdAttr($value, $data) {
        $result=Tags::backid($value);
        return $result;
    }
    public function getTagsIdAttr($value, $data) {
        if ($value) {
            $result=Tags::where('id','in',$value)->column('title');
            return $result;
        }
    }
    public function getTagsAttr($value, $data) {
        if ($data['tags_id']) {
            $result=Tags::where('id','in',$data['tags_id'])->select();
            return $result;
        }
    }



}
