<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 * 
 * For security be sure to declare any new methods as protected or private.
 * 
 * @package CodeIgniter
 */
 
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use Config\Autoload;
use Config\App;
use Config\Cache;
use CodeIgniter\Cache\CacheFactory;
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Config\Services;
use Config\Database;
use App\Libraries\SelfFunc;
use App\Models\AdminModel;

class BaseController extends Controller{
    use ResponseTrait;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [ ];

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Date             2019-04-29
     * @Author           Acclea
     * @Describe         预定义管理员信息
     * -----------------------------------
     */
    public static $adminInfo = [];

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Date             2019-04-26
     * @Author           Acclea
     * @Describe         加载系统需要的配置
     * -----------------------------------
     */
    public static $sysConf = [];

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Date             2019-04-26
     * @Author           Acclea
     * @Describe         redis
     * -----------------------------------
     */
    public static $redisConn = '';

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Date             2019-04-26
     * @Author           Acclea
     * @Describe         $sessionClass
     * -----------------------------------
     */
    public static $sessionClass = '';

    //--------------------------------------------------------------------


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
	 * Constructor.
	 *
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger){
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);


        // 加载session
        if(empty(self::$sessionClass)){
            $services           = new Services();
//            $sessionConn        = $services->session();
            self::$sessionClass         = $services->session();
        }

        //未登录，跳转登陆
        $adminId    = self::$sessionClass->get('id');
        if(!$adminId){header("Location:".site_url("Login/index"));die;}

        // 加载redis
        if(empty(self::$redisConn)){
            $redisFact          = new CacheFactory();
            $config             = new Cache();
            self::$redisConn    = $redisFact->getHandler($config);
        }

        //管理员信息
        if(empty(self::$adminInfo)){
            $cacheKeyAdminInfo      = "ci4_test_admin_info_$adminId";
            self::$adminInfo  = self::$redisConn->get($cacheKeyAdminInfo);
        }

        // 加载autoLoad配置
        if(!isset(self::$sysConf['autoLoad'])){
            self::$sysConf['autoLoad'] = new Autoload();
        }

        // 加载app配置
        if(!isset(self::$sysConf['app'])){
            self::$sysConf['app'] = new App();
        }

        // 加载Database从库
        if(empty(self::$dbSlaver)){
            $dbConf           = new Database();
            self::$dbSlaver = \Config\Database::connect($dbConf->slaver);
        }

	}

    //--------------------------------------------------------------------


    /**
     * -----------------------------------
     * @Function            adminLogIns
     * @Date                2019-04-29
     * @Author              Acclea
     * @Param     int       $operaId   操作id（1增——a，2删——d，3查——s，4改——u）
     * @Param     string    $logContent   操作内容
     * @Param     int       $addtime   操作时间
     * @Return              bool
     * -----------------------------------
     */
    public function adminLogIns(int $operaId,string $logContent,int $addtime) :bool {
        if(!$operaId OR !$logContent){return false;}
        $adminModel = new AdminModel();

        //获取IP
        $ip     = $this->request->getIPAddress();
        if(!$this->request->isValidIP($ip)){ echo "IP Is Not Valid";return false; }

        $logArr     = array(
            "describe"  => $logContent,
            "opera_id"  => $operaId,
            "opera_ip"  => $ip,
            "addtime"   => $addtime,
        );

        return  $adminModel->adminLogInsert($logArr);
    }

    //--------------------------------------------------------------------
}
