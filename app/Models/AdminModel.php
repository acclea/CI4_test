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
     * -----------------------------------
     */
    public function adminRow(string $where = null,string $fields = null,string $order = null,string $group = null) {
        if(!$where){return false;}

        return  array("id"=>1,"name"=>"admin","pass"=>"789123");
    }

    //--------------------------------------------------------------------
}