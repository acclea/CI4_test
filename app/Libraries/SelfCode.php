<?php
/**
 * Created by PhpStorm.
 * User: leshu
 * Date: 2019/4/29
 * Time: 13:17
 */

namespace App\Libraries;

use CodeIgniter\Language;

class SelfCode{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['language' ];


    /**
     * -----------------------------------
     * @Date             2019-04-29
     * @Author           Acclea
     * @Describe         成功---返回code值，msg
     * -----------------------------------
     */
    public static $successInfo      = array(
        "code"      => 0,

        //  TODO  现在语言包无法加载………………
//        "msg"       => lang("success_msg"),
    );
}