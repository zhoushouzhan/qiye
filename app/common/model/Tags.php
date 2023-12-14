<?php
/*
 * @Author: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @Date: 2023-12-11 09:23:29
 * @LastEditors: error: error: git config user.name & please set dead value or install git && error: git config user.email & please set dead value or install git & please set dead value or install git
 * @LastEditTime: 2023-12-11 09:40:30
 * @FilePath: /web/app/common/model/Tags.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */
    namespace app\common\model;
    use think\Model;
    use think\facade\Db;
    class Tags extends Model {
    use \mod\Tags;
    //自定义内容
        //下拉菜单
        public static function backid($tags)
        {
            if(!$tags){
                return'';
            }
            $insertData=[];
            $res=Db::name('tags')->where('title','in',$tags)->column('title');
            
            foreach($tags as $v){
                if(!in_array($v,$res)){
                    $insertData[]=['name'=>$v];
                }
            }
            if($insertData){
                Db::name('tags')->insertAll($insertData);
            }
            $ids=Db::name('tags')->where('title','in',$tags)->column('id');
            return implode(',',$ids);
        }
    }
?>