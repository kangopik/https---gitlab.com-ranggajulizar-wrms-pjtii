<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    function get_data_login($useremail, $tbl)
    {
        $qry = $this->db->table($tbl);
        $qry->where('usr_email', $useremail);
        $log = $qry->get()->getRow();

        return $log;
    }
}
