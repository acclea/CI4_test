<?php
/**
 * Created by PhpStorm.
 * User: leshu
 * Date: 2019/4/25
 * Time: 17:54
 */

namespace App\Models;

class AdminModel extends BaseModel {

    /**
     * -----------------------------------
     * @Function        adminRow
     * @Date             2019-04-26
     * @Author           Acclea
     * @Describe         查询管理员表中的一行数据
     * @Param   string|array     $where     where条件
     * @Param   string|array     $fields    查询字段
     * @Param   string           $order     排序字段
     * @Param   string           $group     group字段
     * @Param   string           $having    having字段
     * @return  array            $getRow
     * -----------------------------------
     */
    public function adminRow(string $where,string $fields = null,string $order = null,string $group = null,string $having = null) : array {
        if(!$where){return false;}

        if(!$fields){$fields = "id";}

        $sql    =  self::$dbSlaver->table('admin')->select($fields);

        //groupBy
        if($group){
            $sql   = $sql->groupBy($group);
            if($having){$sql   = $sql->having($having); }
        }

        //orderBy
        if($order){ $sql   = $sql->orderBy($order); }

        $getRow    = $sql->getWhere($where)->getRow();
        return      $getRow;
    }

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Function        adminInsert
     * @Date             2019-04-28
     * @Author           Acclea
     * @Describe         新增管理员，向管理员表中写入一行数据
     * @Param   array     $data     要写入的数据
     * @return  int       insertID
     * -----------------------------------
     */
    public function adminInsert(array $data) :int {
        if(!$data){return false;}
        self::$dbMaster->table('admin')->insert($data);
        $insertID   = self::$dbMaster->insertID();
        return $insertID;
    }

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Function                adminUpdate
     * @Date                    2019-04-28
     * @Author                  Acclea
     * @Describe                修改管理员数据
     * @Param   array           $data     要写入的数据
     * @Param   string|array    $where     where条件
     * @return  int             $affectedRows
     * -----------------------------------
     */
    public function adminUpdate(string $data,string $where) :int {
        if(!$data OR !$where){return false;}
        self::$dbMaster->table('admin')->where($where)->update($data);
        $affectedRows   = self::$dbMaster->affectedRows();
        return $affectedRows;
    }

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Function                adminUpdate
     * @Date                     2019-04-28
     * @Author                   Acclea
     * @Describe                 count管理员数据
     * @Param   string|array     $where     where条件
     * @Param   string           $group     group字段
     * @Param   string           $having    having字段
     * @return  int             $countAll
     * -----------------------------------
     */
    public function adminCount(string $where,string $group = null,string $having = null) :int {
        if(!$where){return false;}
        $sql    =  self::$dbSlaver->table('admin');

        //groupBy
        if($group){
            $sql   = $sql->groupBy($group);
            if($having){$sql   = $sql->having($having); }
        }

        $countAll   = $sql->countAll();
        return $countAll;
    }

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Function        adminMoreRow
     * @Date             2019-04-28
     * @Author           Acclea
     * @Describe         查询管理员表中的一行数据
     * @Param   string|array     $where     where条件
     * @Param   string|array     $fields    查询字段
     * @Param   string           $order     排序字段
     * @Param   int              $limit     limit字段
     * @Param   int              $offset    offset字段
     * @Param   string           $group     group字段
     * @Param   string           $having    having字段
     * @return  array            $getRow
     * -----------------------------------
     */
    public function adminMoreRow(string $where,string $fields = null,int $limit = 0,int $offset = 0,string $order = null,string $group = null,string $having = null) : array {
        if(!$where){return false;}

        if(!$fields){$fields = "id";}

        $sql    =  self::$dbSlaver->table('admin')->select($fields);

        //groupBy
        if($group){
            $sql   = $sql->groupBy($group);
            if($having){$sql   = $sql->having($having); }
        }

        //orderBy
        if($order){ $sql   = $sql->orderBy($order); }

        $getMoreRow    = $sql->getWhere($where,$limit,$offset)->getRow();
        return      $getMoreRow;
    }

    //--------------------------------------------------------------------


}