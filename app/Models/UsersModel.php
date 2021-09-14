<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'tb_user';
    protected $primaryKey = 'usr_sid';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['usr_sid', 'usr_name', 'usr_designation', 'usr_department', 'usr_email', 'usr_mobile', 'usr_password', 'usr_status', 'usr_hash', 'usr_hashedon'];

    protected $useTimestamps = true;
    protected $createdonField  = 'sys_createdon';
    protected $createdbyField  = 'sys_createdby';
    protected $updatedonField  = 'sys_modifiedon';
    protected $updatedbyField  = 'sys_modifiedby';
    protected $deletedField  = 'sys_deleted';

    protected $validationRules    = [
        'name'          => 'required|min_length[3]'
    ];

    protected $validationMessages = [
        'usr_name'        => [
            'required' => 'Bagian Name Harus diisi',
            'min_length' => 'Minimal 3 Karakter'
        ],
    ];
}
