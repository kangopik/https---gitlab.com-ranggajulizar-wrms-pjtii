<?php

defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    function __construct()
    {
        $this->db = db_connect();
    }
}
