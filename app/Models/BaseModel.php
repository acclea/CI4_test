<?php
/**
 * Created by PhpStorm.
 * User: leshu
 * Date: 2019/4/25
 * Time: 18:00
 */

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;
use App\Library;
use CodeIgniter\Validation\ValidationInterface;


class BaseModel extends Model {
    public function __construct(ConnectionInterface $db = null, ValidationInterface $validation = null){
        parent::__construct($db, $validation);
    }
}