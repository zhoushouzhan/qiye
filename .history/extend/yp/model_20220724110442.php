<?php

/**
 * @Author: Administrator
 * @Date:   2021-08-04 18:59:59
 * @Last Modified by:   Administrator
 * @Last Modified time: 2021-09-04 10:10:18
 * 模型创建类
 */

namespace yp;

use app\common\model\Mod asTb;
use think\facade\Config;
use think\facade\Db;

class Model
{
    private $modFile;
    private $controllerFile;
    private $viewPath;
    private $mod;
    private $baseFileName; //基名称
    private $dbname;
    private $tbname;
    public function __construct($data = [])
    {
        $this->mod = $data;

        //基名称首字母大写
        $this->baseFileName = ucfirst($this->mod['name']);
        $this->dbname = Config::get('database.connections.mysql.database');
        $this->tbname = Config::get('database.connections.mysql.prefix') . $this->mod['name'];
    }
    //创建数据表
    public function createTable()
    {
        //表名
        $tbname = $this->tbname;
        //删除存在的数据表
        Db::execute("DROP TABLE IF EXISTS `{$tbname}`;");
        //组建SQL语句
        $createSql = "CREATE TABLE `{$tbname}` (";
        //默认加入ID字段为主键自增
        $createSql .= "`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增ID',";
        //默认加入删除字段模型2和3加入回收站字段
        if ($this->mod['mt'] == 2 || $this->mod['mt'] == 3) {
            $createSql .= "`delete_time` int(10) UNSIGNED NOT NULL COMMENT '删除时间',";
        }
        //添加主键
        $createSql .= "PRIMARY KEY (`id`)";
        $alias = $this->mod['alias'];
        //设置编码
        $createSql .= ") ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='{$alias}';";
        //执行
        Db::execute("$createSql");
    }
    //更新数据表
    public function updateTable()
    {
        $tbname = $this->tbname;
        $dbname = $this->dbname;
        $r = Tb::find($this->mod->id);
        $cols = Db::name('cols')->column('*', 'id');
        $oldCols = $this->getColids($r->cols);

        $oldCols = array_filter(explode(",", $oldCols));
        $newCols = $this->getColids($this->mod->cols);
        $newCols = array_filter(explode(",", $newCols));

        foreach ($newCols as $value) {
            if (count($oldCols) == 0 || !in_array($value, $oldCols)) {
                self::addCol($cols[$value], $dbname, $tbname);
            }
        }

        foreach ($oldCols as $value) {
            if (!in_array($value, $newCols)) {
                $colName = $cols[$value]['name'];
                $sql = "SELECT * FROM information_schema.columns WHERE TABLE_SCHEMA='{$dbname}' AND TABLE_NAME = '{$tbname}' AND COLUMN_NAME = '{$colName}'";
                $res = Db::execute($sql);
                if ($res > 0) {
                    Db::execute("ALTER TABLE {$tbname} DROP {$colName}");
                }
            }
        }
    }
    //增加字段
    public static function addCol($value, $dbname, $tbname)
    {

        $query = '';
        switch ($value['type']) {
            case 'INT':
                $query = "ALTER TABLE {$tbname} ADD `{$value['name']}` {$value['type']}({$value['length']}) SIGNED NOT NULL COMMENT '{$value['comment']}'";
                break;
            case 'FLOAT':
                $query = "ALTER TABLE {$tbname} ADD `{$value['name']}` {$value['type']}({$value['length']}) SIGNED NOT NULL COMMENT '{$value['comment']}'";
                break;
            case 'VARCHAR':
                $query = "ALTER TABLE {$tbname} ADD `{$value['name']}` {$value['type']}({$value['length']}) NOT NULL DEFAULT '' COMMENT '{$value['comment']}'";
                break;
            case 'TEXT':
                $query = "ALTER TABLE {$tbname} ADD `{$value['name']}` {$value['type']}({$value['length']}) NOT NULL DEFAULT '' COMMENT '{$value['comment']}'";
                break;
            case 'MEDIUMTEXT':
                $query = "ALTER TABLE {$tbname} ADD `{$value['name']}` {$value['type']} NOT NULL DEFAULT '' COMMENT '{$value['comment']}'";
                break;
            case 'JSON':
                $query = "ALTER TABLE {$tbname} ADD `{$value['name']}` {$value['type']} NOT NULL COMMENT '{$value['comment']}'";
                break;

            default:
                # code...
                break;
        }

        if (!empty($query)) {
            $name = $value['name'];
            $sql = "SELECT * FROM information_schema.columns WHERE TABLE_SCHEMA='{$dbname}' AND TABLE_NAME = '{$tbname}' AND COLUMN_NAME = '{$name}'";
            $res = Db::execute($sql);
            if ($res > 0) {
                Db::execute("ALTER TABLE {$tbname} DROP {$name}");
            }

            Db::execute($query);
        }
    }

    //删除模型
    public function removeMod()
    {
        //删除数据表
        Db::execute("DROP TABLE {$this->tbname}");
    }
    //分组中提取字段
    public function getColids($cols)
    {
        if ($cols == '') return '';
        $colsArr = json_decode($cols, true);
        $colids = '';
        foreach ($colsArr as $k => $v) {
            $colids .= $colids ? ',' . implode(',', $v) : implode(',', $v);
        }
        return $colids;
    }
}