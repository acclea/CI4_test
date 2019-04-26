<?php
/**
 * Created by PhpStorm.
 * User: leshu
 * Date: 2019/4/25
 * Time: 16:42
 * Describe : 自定义方法
 */
namespace App\Libraries;

use CodeIgniter\Config\App;
use CodeIgniter\Config\Database;
use CodeIgniter\Config\Logger;
use CodeIgniter\Common;
use CodeIgniter\Libraries;


if (! function_exists('console'))
{
    /**
     *
     * Examples:
     *    console($data);
     *
     * @param string|array $data
     *
     * @describe    php封装JS->console --debug
     */
    function console(string $data) {
        if (is_array($data) || is_object($data)) {
            echo("<script>console.log('".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('".$data."');</script>");
        }
    }
}

if (! function_exists('p'))
{
    /**
     *
     * Examples:
     *    p($data);
     *
     * @param string|array $data
     *
     * @describe    php封装格式化print_r---debug
     */
    function p(string $data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}