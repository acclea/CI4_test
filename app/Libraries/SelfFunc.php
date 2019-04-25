<?php
/**
 * Created by PhpStorm.
 * User: leshu
 * Date: 2019/4/25
 * Time: 16:42
 * Describe : 自定义方法
 */

use CodeIgniter\Config\Config;
use CodeIgniter\Files\Exceptions\FileNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use CodeIgniter\Config\App;
use CodeIgniter\Config\Database;
use CodeIgniter\Config\Logger;
use CodeIgniter\Config\Services;
use Tests\Support\Log\TestLogger;
use Zend\Escaper\Escaper;
use CodeIgniter\system\Common;


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
    function p($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}