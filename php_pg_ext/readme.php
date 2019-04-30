<?php
/**
 * Created by PhpStorm.
 * User: leshu
 * Date: 2019/4/30
 * Time: 10:45
 */

/**
        如果没有使用过/或者未添加 PostgreSQL 扩展时，无法直接调用 php 对 PostgreSQL 的支持

        在 php.ini 文件中 找到[PostgreSQL]

        在该模块最后添加以下即可

        extension = php_pdo_pgsql
        extension = php_pgsql
 */