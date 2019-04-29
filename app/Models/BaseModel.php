<?php
/**
 * Created by PhpStorm.
 * User: leshu
 * Date: 2019/4/25
 * Time: 18:00
 */

namespace App\Models;
use Config\Database;
use CodeIgniter\Database\ConnectionInterface;
//use CodeIgniter\Database\Postgre;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;
use App\Library;
use CodeIgniter\Validation\ValidationInterface;


class BaseModel extends Model {

    /**
     * -----------------------------------
     * @Date             2019-04-26
     * @Author           Acclea
     * @Describe         $dbMaster      主库
     * @Describe         $dbMaster      从库
     * @Describe         $dbClass       数据库类
     * -----------------------------------
     */
    public static $dbMaster = "";
    public static $dbSlaver = "";

    //--------------------------------------------------------------------

    /**
     * -----------------------------------
     * @Function        init
     * @Date             2019-04-25
     * @Author           Acclea
     * @Describe         初始化
     * -----------------------------------
     */
    public function __construct(ConnectionInterface $db = null, ValidationInterface $validation = null){
        parent::__construct($db, $validation);

        // 加载Database主库
        if(empty(self::$dbMaster)){
            $dbConf           = new Database();
            self::$dbMaster = \Config\Database::connect($dbConf->master);
        }

        // 加载Database从库
        if(empty(self::$dbSlaver)){
            $dbConf           = new Database();
            self::$dbSlaver = \Config\Database::connect($dbConf->slaver);
        }
    }

    //--------------------------------------------------------------------
}